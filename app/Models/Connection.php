<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Connection extends Model
{
    protected $fillable = ['accepted_at', 'spammed_at', 'blocked_at'];

   public  function hasConnection(){}

   public function sender(){
       return User::find($this->sender_id)->first();
   }

   public function recipient(){
       return User::find($this->receiver_id);
   }
   public function timeStamp(){
       return $this->created_at->diffForHumans();
   }
   public function primaryRole(){
       !is_null($this->primary_role)? $skill = Skill::find($this->primary_role): $skill =  null;
       return $skill;
   }
   public function secondaryRole(){
       !is_null($this->secondary_role)? $skill2 = Skill::find($this->secondary_role): $skill2 =  null;
       return $skill2;
   }
   public function accepted(){
       is_null($this->accepted_at)? $status= false: $status= true;
       return $status;
   }
   public function cancelled(){
       !is_null($this->delete_at)? $status = false: $status = true;
       return $status;
   }
   public function spammed(){
       is_null($this->spammed_at)? $status = false: $status = true;
       return $status;
   }
   public function blocked(){
       is_null($this->blocked_at)? $status = false: $status = true;
   }
   public function delete(){
       if (!is_null($this->accepted_at) && is_null($this->spammed_at) && is_null($this->blocked_at)){
           $this->update([
              'deleted_at'=>Carbon::now()
           ]);
       }
   }

}
