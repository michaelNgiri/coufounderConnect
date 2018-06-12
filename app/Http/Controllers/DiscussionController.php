<?php

namespace App\Http\Controllers;

use App\Models\Discussion;
use Illuminate\Http\Request;

class DiscussionController extends Controller
{
   public function index(){
       return view('discussions.index');
   }

   public function saveThread(Request $request){

   	$thread = new Discussion;
   		$thread->topic = $request->topic;
   		$thread->body = $request->body;
   	$thread->save();
   }
}
