<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use AUth;

class ConnectionsController extends Controller
{
    
    public function connect(){
    	$users = User::where('id', '!=', AUth::User()->id)->paginate();

    	return view('connections.connect', compact('users'));
    }
}
