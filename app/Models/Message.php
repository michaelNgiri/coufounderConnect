<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
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
}
