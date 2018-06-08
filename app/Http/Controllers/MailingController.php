<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MailList;

class MailingController extends Controller
{
    public function joinMailList(Request $request){
        is_null($request->user_id)? $id = '': $id=$request->user_id;
        $mailList = new MailList();
        $mailList->user_id = $id;
//        $mailList->save();
        $success = 'congratulations! you are in';
        return view('mailing.confirm-join', compact('success'));
    }
}
