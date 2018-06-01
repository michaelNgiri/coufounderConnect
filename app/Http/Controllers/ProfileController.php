<?php

namespace App\Http\Controllers;

use App\Models\Availability;
use App\Models\Connection;
use App\Models\Country;
use App\Models\Message;
use App\Models\Skill;
use Illuminate\Http\Request;
use Auth;
use App\User;
use  App\Mail\VerifyEmail;
use  App\Notifications\VerifyEmailNotification;
use Carbon\Carbon;
use Exception;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $userId = Auth::user()->id;

        $messages = Message::where('recipient_id', $userId)->where('read', false)->get();
        $noOfMessages = count($messages);
        $connectionRequests = Connection::where('receiver_id', Auth::user()->id)->where('accepted', false)->get();
        $noOfConnectionRequests = count($connectionRequests);


        if ($user->verificationSent()) {

            return view('auth.profile', compact('noOfMessages', 'noOfConnectionRequests'));
        } else {
            try {
                if ($user->notify(new VerifyEmailNotification($this, redirect()->intended('/')->getTargetUrl()))) {
                    if (
                    User::where('id', $userId)->update([
                        'verification_sent_at' => Carbon::now(),
                        'email_verification_code' => str_random(33)
                    ])
                    ) {
                        $success = 'verification link has been sent to your email.';
                        return view('auth.profile', compact('noOfMessages', 'noOfConnectionRequests', 'success'));
                    }
                }
            } catch (\Exception $e) {

                logger($e);
            }
        }
        return view('auth.profile', compact('noOfMessages', 'noOfConnectionRequests'));
    }

    public function update()
    {
        $skills = Skill::all();
        $countries = Country::all();
        $availabilities = Availability::all();
        return view('auth.profile-update', compact('skills', 'countries', 'availabilities'));
    }

    public function saveImage(Request $request)
    {
        $this->validate($request, [
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $userId = Auth::User()->id;
        if ($request->hasFile('avatar')) {
            /**upload file to database */

            $file = $request->avatar;
            $format = $file->getClientOriginalExtension();
            $name = $file->getClientOriginalName();
            $size = $file->getClientSize();
            $fileName = time() . $name;
            // $path=public_path().'/'.'img'.'/'.'profile-pictures'.'/'.$fileName;
            $image_path = 'img' . '/' . 'profile-pictures' . '/' . $fileName;
            $file->move('img' . '/' . 'profile-pictures', $fileName);

            User::find($userId)->first()->update([
                'image_path' => $image_path,
            ]);
        }
        return back();

    }
    public function saveUpdate(Request $request)
    {
        $userId = Auth::User()->id;


            $input = collect(request()->all())->filter()->all();
            //$input = collect(request()->except(['_token'])->filter());

            User::find($userId)->update($input);


            return back();

//
//            User::where('id', $userId)->update([
//                'first_name'=>$request->first_name,
//                'last_name'=>$request->last_name,
//                'date_of_birth'=>$request->date_of_birth,
//                'address'=>$request->address,
//                'city'=>$request->city,
//                'phone'=>$request->phone,
//                'primary_role'=>$request->primary_role,
//                'secondary_role'=>$request->secondary_role,
//                'country'=>$request->country,
//                'availability'=>$request->availability,
//
//            ]);
    }

    public function showImage($filename)
    {
        try {
            return response()->download(storage_path('app/public/uploads/avatars' . DS . $filename), null, [], null);
        } catch (\Exception $e) {
            return 'File Not Found!';
        }
    }

    public function VerifyEmail(Request $request)
    {
        $verificationCode = $request->code;
        $userId = Auth::user()->id;

        $messages = Message::where('recipient_id', $userId)->where('read', false)->get();
        $noOfMessages = count($messages);
        $connectionRequests = Connection::where('receiver_id', Auth::user()->id)->where('accepted', false)->get();
        $noOfConnectionRequests = count($connectionRequests);

        if (
        User::where('email_verification_code', $verificationCode)->update([
            'verified_at' => Carbon::now()
        ])) {
            $success = 'Congratulations, your email has been verified.';
            return view('auth.profile', compact('noOfMessages', 'noOfConnectionRequests', 'success'));

        } else {
            $warning = 'verification failed! your verification code does not exist or have expired. Hit the resend button';
            return view('auth.profile', compact('noOfMessages', 'noOfConnectionRequests', 'warning'));
        }
    }

        public function resendVerificationLink(){

            $user = Auth::user();
            $userId = Auth::user()->id;

            $messages = Message::where('recipient_id', $userId)->where('read', false)->get();
            $noOfMessages = count($messages);
            $connectionRequests = Connection::where('receiver_id', Auth::user()->id)->where('accepted', false)->get();
            $noOfConnectionRequests = count($connectionRequests);


            $user->notify(new VerifyEmailNotification());

            $success = 'Verification link has been sent to your email';
            return view('auth.profile', compact('noOfMessages', 'noOfConnectionRequests', 'success'));


        }

}