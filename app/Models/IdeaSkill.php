<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IdeaSkill extends Model
{
    public function ideaSkills(){
        return $this->belongsTo(Idea::class);
    }
}
