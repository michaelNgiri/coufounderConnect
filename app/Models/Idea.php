<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Idea extends Model
{
    public function requiredSkill(){
        if (Skill::find($this->required_skill)){
            return Skill::find($this->required_skill)->first()->name;
        }else{
            return 'no skill specified';
        }
    }
}
