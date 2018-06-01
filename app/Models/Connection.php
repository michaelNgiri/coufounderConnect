<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Connection extends Model
{
   public  function hasConnection(){}

   public function sender(){
       return User::find($this->sender_id)->first()->name;
   }
}
