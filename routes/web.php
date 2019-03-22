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
});

Route::group(['middleware' => 'guest'], function() {
	Route::get('/', 'HomeController@index')->name('guest.home');
	Route::get('register', 'UserController@register')->name('Register Free Now');
	Route::get('our-method', 'GuestController@method')->name('Our Method');
	Route::post('free-register', 'SubscriptionController@registerNewUser');
});

Route::group(['middleware' => 'auth'], function(){
	Route::get('member-home', 'HomeController@member')->name('Home Page');
	Route::get('membership-account', 'UserController@index')->name('Account');
	Route::get('membership-account/update', 'UserController@update')->name('Update Account Info');
	Route::post('account/update', 'SubscriptionController@updateUserInfo');
	Route::get('membership-account/change-password', 'UserController@changePassword')->name('Change Password');
	Route::post('account/change-password', 'SubscriptionController@changeUserPassword');
	Route::get('reports', 'PickController@reports')->name('Reports');
	Route::get('our-method-member', 'UserController@method')->name('Our Method');

	Route::get('membership-account/cancel', 'UserController@cancel')->name('Cancel My Membership');
	Route::get('membership-account/upgrade', 'UserController@upgrade')->name('Upgrade My Membership');
	Route::post('subscription/upgrade', 'SubscriptionController@upgradeUserSubscription');
	Route::post('subscription/cancel', 'SubscriptionController@cancelUserSubscription');
	Route::get('membership-levels', 'PlanController@index')->name('Membership Levels');
	Route::get('membership-level/{plan}', 'PlanController@show')->name('Join Now');
	Route::post('subscribe', 'SubscriptionController@subscribe');
	Route::get('braintree/token', 'BraintreeTokenController@token');
});

Route::group(['middleware' => 'provider'], function(){
	Route::get('submit-picks', 'PickController@index')->name('Make Your Picks');
	Route::post('submit-picks/save', 'PickController@saveNewPicks');
	Route::post('submit-picks/update', 'PickController@updatePick');
	Route::get('grade-picks', 'PickController@grade')->name('Grade Your Picks');
	Route::post('grade-picks/save', 'PickController@saveGrade');
});


