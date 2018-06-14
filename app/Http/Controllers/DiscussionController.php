<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Discussion;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DiscussionController extends Controller
{
   public function index(){
       $threads = Discussion::orderBy('created_at', 'desc')->paginate(5);

       return view('discussions.index', compact('threads'));
   }

   public  function  create(){
       return view('discussions.create');
   }
   public function saveThread(Request $request){
   	$thread = new Discussion;
   		$thread->topic = $request->topic;
   		$thread->slug = $title = Carbon::now()->format('Y-m-d').'-'.str_slug($request->topic);
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

   public function viewThread(Request $request){
        $thread = Discussion::where('slug', $request->slug)->first();
       return view('discussions.view-thread', compact('thread'));
   }

   public function deleteDiscussion(Request $request){
       $discussion = Discussion::find($request->id);
       $discussion->deleted_at = Carbon::now();
       $discussion->save();

      return back()->with('success', 'deleted');
   }
   public function revokeDiscussion(Request $request){
       $discussion = Discussion::find($request->id);
       $discussion->revoked_at = Carbon::now();
       $discussion->save();

       return back()->with('success', 'thread revoked');
   }
   public function  closeThread(Request $request){
       $discussion = Discussion::find($request->id);
       $discussion->closed_at = Carbon::now();
       $discussion->save();
       
       return back()->with('info', 'thread closed');
   }
}
