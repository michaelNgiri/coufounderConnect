<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ConnectionsController extends Controller
{
    
    public function connect(){
    	$users = User::paginate();

    	return view('connections.connect', compact('users'));
    }
}
