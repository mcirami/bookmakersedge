<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationRequest;
use App\Http\Requests\UpdateInfoRequest;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Cashier\Billable;

class SubscriptionController extends Controller
{

	use Billable;

	public function createNewFreeUser(RegistrationRequest $request, UserService $user) {

		$user->createFreeUser($request);

		return redirect( '/member-home' );
	}

	public function createClickBankUser(RegistrationRequest $request, UserService $createUser) {

		$user = $createUser->createClickBankUser($request);

		$firstName = $user->first_name != null ? $user->first_name : "";
		$lastName = $user->last_name != null ? $user->last_name : "";

		$name = $firstName . " " . $lastName;
		$email = $user->email;

		return redirect('http://1.jvax157.pay.clickbank.net/?cbskin=24677&name=' . $name . '&email=' . $email);
	}

	public function updateUserInfo(UpdateInfoRequest $request, UserService $user) {

		$user->updateUser($request);

		return redirect()->back()->with('success', 'Your Account Information has Been updated' );
	}

	public function changeUserPassword(Request $request, UserService $user) {

		$request->validate( [
			'currentPassword' => 'required',
			'new_password'    => 'min:6|required_with:new_password_confirm|same:new_password_confirm',
			'new_password_confirm' => 'required'
		]);

		$return = $user->changePassword($request);

		if ($return == "success" ) {
			return redirect()->back()->with('success', 'Your Password Has Been Changed' );
		} else {
			return redirect()->back()->with('error', $return );
		}
	}

	public function reinstateSubscription() {

		$user = Auth::user();

		$receipt =  $user['clickbank_receipt'];

		$host = "https://api.clickbank.com/";
		$path = "rest/1.3/orders2/". $receipt . "/reinstate";
		$ch = curl_init();

		// endpoint url
		curl_setopt($ch, CURLOPT_URL, $host . $path);

		curl_setopt($ch, CURLOPT_HEADER, true);

		// set request as regular post
		curl_setopt($ch, CURLOPT_POST, true);

		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

		// set data to be send
		//curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($receipt));

		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

		// set header
		curl_setopt($ch, CURLOPT_HTTPHEADER, array("Accept: application/json", "Authorization: DEV-CD1T1C38T9B36CPBK4H1MCIF32V9OOK0:API-SQ6474OA2QRDEUQHMU9H0NOMVBJFBQ9E"));

		// return transfer as string
		//curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		$response = curl_exec($ch);
		curl_close($ch);

		$decode = json_decode($response, true);

		dd($decode);
	}
}
