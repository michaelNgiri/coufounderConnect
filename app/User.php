<?php

namespace App;

use App\Models\Message;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Model\Auth\EmailVerification;
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
    public function userVerification()
    {
        return $this->hasOne(userVerification::class);
    }
 

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
//    public  function  messageSender(){
//        return $this->hasOne(Message::class);
//    }
//    public function messageRecipient(){
//        return $this->hasOne(Message::class);
//    }
}