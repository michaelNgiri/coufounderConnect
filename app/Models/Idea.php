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
    public function ideaSkills(){
        $ideaSkillIds = IdeaSkill::where('idea_id', $this->id)->get();


        foreach ($ideaSkillIds as $ideaSkillId){
            $skills[] = Skill::find($ideaSkillId->skill_id);
        }
//        $skills = Skill::wherein('id', $ideaSkillIds->id)->get();
        return $skills;
    }

    public function cofounders(){
        return Cofounder::where('cofounded_idea',$this->id)->where('accepted_at', '!=', null)->get();
    }

    public function ideaStage(){
        return IdeaStage::find($this->progress);
    }

    public function banned(){
        is_null($this->banned_at)? $status = false: $status = true;
        return $status;
    }

    public function removed(){
        is_null($this->removed_at)? $status = true: $status = false;
        return $status;
    }

    public function owner(){
        return User::find($this->user_id);
    }
}
