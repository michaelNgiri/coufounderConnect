<?php

namespace App;

use App\Models\Availability;
use App\Models\Country;
use App\Models\Message;
use App\Models\Skill;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Auth\EmailVerification;
use Carbon\Carbon;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password', 'first_name', 'last_name'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    //eloquent relationship with user verification
//    public function userVerification()
//    {
//        return $this->hasOne(userVerification::class);
//    }
 

    public function name(){
        return $this->first_name .'  '.$this->last_name;
    }
    public function isVerified(){
        return !is_null( $this->verified_at);
    }
    public function username(){
        return $this->username;
    }
    public function imagePath(){
    	$filename = is_null($this->image_path) ? asset('img/profile-pictures/default.jpg') : $this->image_path;

        return $filename;
    }
    public function emailVerificationCode(){
        return $this->email_verification_code;
    }

     public function emailVerified()
    {
        if($this->verified_at == NULL) {
             return true;
     }else{
        return false;
     }
    }

    public function verificationSent(){
        if(!is_null($this->verification_sent_at)) {
            return true;
        }else{
            return false;
        }
    }
    public function message(){
        return $this->hasMany(Message::class);
    }
   public function country(){
        return Country::find($this->country)->name;
   }
    public function location(){
       $address = !is_null($this->address)? $this->address.','.' ': null;
       $city = !is_null($this->city)? $this->city.','.' ': null;
       $country = !is_null($this->country())? $this->country(): null;
        if (!is_null($address) && !is_null($city) && !is_null($country)) {
            return $address . $city . $country;
        }else{
            return null;
        }
    }
    public function primaryRole(){
        if ($this->primary_role) {
            return Skill::find($this->primary_role);
        }else{
            return null;
        }
    }
    public function secondaryRole(){
        if ($this->secondary_role) {
            return Skill::find($this->secondary_role);
        }else{
            return null;
        }
    }
    public function availability(){
        return Availability::find($this->availability);
    }
    public function hasNoSocial(){
      if(is_null($this->facebook) && is_null($this->twitter) && is_null($this->linkedin) && is_null($this->website)){
          return true;
      }else{
          return false;
      }
    }

//    social media function. needs to be modified, append https
    public function facebook(){
        return '//'.$this->facebook;
    }
    public function twitter(){
        return '//'.$this->twitter;
    }
    public function linkedin(){
        return '//'.$this->linkedin;
    }
    public function website(){
        return '//'.$this->website;
    }
    public function instagram(){
        return '//'.$this->instagram;
    }
//    public function birthday(){
//
//        $dob = $this->date_of_birth;
//        return $dob->diffForHumans();
//    }
//    public  function  messageSender(){
//        return $this->hasOne(Message::class);
//    }
//    public function messageRecipient(){
//        return $this->hasOne(Message::class);
//    }
}