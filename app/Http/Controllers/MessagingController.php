<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Notifications\KofoundmeMessaging;
use App\Notifications\PrivateMessaging;
use App\User;
use Illuminate\Http\Request;
use Auth;

class MessagingController extends Controller
{
    public function index()
    {
        $sentMessages = Message::where('sender_id', Auth::user()->id)->get();
        $receivedMessages = Message::where('recipient_id', Auth::user()->id)->get();

        $message = 'recipient is currently offline';
        $warning = 'you are not connected to a network';
        $success = 'your message was successfully sent';

        return view('messaging.index', compact('sentMessages', 'receivedMessages'));
    }

    public function compose(Request $request)
    {
        $user = User::where('id', $request->id)->where('username', $request->username)->first();
        return view('messaging.compose', compact('user'));
    }

    public function sendMessage(Request $request)
    {

        $user = User::find($request->id);
        $senderName = Auth::user()->name();
        $messageTitle = $request->title;
        $messageBody = $request->message;
        $recipientId = $request->id;

        $message = new Message;
        $message->sender_id = Auth::user()->id;
        $message->recipient_id = $recipientId;
        $message->title = $messageTitle;
        $message->message_body = $messageBody;
        $message->save();

        try{($user->notify(new KofoundmeMessaging($senderName, $messageTitle, $messageBody)));

            } catch (\Exception $e){
                logger($e);
                $recipient = User::find($request->id)->name();
                $info = $recipient.' '.'will see the message when he comes online';
                return view('messaging.compose', compact('info', 'user'));
            }
        $success = 'message sent';
        return view('messaging.compose', compact('success', 'user'));
    }
    public function readMessage(Request $request){

        $message = Message::find($request->id);
        if( !is_null(($message->created_at))) {
            $timestamp = $message->created_at->diffForHumans();
        }else{
            $timestamp = 'unknown time';
        }
        return view('messaging.read-message', compact('message', 'timestamp'));
    }
}