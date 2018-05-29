<?php

namespace App\Http\Controllers;

use App\Models\Connection;
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
    public function connect(Request $request){

        $connection = new Connection;
        $connection->sender_id = Auth::user()->id;
        $connection->receiver_id = $request->id;

        $connection->save();
         return back();
    }

}
