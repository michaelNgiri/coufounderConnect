<?php

namespace App\Models;
use App\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Discussion extends Model
{
    public function timeStamp(){
        return $this->created_at->diffForHumans();
    }

    public function owner(){
        return User::find($this->thread_owner);
    }
}
