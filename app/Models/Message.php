<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Message extends Model
{
    protected $fillable = ['read_at'];
    //
//    public function user(){
//        return $this->belongsTo(User::class);
//    }

    /**
     * @return mixed
     * get the sender of the email
     */
public  function sender(){
    return User::find($this->sender_id);
}
    public function timeStamp(){
    return $this->created_at->diffForHumans();
    }

    public function read(){
        is_null($this->read_at)? $status = false: $status = true;
        return $status;
    }
}
