<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function Discussion(){
        return $this->hasMany(Discussion::class);
    }

    public  function  timeStamps(){
        return $this->created_at->diffForHumans();
    }

    public function commenter(){
        return User::find($this->commenter_id);
    }
}
