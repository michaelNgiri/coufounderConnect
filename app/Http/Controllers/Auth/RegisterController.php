<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use  App\Notifications\VerifyEmailNotification;
use Illuminate\Http\Request;
use Exception;
use Carbon\Carbon;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    public function index(){
        return view('auth.register');
    }

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/profile';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {

        return Validator::make($data, [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'username' => 'required|string|between:3,60',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'username' => 'required|string|between:4,50|unique:users,username',
        ],
            [
                'username.unique' => 'that Username is already taken! please try something else',
            ]
        );

    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $slug = $maybe_slug = strtolower($data['first_name'] . '-' . $data['last_name']);
        $next = 2;

        while (User::where('slug', '=', $slug)->first()) {
            $slug = "{$maybe_slug}.'-'.{$next}";
            $next++;
        }

        return User::create([

            'username' => $data['username'],
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'slug'=>$slug,
            'password' => Hash::make($data['password']),
        ]);
    }




    // protected function registered(Request $request, $user)
    // {
    //     try {
    //         $user->notify(new VerifyEmailNotification($user, redirect()->intended('/')->getTargetUrl()));
    //     } catch (Exception $e) {
    //         logger($e);
    //     }
    // }
}
