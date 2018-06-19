<?php

namespace App\Http\Controllers;

use App\Models\IdeaSkill;
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
        $slug = $maybe_slug = str_slug($request->title);
        $next = 2;

        while (Idea::where('slug', '=', $slug)->first()) {
            $slug = "{$maybe_slug}-{$next}";
            $next++;
        }
    	$idea = new Idea;
    	$idea->title = $request->title;
        $idea->slug = $slug;
    	$idea->short_description = $request->short_description;
    	$idea->details = $request->details;
    	$idea->tags = $request->tags;
    	$idea->user_id = Auth::user()->id;
        //$idea->required_skill = $request->skill;
        $idea->progress = $request->progress;
        $idea->short_description = $request->short_description;
    	$idea->save();

            foreach($request->skills as $skill) {
                if (!is_null($skill)){
                    $ideaSkill = new IdeaSkill;
                    $ideaSkill->idea_id = $idea->id;
                    $ideaSkill->skill_id = $skill;
                    $ideaSkill->save();
                }
            }
    //        $newIdea = Idea::create([
    //            'title' => $request->title,
    //            'short_description' => $request->short_description,
    //            'details' => $request->details,
    //            'tags' => $request->tags,
    //            'user_id' => Auth::user()->id,
    //            'required_skill' => $request->skill,
    //            'progress' => $request->progress
    //        ]);

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

    public function viewIdeaDetails(Request $request){
        $idea = Idea::where('slug', $request->slug)->first();
        return view('ideas.view-details', compact('idea'));
    }
}
