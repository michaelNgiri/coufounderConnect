<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Discussion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DiscussionController extends Controller
{
   public function index(){
       $threads = Discussion::paginate();

       return view('discussions.index', compact('threads'));
   }

   public  function  create(){
       return view('discussions.create');
   }
   public function saveThread(Request $request){
   	$thread = new Discussion;
   		$thread->topic = $request->topic;
   		$thread->thread = $request->thread;
   		$thread->tags = $request->tags;
   		$thread->thread_owner = Auth::user()->id;
   	$thread->save();

   	return back()->with('success', 'your thread has been published');
   }

   public function saveComment(Request $request){

       $comment = new Comment;
           $comment->commenter_id = Auth::user()->id;
           $comment->discussion_id = $request->thread_id;
           $comment->comment = $request->comment;
       $comment->save();
       return back()->with('success', 'comment saved');
   }
}
