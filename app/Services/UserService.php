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
		])->assignRole(['subscriber']);

		auth()->login($user);
	}

	public function createClickBankUser($message) {

		$secretKey = "JVAX2019BME00";

		// get JSON from raw body...
		$message = json_decode(file_get_contents('php://input'));

		if($message != null) {
			// Pull out the encrypted notification and the initialization vector for
			// AES/CBC/PKCS5Padding decryption
			$encrypted = $message->{'notification'};
			$iv = $message->{'iv'};
			error_log("IV: $iv");

			// decrypt the body...
			$decrypted = trim(
				openssl_decrypt(base64_decode($encrypted),
					'AES-256-CBC',
					substr(sha1($secretKey), 0, 32),
					OPENSSL_RAW_DATA,
					base64_decode($iv)), "\0..\32");

			error_log("Decrypted: $decrypted");

			////UTF8 Encoding, remove escape back slashes, and convert the decrypted string to a JSON object...
			$sanitizedData = utf8_encode(stripslashes($decrypted));
			$order = json_decode($decrypted, true);

			$receipt = $order['receipt'];
			$email = $order['customer']['billing']['email'];
			$username = explode("@", $email);
			$firstName = $order['customer']['billing']['firstName'];
			$lastName = $order['customer']['billing']['lastName'];

			$user = User::where('email', $email)->first();

			if($user == null) {

				$user = User::create( [
					'first_name'        => $firstName,
					'last_name'         => $lastName,
					'email'             => $email,
					'username'          => $username[0],
					'password'          => Hash::make( 'temppass123' ),
					'free_trial'        => '0',
					'clickbank_receipt' => $receipt
				] )->assignRole( [ 'subscriber' ] );
			} else {
				$user->clickbank_receipt = $receipt;
				$user->save();
			}
		}
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