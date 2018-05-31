<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    public function userCountry(){
        return $this->name;
    }
}
