<?php
/**
 * Created by PhpStorm.
 * User: matteocirami
 * Date: 10/24/18
 * Time: 3:30 PM
 */

namespace App\Services;

use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
//use Spatie\Permission\Traits\HasRoles;

class UserService {

	use RegistersUsers;
	//use HasRoles;

	public function createFreeUser($request) {

		$user = User::create([
             'first_name' => $request['first_name'],
             'last_name' => $request['last_name'],
             'email' => $request['email'],
             'username' => $request['username'],
             'password' => Hash::make($request['password']),
             'free_trial' => 'yes',
		])->assignRole(['subscriber']);

		auth()->login($user);

		return $user;
	}

	public function createClickBankUser($request) {

		return $user = User::create( [
			'first_name'        => $request['first_name'],
			'last_name'         => $request['last_name'],
			'email'             => $request['email'],
			'username'          => $request['username'],
			'password'          => Hash::make($request['password']),
		] )->assignRole( [ 'subscriber' ] );
	}

	public function updateUser($request) {
		$user = Auth::User();

		$user->username = $request->username;
		$user->email = $request->email;

		$user->save();
	}

	public function changePassword($request) {

		$user = Auth::User();

		if ( ( Hash::check( $request->currentPassword, $user->password ) ) ) {
			//Change Password
			$user->password = bcrypt( $request->new_password );
			$user->save();

			return "success";
		}

		$error = "Current Password does not match what is stored";
		return $error;
	}

	public function checkClickbankStatus($receipt) {

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "https://api.clickbank.com/rest/1.3/orders2/" . $receipt);
		curl_setopt($ch, CURLOPT_HEADER, true);
		curl_setopt($ch, CURLOPT_HTTPGET, true);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array("Accept: application/json", "Authorization: DEV-CD1T1C38T9B36CPBK4H1MCIF32V9OOK0:API-PCTBN1REOP5H67Q0BL2NCLDK38R8LVMK"));
		$result = curl_exec($ch);
		curl_close($ch);

		$decode = json_decode($result, true);

		return strtolower($decode['orderData']['lineItemData']['status']);

	}

	public function checkTrialStatus($userRegisterDate) {

		 if (strtotime($userRegisterDate) < strtotime('-7 days')) {
		 	return false;
		 }

		 return true;
	}

	public function unsubscribeFromNotifications($userID) {

        $user = User::find($userID)->first();
        $user->subscribed = false;

        $user->save();
    }
}
