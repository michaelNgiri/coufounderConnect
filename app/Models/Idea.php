<?php

namespace App\Models;

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
        return Progress::find($this->progress);
    }
    public function ideaSkills(){
        $ideaSkillIds = IdeaSkill::where('idea_id', $this->id)->get();


        foreach ($ideaSkillIds as $ideaSkillId){
            $skills[] = Skill::find($ideaSkillId->skill_id);
        }
//        $skills = Skill::wherein('id', $ideaSkillIds->id)->get();
        return $skills;
    }
}
