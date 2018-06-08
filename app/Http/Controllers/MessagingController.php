<?php

namespace App\Http\Controllers;

use App\Models\MailList;
use App\Models\Message;
use App\Notifications\KofoundmeMessaging;
//use App\Notifications\PrivateMessaging;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Storage;

class MessagingController extends Controller
{
    public function index()
    {
        $receivedMessages = Message::where('recipient_id', Auth::user()->id)->where('deleted_at', null)->get();

        return view('messaging.index', compact('sentMessages', 'receivedMessages'));
    }

    public function compose(Request $request)
    {
        $user = User::where('id', $request->id)->where('username', $request->username)->first();
        return view('messaging.compose', compact('user'));
    }

    public function sendMessage(Request $request)
    {
        // retrieve all info from request ,   find the message recipient with the info passed through request
        $user = User::find($request->id);
        $senderName = Auth::user()->name();
        $messageTitle = $request->title;
        $messageBody = $request->message;
        $recipientId = $request->id;

        //save message to db
        $message = new Message;
        $message->sender_id = Auth::user()->id;
        $message->recipient_id = $recipientId;
        $message->title = $messageTitle;
        $message->message_body = $messageBody;
        $message->save();

        //send email notification to the recipient
        try{($user->notify(new KofoundmeMessaging($senderName, $messageTitle, $messageBody)));

            } catch (\Exception $e){
                logger($e);
                // incase the email notification fails
                $recipient = User::find($request->id)->name();
                $info = $recipient.' '.'will see the message when he comes online';
                return view('messaging.compose', compact('info', 'user'));
            }
            //notify the user that the user that the message has been sent
        $success = 'message sent';
        return view('messaging.compose', compact('success', 'user'));
    }
    public function readMessage(Request $request){

        $message = Message::findOrFail($request->id);
        if(!is_null($message)){
            //check if the message is already read
            if (!is_null($message->read_at)){
                //mark the message as read if not previously read
                $message->update([
                    'read_at'=>Carbon::now()
                ]);
            }
        }
        if( !is_null(($message->created_at))) {
            $timestamp = $message->created_at->diffForHumans();
        }else{
            $timestamp = 'unknown time';
        }
        return view('messaging.read-message', compact('message', 'timestamp'));
    }

    public function reply(Request $request){
        $user = User::find($request->id);

        return view('messaging.compose', compact('user'));

    }

    public function delete(Request $request){
        $message = Message::find($request->id);
            $message->deleted_at = Carbon::now();
        $message->save();
        //message is not actually deleted.
        $receivedMessages = Message::where('recipient_id', Auth::user()->id)->where('deleted_at', null)->get();
        $success = 'message deleted';

        return view('messaging.index', compact( 'receivedMessages', 'success'));

    }


}