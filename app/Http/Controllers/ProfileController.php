<?php

namespace App\Http\Controllers;

use App\Models\Connection;
use App\Models\Message;
use Illuminate\Http\Request;
use Auth;
use App\User;
use  App\Mail\VerifyEmail;
use  App\Notifications\VerifyEmailNotification;
use Carbon\Carbon;

class ProfileController extends Controller
{
    public function index(){
        $user = Auth::user();
        $userId = Auth::user()->id;

        $messages = Message::where('recipient_id', $userId)->where('read', false)->get();
        $noOfMessages = count($messages);
        $connectionRequests = Connection::where('receiver_id', Auth::user()->id)->where('accepted', false)->get();
        $noOfConnectionRequests = count($connectionRequests);


        if($user->verificationSent()){

            return view('auth.profile', compact('noOfMessages', 'noOfConnectionRequests'));
        }else{
         try{
               if( $user->notify(new VerifyEmailNotification($this, redirect()->intended('/')->getTargetUrl())))
                    { 
                            if (
                            User::where('id', $userId)->update([
                                'verification_sent_at'=>Carbon::now(),
                                'email_verification_code'=> str_random(33)
                            ])) {
                                session()->flash('success', 'verification Sent.');
                                return view('auth.profile', compact('noOfMessages','noOfConnectionRequests'));
                            }
                         }
                } catch (\Exception $e) {
            
            logger($e);
         }
     }
     return view('auth.profile', compact('noOfMessages', 'noOfConnectionRequests'));
   }

    public function update(){

    	return view('auth.profile-update');
    }

    public function saveUpdate(Request $request){

 if ($request->hasFile('avatar')) {
    	     /**upload file to database */
                
                $file=$request->avatar;
                $format=$file->getClientOriginalExtension();
                $name= $file->getClientOriginalName(); 
                $size=$file->getClientSize(); 
                $fileName  = time().$name;
               // $path=public_path().'/'.'img'.'/'.'profile-pictures'.'/'.$fileName;
                $image_path = 'img'.'/'.'profile-pictures'.'/'.$fileName;
                $file->move('img'.'/'.'profile-pictures',$fileName);
           
          $userId=Auth::User()->id;
          User::where('id', $userId)->update([
            'image_path'=>$image_path
          ]);
          return view('auth.profile');

    }else{
    	return back();
    }
}

public function showImage($filename)
    {
        try {
            return response()->download(storage_path('app/public/uploads/avatars' . DS . $filename), null,[],null);
        } catch (\Exception $e) {
            return 'File Not Found!';
        }
    }

    public function VerifyEmail(Request $request){
        User::where('email_verification_code', $request->code)->update([
            'verified_at' => Carbon::now()
        ]);
        session()->flash('success', 'verification complete.');
        return view('auth.profile');
    }
}
