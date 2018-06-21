<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use App\Models\IdeaSkill;

class Idea extends Model
{
    protected $fillable = ['idea', 'description'];

//    public function requiredSkill(){
//        if (Skill::find($this->required_skill)){
//            return Skill::find($this->required_skill)->first()->name;
//        }else{
//            return 'no skill specified';
//        }
//    }

    public function progress(){
        is_null($this->progress)? $progress = null: $progress = Progress::find($this->progress);
        return $progress;
    }

//    the skills selected by the idea owner when posting the idea
    public function ideaSkills(){
        $ideaSkillIds = IdeaSkill::where('idea_id', $this->id)->get();


        foreach ($ideaSkillIds as $ideaSkillId){
//            return the skil ids as an array
            $skills[] = Skill::find($ideaSkillId->skill_id);
        }
//        $skills = Skill::wherein('id', $ideaSkillIds->id)->get();
        return $skills;
    }

    public function cofounders(){
        return Cofounder::where('cofounded_idea',$this->id)->where('accepted_at', '!=', null)->get();
    }

//    requests that have not been accepted by the owner of the idea
    public function pendingCofounderRequests(){
        return Cofounder::where('cofounded_idea', $this->id)->where('accepted_at', null)->get();
    }

    public function ideaStage(){
        return IdeaStage::find($this->progress);
    }



    /**
     * requests can be banned by admin only
     * @return bool
     */
    public function banned(){
        is_null($this->banned_at)? $status = false: $status = true;
        return $status;
    }



    /**
     * requests that are rejected
     * @return bool
     */
    public function removed(){
        is_null($this->removed_at)? $status = true: $status = false;
        return $status;
    }



    /**
     * returns a user object of the person who posted the idea
     * @return mixed
     */
    public function owner(){
        return User::find($this->user_id);
    }
}
