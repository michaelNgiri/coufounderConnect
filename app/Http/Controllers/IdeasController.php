<?php

namespace App\Http\Controllers;

use App\Models\Progress;
use Illuminate\Http\Request;
use App\Models\Idea;
use App\Models\Skill;
use Auth;

class IdeasController extends Controller
{
    public function view(){
    	$ideas = Idea::paginate();

    	return view('ideas.view', compact('ideas'));
    }
    public function post(){
    	$ideas = Idea::paginate();
    	$skills = Skill::all();
    	$progresses = Progress::all();
    	return view('ideas.post-idea', compact('ideas', 'skills', 'progresses'));
    }
    public function save(Request $request){
    	
    	// $this->validate::make([
    	// 	'name'=>
    	// ]);

    	$idea = new Idea;
    	$idea->title = $request->title;
    	$idea->short_description = $request->short_description;
    	$idea->details = $request->details;
    	$idea->tags = $request->tags;
    	$idea->user_id = Auth::user()->id;
        $idea->required_skill = $request->required_skill;
        $idea->progress = $request->progress;
    	$idea->save();

        return back()->with('success', 'your idea has been saved');
//    	$ideas = Idea::paginate();
//    	return view('ideas.view', compact('ideas'));
    }
    public function viewDetails(){

        return view('ideas.details');
    }
    public  function myIdeas(){

        $ideas = Idea::where('user_id', Auth::user()->id)->get();
        return view('ideas.my-ideas', compact('ideas'));
    }
}
