<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OverrideController extends Controller
{

    public function bypassEmailVerification(){
        return view('auth.verify-email');
    }
}
