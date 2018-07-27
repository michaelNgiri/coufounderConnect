<?php

namespace App\Http\Controllers;

use App\Models\Cofounder;
use App\Models\IdeaSkill;
use App\Models\Progress;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Idea;
use App\Models\Skill;
use Auth;

class IdeasController extends Controller
{
    public function view(){
    	$ideas = Idea::where('deleted_at', null)->paginate();

    	return view('ideas.view', compact('ideas'));
    }
    public function post(){
    	$ideas = Idea::where('deleted_at', null);
    	$skills = Skill::where('deleted_at', null);
    	$progresses = Progress::where('deleted_at', null);
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

    public function cofounderRequest(Request $request){
        $skills = Skill::all();
        $idea = Idea::where('slug', $request->slug)->first();

        return view('ideas.cofounder-request', compact('idea', 'skills'));
    }

    public function cofound(Request $request){

        if (count(Idea::where('slug', $request->slug))<10) {
            $idea_id = Idea::where('slug', $request->slug)->first()->id;
            $cofounder = new Cofounder;
            $cofounder->user_id = Auth::user()->id;
            $cofounder->cofounded_idea = $idea_id;
            $cofounder->role_id = $request->role_id;
            $cofounder->other_info = $request->other_info;
            $cofounder->save();
        }else{
            return back()->with('info', 'this idea can no longer accept a co-founder');
        }
        return back()->with('info', 'we will notify the owner of your request to be a co-founder');
    }

    public function viewRequests(Request $request){
        $idea = Idea::where('slug', $request->slug)->first();
        return view('ideas.view-requests', compact('idea'));
    }
    public function acceptRequest(Request $request){
        $request = Cofounder::find($request->id);
          $request->accepted_at = Carbon::now();
        $request->save();

        return back()->with('success', 'Request accepted');
    }

    public function viewProfile(){

    }
}
