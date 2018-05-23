<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UserVerification extends Model
{
    
    public function user(){
    	return $this->belongsTo(User::class);
    }

    public function getRouteKeyName()
	{
		return 'token';
	}
 
}
