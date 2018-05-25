<?php

namespace App\Models\Auth;

use Illuminate\Database\Eloquent\Model;
use App\User;

class EmailVerification extends Model
{
    protected $table = 'email_verifications';

    protected $fillable = ['verified', 'code', 'expire_at', 'verified_at'];

    protected $dates = ['expire_at', 'verified_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    } // end function user

}
