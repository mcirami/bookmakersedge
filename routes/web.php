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

Auth::routes();

Route::group(['middleware' => 'web'], function() {
	Route::get('logout', 'Auth\LoginController@logout');
	Route::get('privacy-policy', 'GuestController@privacy')->name('Privacy Policy');
	Route::get('terms-of-service', 'GuestController@terms')->name('Terms Of Service');
	Route::get('thank-you', 'GuestController@thankYou')->name('Thank You');
    Route::get('unsubscribe/{user}', 'NotificationController@index')->name('Unsubscribe');
});

Route::group(['middleware' => 'guest'], function() {
	Route::get('/', 'HomeController@index')->name('guest.home');
	Route::get('our-method', 'GuestController@method')->name('Our Method');
	Route::get('free-register', 'SubscriptionController@freeRegister')->name('Register Free Now');
    Route::get('free-register2', 'SubscriptionController@freeRegister2')->name('register2');
	Route::post('free-register', 'SubscriptionController@createNewFreeUser');
	Route::get('subscription-register', 'SubscriptionController@subscriptionRegister')->name('Subscribe Now');
	Route::post('subscription-register', 'SubscriptionController@createClickBankUser');

   /* Route::get('mailable', function () {

        return new App\Mail\PickSubmittedEmail();
    });*/
});

Route::group(['middleware' => 'auth'], function(){
	Route::get('inactive', 'HomeController@inactive');
	Route::get('expired', 'HomeController@expiredTrial');
	Route::get('our-method-member', 'UserController@method')->name('Our Method');
	Route::post('subscribe', 'SubscriptionController@subscribe');
	Route::post('reinstate-subscription', 'SubscriptionController@reinstateSubscription');
});

Route::group(array('middleware' => ['auth', 'isActive']), function(){
	Route::get('member-home', 'HomeController@member')->name('Home Page');
	Route::get('membership-account', 'UserController@index')->name('Account');
	Route::get('membership-account/update', 'UserController@update')->name('Update Account Info');
	Route::post('account/update', 'UserController@updateUserInfo');
	Route::get('membership-account/change-password', 'UserController@changePassword')->name('Change Password');
	Route::post('account/change-password', 'UserController@changeUserPassword');
	Route::get('reports', 'PickController@reports')->name('Reports');
});

Route::group(['middleware' => 'provider'], function(){
	Route::get('submit-picks', 'PickController@index')->name('Make Your Picks');
	Route::post('submit-picks/save', 'PickController@saveNewPicks');
	Route::patch('/submit-picks/{pick}/update', 'PickController@update');
	Route::delete('/submit-picks/{pick}/delete', 'PickController@destroy');
	Route::get('grade-picks', 'PickController@grade')->name('Grade Your Picks');
});




