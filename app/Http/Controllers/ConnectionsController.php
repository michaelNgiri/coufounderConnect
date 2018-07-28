<?php

namespace App\Http\Controllers;

use App\Models\Connection;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\User;
use Auth;

class ConnectionsController extends Controller
{

    /**
     * the main connection base view features all the platform with the required parameters as defined in the users model
     * various information about the user is fetched using model binding
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){
    	$users = User::where('deleted_at', null)->paginate();

    	return view('connections.connect', compact('users'));
    }

    /**
     * returns information about a specific user from the db
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function viewProfile(Request $request){
        if (Auth::check()) {
        	$con = Connection::where('sender_id', Auth::user()->id)->where('receiver_id', $request->id)->first();
        }else{
        	$con = null;
        }
        is_null($con)? $requested = false: $requested = true;
        is_null($con)? $connected = false: $connected = $con->accepted_at;

    	$username = $request->username;
    	$id = $request->id;
    	$user = User::where('username', $username)->where('id', $id)->first();

    	return view('connections.view-profile', compact('user', 'connected','requested'));
    }

    /**
     * this method takes a few informationinto consideration and then sends a
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function connect(Request $request){

        $con = Connection::where('sender_id', Auth::user()->id)->where('receiver_id', $request->id)->first();
        is_null($con)? $requested = false: $requested = true;
        is_null($con)? $connected = false: $connected = $con->accepted_at;
        //check if the user has sent you a request
        $inboundConnection = Connection::where('sender_id', Auth::user()->id)->where('receiver_id', $request->id)->get();
        //check if you have received a connection request from this user
        $outboundConnection = Connection::where('receiver_id', Auth::user()->id)->where('sender_id', $request->id)->get();
        $id = $request->id;
        $user = User::find($id)->first();
//            save the connection request
        if (count($inboundConnection)== 0 && count($outboundConnection)== 0){
            $connection = new Connection;
                $connection->sender_id = Auth::user()->id;
                $connection->receiver_id = $request->id;
	        $connection->save();


            $success = 'connection request sent';
            return view('connections.view-profile', compact('user', 'success', 'connected', 'requested'));
        }else{
//                if (!is_null($outboundConnection->accepted_at) || !is_null($inboundConnection->accepted_at)){
//                    $info = 'you are already connected';
//                }else {
//                    $info = 'you have a pending connection request to/ this person';
//                }
            $info = 'you have a pending connection request to/from this person';
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

        if (Auth::check()) {
          $blockedRequests = Connection::where('receiver_id', Auth::user()->id)->where('blocked_at', '!=', null)->get();
          $noOfBlockedRequests = count($blockedRequests);
          $sentRequests = Connection::where('sender_id', Auth::user()->id)->get();
          $receivedRequests = Connection::where('receiver_id', Auth::user()->id)->get();
        }else{
          $blockedRequests = null;
          $noOfBlockedRequests = 0;
          $sentRequests = null;
          $receivedRequests = null;
        }
        

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
            $pendingReceived = null;
        }else{
            $pendingReceived = $receivedRequests->where('accepted_at', null)->where('blocked_at', null)->where('spammed_at', null);
            $noOfPendingReceived = count($pendingReceived);
        }

//        needs to be refactored and (these items should be in the model)
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

        return back()->with('success', 'request accepted');
    }
    public function cancelRequest(Request $request){
        $connection = Connection::find($request->id);
        $connection->deleted_at = Carbon::now();
        $connection->save();

        return back()->with('info', 'request Cancelled');
    }

    public function blockedRequests(){
        $blockedRequests = Connection::where('receiver_id', Auth::user()->id)->where('blocked_at', '!=', null)->get();

        return view('connections.blocked-requests', compact('blockedRequests'));
    }

    public function allConnections(){
        $allSent = Connection::where('sender_id', Auth::user()->id)->get();
        $allReceived = Connection::where('receiver_id',  Auth::user()->id)->get();
        return view('connections.all', compact('allReceived', 'allSent'));
    }
}