<?php

namespace App\Http\Controllers;

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
    	return view('ideas.post-idea', compact('ideas', 'skills'));
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
    	$idea->save();

    	//Session::flash('success', 'Your idea has been posted');
    	$ideas = Idea::paginate();
    	return view('ideas.view', compact('ideas'));
    }
    public function viewDetails(){

        return view('ideas.details');
    }
}
