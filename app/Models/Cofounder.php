<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Cofounder extends Model
{
    public function cofoundedIdea(){
        return Idea::find($this->idea_id)->get();
    }
    public function role(){
        return Skill::find($this->role_id);
    }
    public function user(){
        return User::find($this->user_id);
    }
}
