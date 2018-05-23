<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/home', 'ProfileController@index')->name('profile');
Route::get('/', 'HomeController@index')->name('index');

// Auth::routes();
Route::group(['as' => 'profile.'], function () {
Route::get('profile', 'ProfileController@index')->name('view');
Route::get('update-profile', 'ProfileController@update')->name('update');
Route::post('profile/update', 'ProfileController@saveUpdate')->name('save-update');
});

//connections route
Route::group(['as' => 'connections.'], function () {
Route::get('connect','ConnectionsController@connect')->name('connect');
});

//ideas route
Route::group(['as' => 'ideas.'], function (){
Route::get('ideas','IdeasController@view')->name('idea');
Route::get('post-idea', 'IdeasController@post')->name('post-idea');
Route::get('submit','IdeasController@save')->name('submit-idea');
});


Route::get('/verify/token/{token}', 'Auth\EmailVerificationController@verify')->name('auth.verify'); 
 
Route::get('/verify/resend', 'Auth\EmailVerificationController@resend')->name('auth.verify.resend');


// Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/Register', 'RegisterController@index')->name('register');
// Route::get('/login', 'LoginController@index')->name('login');

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
