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

Route::get('test', function (){
    return view('test');
});
Route::get('verify', function (){
    return view('auth.verify-email');
});


Route::get('/', 'HomeController@index')->name('index');

Route::group(['as' => 'verification.'], function () {
Route::get('email/{code}/{username}', 'ProfileController@verifyEmail')->name('email');
Route::get('verify-email', 'Auth\ProfileController@verifyEmail')->name('verify-email');
});
// Auth::routes();
Route::group(['as' => 'profile.', 'middleware'=>'auth'], function () {
Route::get('/home', 'ProfileController@index')->name('profile');
Route::get('profile', 'ProfileController@index')->name('view');
Route::get('update-profile', 'ProfileController@update')->name('update');
Route::post('profile/update', 'ProfileController@saveUpdate')->name('save-update');
Route::post('profile/update-photo', 'ProfileController@saveImage')->name('save-image');
Route::get('profile/resend-verification-link', 'ProfileController@resendVerificationLink')->name('resend-verification');
});

//connections route
Route::group(['as' => 'connections.'], function () {
Route::get('connections/view-all','ConnectionsController@index')->name('index');
Route::get('connections/my-connections', 'ConnectionsController@myConnections')->name('my-connections');
Route::get('connect/{name}/{id}','ConnectionsController@connect')->name('connect');
Route::get('connection/requests', 'ConnectionsController@showRequests')->name('requests');
Route::get('connection/{username}/view-profile','ConnectionsController@viewProfile')->name('view-profile');
});

//ideas route
Route::group(['as' => 'ideas.'], function (){
    Route::get('ideas','IdeasController@view')->name('idea');
    Route::get('ideas/my-ideas', 'IdeasController@myIdeas')->name('my-idea');
    Route::get('post-idea', 'IdeasController@post')->name('post-idea');
    Route::get('submit','IdeasController@save')->name('submit-idea');
    Route::get('idea/view-details', 'IdeasController@showDetails')->name('details');
});

Route::group(['as' => 'discussions.'], function (){
    Route::get('discussion', 'DiscussionController@index')->name('index');
});


Route::get('/verify/token/{token}', 'Auth\EmailVerificationController@verify')->name('auth.verify'); 
 
Route::get('/verify/resend', 'Auth\EmailVerificationController@resend')->name('auth.verify.resend');
Route::get('verify/{code}', function(){
	return view('auth.verify-email');
});

//messaging routes
Route::group(['as' => 'messaging.'], function (){
Route::get('messaging/show-messages', 'messagingController@index')->name('messages');
Route::get('messaging/compose/{id}/{name}', 'MessagingController@compose')->name('compose');
Route::get('messaging/send-message', 'messagingController@sendMessage')->name('send-message');
Route::get('messaging/{id}/{title}/read', 'MessagingController@readMessage')->name('read-message');
});

// Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/Register', 'RegisterController@index')->name('register');
// Route::get('/login', 'LoginController@index')->name('login');

//Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
