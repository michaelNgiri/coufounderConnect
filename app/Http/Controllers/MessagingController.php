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

        return view('messaging.index', compact('sentMessages', 'receivedMessages', 'message', 'warning', 'success'));
    }

    public function compose(Request $request)
    {
        return view('messaging.compose');
    }

    public function sendMessage(Request $request)
    {
        //$user = User::where('id', $request->userId);
        $user = User::find(2);
        $senderName = Auth::user()->name();
        $messageTitle = "test message";
        $messageBody = 'Lorem ipsum dolo sit ama';
        $recipientId = 2;


        try{($user->notify(new KofoundmeMessaging($senderName, $messageTitle, $messageBody)));

            $message = new Message;
            $message->sender_id = Auth::user()->id;
            $message->recipient_id = $recipientId;
            $message->title = $messageTitle;
            $message->message_body = $messageBody;
            $message->save();

            $success = 'message sent';
            return view('messaging.send-message', compact('success'));

        } catch (\Exception $e){

            logger($e);

            $warning = 'sending failed, try again later';
            return view('messaging.send-message', compact('warning'));
        }



    }
}