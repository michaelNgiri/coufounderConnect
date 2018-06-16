<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cofounder extends Model
{
    public function cofoundedIdea(){
        return Idea::find($this->idea_id)->get();
    }
}
