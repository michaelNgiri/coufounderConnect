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


Route::get('/', 'HomeController@index')->name('home');

Route::group(['as' => 'verification.'], function () {
    Route::get('email/{code}/{id}', 'ProfileController@verifyEmail')->name('email');
    Route::get('verify-email', 'ProfileController@verifyEmail')->name('verify-email');
});


// Auth::routes();
Route::group(['as' => 'profile.', 'middleware'=>'auth'], function () {
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
    Route::post('connect/{username}','ConnectionsController@connect')->name('connect');
    Route::get('connection/requests', 'ConnectionsController@showRequests')->name('requests');
    Route::post('connection/{username}/view-profile','ConnectionsController@viewProfile')->name('view-profile');
    Route::post('connection/accept-request', 'ConnectionsController@acceptRequest')->name('accept-request');
    Route::post('connection/cancel-request', 'ConnectionsController@CancelRequest')->name('cancel-request');

    Route::get('connections/blocked-requests', 'ConnectionsController@blockedRequests')->name('blocked-requests');
    route::get('connections/all', 'ConnectionsController@allConnections')->name('all-connections');
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
    Route::get('discussion/create-new', 'DiscussionController@create')->name('create');
    Route::post('discussion/save', 'DiscussionController@saveThread')->name('save');
    Route::post('discussions/save-comment', 'DiscussionController@saveComment')->name('save-comment');
});


Route::get('/verify/token/{token}', 'EmailVerificationController@verify')->name('auth.verify');
 
Route::get('/verify/resend', 'EmailVerificationController@resend')->name('auth.verify.resend');
Route::get('verify/{code}', function(){
	return view('auth.verify-email');
});

//messaging routes
Route::group(['as' => 'messaging.'], function (){
    Route::get('messaging/show-messages', 'messagingController@index')->name('messages');
    Route::post('messaging/compose/{username}', 'MessagingController@compose')->name('compose');
    Route::post('messaging/send-message', 'messagingController@sendMessage')->name('send-message');
    Route::get('messaging/{title}/read', 'MessagingController@readMessage')->name('read-message');
    Route::post('messaging/{title}/reply', 'MessagingController@reply')->name('reply');
    Route::post('messaging/{title}/delete', 'MessagingController@delete')->name('delete');
});
//mailing routes
Route::group(['as'=>'mailing.'], function () {
    Route::post('mailing/join', 'MailingController@joinMailList')->name('join-mail-list');
});

//routes for contingency
Route::group(['as'=>'override'], function (){
    Route::get('user/override/email-verification', 'OverrideController@bypassEmailVerification')->name('verification-override');
});
// Route::get('/Register', 'RegisterController@index')->name('register');
// Route::get('/login', 'LoginController@index')->name('login');


Auth::routes();

//test route for creating a homepage
//Route::get('/temp', 'HomeController@tempHome')->name('home');
//
Route::get('test', function (){
    return view('auth.verify-email');
});
//Route::get('verify', function (){
//    return view('auth.verify-email');
//});