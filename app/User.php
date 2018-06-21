<?php

namespace App;

use App\Models\Availability;
use App\Models\Cofounder;
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
        'username', 'email', 'password', 'first_name', 'last_name', 'slug'
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

    /**
     * check if the user is verified
     * @return bool
     */
    public function isVerified(){
        return !is_null( $this->verified_at);
    }
    public function username(){
        return $this->username;
    }

    /**
     * return a default picture if the user has not uploaded a profile photo
     * @return mixed|string
     */
    public function imagePath(){

    	$filename = is_null($this->image_path) ? asset('img/profile-pictures/default.jpg') : $this->image_path;

        return $filename;
    }

    /**
     * this verification code will be used to verify
     * @return mixed
     */
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

    /**
     * check if a verification link has been sent to the user.
     * @return bool
     */
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

    /**
     * prevent the 'trying to get property of non object' error by returning an empty string if the user has not updated their country
     * @return string
     */
    public function country(){
        is_null($this->country)? $country ='': $country = Country::find($this->country)->name;
        return $country;
   }

    /**
     * concatenate the city, country and street address into one address line
     * @return null|string
     */
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

    /**
     * the users primary and secondary role is fetched from the skills table
     * skills table has an accompanying seeder
     * @return null
     */
    public function primaryRole(){
        if ($this->primary_role) {
            return Skill::find($this->primary_role);
        }else{
            return null;
        }
    }

    /**
     * same pattern as the primary role but can be ignored when checking users profile update status
     * @return null
     */
    public function secondaryRole(){
        if ($this->secondary_role) {
            return Skill::find($this->secondary_role);
        }else{
            return null;
        }
    }

    /**
     * this availability is fetched from availabilities table to ensure uniformity
     * @return mixed
     */
    public function availability(){
        return Availability::find($this->availability);
    }

    /**
     * check if the user has not added any social media link
     * @return bool
     */
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

    /**
     * calculate actual age of the user from date of birth
     * @return int|null
     */
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


    /**
     * this serves as the base condition for a user to show in the connect page
     * the user must
     * upload  a profile photo,
     * add a primary role,
     * verify email,
     * atleast add a country to the address line,
     * specify number of hours they are available in a week
     * @return bool
     */
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

    /**
     * this message shows only when the user's basic profile info has not been updated
     * @return null|string
     */
    public function profileUpdateInfo(){
    if ($this->profileUpdated()){
        return null;
    }else{
        return 'you are not yet available in search, please fill all the areas marked as important';
    }
    }

    /**
     * this makes the number of pending co-founders directly available in the users profile
     * @return int
     */
    public function noOfPendingCofounderRequests(){
        return count(Cofounder::where('cofounded_idea', $this->id)->where('accepted_at', null)->get());
    }


//
    /**
     * social media function. needs to be modified, append https
     * for now it does the function of telling the browser that the link is in an external server
     * @return string
     */
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