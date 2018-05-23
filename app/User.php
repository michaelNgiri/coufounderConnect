<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

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
}