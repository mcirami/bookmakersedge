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

	public function createUser($request) {

		$user = User::create([
             'first_name' => $request['first_name'],
             'last_name' => $request['last_name'],
             'email' => $request['email'],
             'username' => $request['username'],
             'password' => Hash::make($request['password']),
		])->assignRole(['subscriber']);

		auth()->login($user);
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
}