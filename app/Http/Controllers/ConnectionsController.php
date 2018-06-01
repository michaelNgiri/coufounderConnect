<?php

namespace App\Http\Controllers;

use App\Models\Connection;
use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Notifications\VerifyEmailNotification;

class ConnectionsController extends Controller
{
    
    public function index(){
    	$users = User::paginate();

    	return view('connections.connect', compact('users'));
    }

    public function viewProfile(Request $request){

    	$username = $request->username;
    	$id = $request->id;
    	$user = User::where('username', $username)->where('id', $id)->first();

    	return view('connections.view-profile', compact('user'));
    }
    public function connect(Request $request){

        $inboundConnection = Connection::where('sender_id', Auth::user()->id)->where('receiver_id', $request->id)->get();
        $outboundConnection = Connection::where('receiver_id', Auth::user()->id)->where('sender_id', $request->id)->get();
        $id = $request->id;
        $user = User::find($id)->first();

        if (count($inboundConnection)== 0 && count($outboundConnection)== 0){
            $connection = new Connection;
                $connection->sender_id = Auth::user()->id;
                $connection->receiver_id = $request->id;
	        $connection->save();


            $success = 'connection request sent';
            return view('connections.view-profile', compact('user', 'success'));
        }else{
        	$info = 'you have a pending connection request to this person';
            return view('connections.view-profile', compact('user', 'info'));
        }
        
    }

    public function showRequests(){
        $pendingRequests = Connection::where('receiver_id', Auth::user()->id)->where('accepted', false)->get();
        $noOfPendingRequests = count($pendingRequests);

        return view('connections.requests', compact('pendingRequests', 'noOfPendingRequests'));
    }
    public function myConnections(){
        $myConnections = Connection::where('sender_id', Auth::user()->id)->where('accepted', true)->get();
        $myAcceptedConnections = Connection::where('receiver_id', Auth::user()->id)->get();
        $totalConnections = count($myAcceptedConnections) + count($myConnections);


        return view('connections.my-connections', compact('totalConnections', 'myConnections', 'myAcceptedConnections'));
    }

}
