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
    public function comments(){
        return Comment::where('discussion_id', $this->id)->orderBy('created_at', 'desc')->paginate(3);
    }
    public function allComments(){
        return Comment::where('discussion_id', $this->id)->orderBy('created_at', 'desc')->get();
    }
}
