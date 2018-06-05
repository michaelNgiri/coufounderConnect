<?php

namespace App\Http\Controllers;

use App\Models\Connection;
use Carbon\Carbon;
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
        $con = Connection::where('sender_id', Auth::user()->id)->where('receiver_id', $request->id)->first();
        is_null($con)? $requested = false: $requested = true;
        is_null($con)? $connected = false: $connected = $con->accepted_at;

    	$username = $request->username;
    	$id = $request->id;
    	$user = User::where('username', $username)->where('id', $id)->first();

    	return view('connections.view-profile', compact('user', 'connected','requested'));
    }
    public function connect(Request $request){

        $con = Connection::where('sender_id', Auth::user()->id)->where('receiver_id', $request->id)->first();
        is_null($con)? $requested = false: $requested = true;
        is_null($con)? $connected = false: $connected = $con->accepted_at;
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
            return view('connections.view-profile', compact('user', 'success', 'connected', 'requested'));
        }else{
        	$info = 'you have a pending connection request to this person';
            return view('connections.view-profile', compact('user', 'info', 'connected', 'requested'));
        }
        
    }

    public function showRequests(){
        $pendingRequests = Connection::where('receiver_id', Auth::user()->id)->where('accepted_at', null)->get();
        $noOfPendingRequests = count($pendingRequests);

        return view('connections.requests', compact('pendingRequests', 'noOfPendingRequests'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * show user's connections
     */
    public function myConnections(){

        $blockedRequests = Connection::where('receiver_id', Auth::user()->id)->where('blocked_at', '!=', null)->get();
        $noOfBlockedRequests = count($blockedRequests);
        $sentRequests = Connection::where('sender_id', Auth::user()->id)->get();
        $receivedRequests = Connection::where('receiver_id', Auth::user()->id)->get();

        //check if user has any sent request
        if (is_null($sentRequests)){
            $totalAcceptedSent = 0;
        }else{
            $totalAcceptedSent = count($sentRequests->where('accepted_at', '!=', null));
        }

        if (is_null($receivedRequests)){
            $totalAcceptedReceived = 0;
        }else{
            $totalAcceptedReceived = count($receivedRequests->where('accepted_at', '!=', null));
        }

        ///////////////////////////////////////////////////////////
        if(is_null($sentRequests)){
            $noOfPendingSent = 0;
        }else{
            $pendingSent = $sentRequests->where('accepted_at', null);
            $noOfPendingSent = count($pendingSent);

        }
        if (is_null($receivedRequests)){
            $noOfPendingReceived = 0;
        }else{
            $pendingReceived = $receivedRequests->where('accepted_at', null);
            $noOfPendingReceived = count($pendingReceived);
        }

        return view('connections.my-connections',
            compact('sentRequests',
                          'pendingReceived',
                          'receivedRequests',
                             'noOfPendingSent',
                             'noOfPendingReceived',
                             'totalAcceptedReceived',
                             'blockedRequests',
                             'noOfBlockedRequests',
                             'totalAcceptedSent'));
    }

    public function acceptRequest(Request  $request){

       $connection = Connection::find($request->id);
         $connection->accepted_at = Carbon::now();
       $connection->save();

        return back();
    }
}
