<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MessagingController extends Controller
{
    public function index(){
    	return view('messaging.index');
    }
    public function sendMessage(){
    	//code for sending messages 
    }
} 
