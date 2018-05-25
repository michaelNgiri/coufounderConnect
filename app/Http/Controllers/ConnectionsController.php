<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use AUth;
use App\Notifications\VerifyEmailNotification;

class ConnectionsController extends Controller
{
    
    public function index(){
    	$users = User::paginate();

    	return view('connections.connect', compact('users'));
    }

    public function viewProfile(Request $request){
    	$username = $request->username;
    	$user = User::where('username', $username)->first();

    	return view('connections.view-profile', compact('user'));
    }
    public function connect(){
    	
    }

}
