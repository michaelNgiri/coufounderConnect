<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//this is not in use currently
class EmailVerificationController extends Controller
{
    
     public function verify(UserVerification $token)
    {
    	//
    }
 
    public function resend(Request $request)
    {
    	//
    }
}
