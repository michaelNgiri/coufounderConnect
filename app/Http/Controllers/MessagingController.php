<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Auth;

class MessagingController extends Controller
{
    public function index(){
        $messages = Message::where('user_id', Auth::user()->id) &&  Message::where('recipient', Auth::user()->id);
    	return view('messaging.index', compact('messages'));
    }
    public function sendMessage(){
    	//code for sending messages


        return view('messaging.send-message');
    }
} 
