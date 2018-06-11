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
        is_null($this->country)? $country ='': $country = Country::find($this->country)->name;
        return $country;
   }
    public function location(){
       $address = !is_null($this->address)? $this->address.','.' ': '';
       $city = !is_null($this->city)? $this->city.','.' ': '';
       $country = !is_null($this->country())? $this->country(): '';
        if (is_null($address) && is_null($city) && is_null($country)) {
            return null;
        }else                {
            return $address . $city . $country;
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
      if(is_null($this->facebook) &&
         is_null($this->twitter) &&
         is_null($this->linkedin) &&
         is_null($this->website)){
          return true;
      }else{
          return false;
      }
    }
    public function age(){
        if (is_null($this->date_of_birth)){
            $age = null;
        }else {
            $date = $this->date_of_birth;
            $carbonDate = Carbon::parse($date);
            $age = $carbonDate->diffInYears(Carbon::now());
        }
        return $age;

    }


    public  function profileUpdated(){
        if (
        !is_null($this->image_path) &&
        !is_null($this->primary_role) &&
        !is_null($this->verified_at) &&
        !is_null($this->image_path) &&
        !is_null($this->availability) &&
        !is_null($this->date_of_birth) &&
        !is_null($this->country)
        ){
            return true;
        }else{
            return false;
        }
   }

    public function profileUpdateInfo(){
    if ($this->profileUpdated()){
        return null;
    }else{
        return 'you are not yet available in search, please fill all the areas marked as important';
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

}