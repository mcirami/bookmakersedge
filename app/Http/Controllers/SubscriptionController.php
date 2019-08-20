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

	/**
	 * Show the register free new user page
	 *
	 */
	public function freeRegister() {

		return view('guest.free-register');
	}

	public function createNewFreeUser(RegistrationRequest $request, UserService $user) {

		$user->createFreeUser($request);

		$this->trackingPostback();

		$firePixel = "true";

		return redirect( '/member-home' )->with(['firePixel' => $firePixel]);
	}

	/**
	 * Show the subscribe for 30 days new user page
	 *
	 */
	public function subscriptionRegister() {

		return view('guest.subscription-register');
	}

	public function createClickBankUser(RegistrationRequest $request, UserService $createUser) {

		$user = $createUser->createClickBankUser($request);

		$firstName = $user->first_name != null ? $user->first_name : "";
		$lastName = $user->last_name != null ? $user->last_name : "";

		$name = $firstName . " " . $lastName;
		$email = $user->email;

		$this->trackingPostback();

		return redirect('http://1.jvax157.pay.clickbank.net/?cbskin=24677&name=' . $name . '&email=' . $email);
	}

	public function reinstateSubscription() {

		$user = Auth::user();
		$receipt =  $user['clickbank_receipt'];

		$this->reinstateSubCurl($receipt);

	}

	protected function trackingPostback() {

		if ( isset( $_COOKIE['bookmakers-clickid'] ) ) {
			$clickid = $_COOKIE['bookmakers-clickid'];

			$ch = curl_init();

			$path = "http://trafficmasters.trackyourstats.com/?uid=tfms&clickid=" . $clickid;

			curl_setopt($ch, CURLOPT_URL, $path);

			curl_setopt($ch, CURLOPT_POST, true);

			curl_setopt($ch, CURLOPT_POSTFIELDS, $clickid);

			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

			$response = curl_exec($ch);

			curl_close($ch);

			$decode = json_decode($response, true);

			echo "<script type=\"text/javascript\">
				new Image().src=\"https://cn.rtclx.com/conv/?v=NjA4MDIyMWUzZTA1ZjkwZmE5NTc5MmVmOThkMTk3YmE6MjU0MTM%3D&p=4229&r=\";
				</script>";
		}
	}

	protected function reinstateSubCurl($receipt) {

		//$host = "https://api.clickbank.com/";
		$path = "https://api.clickbank.com/rest/1.3/orders2/". $receipt . "/reinstate";

		$ch = curl_init();

		// endpoint url
		curl_setopt($ch, CURLOPT_URL, $path);

		curl_setopt($ch, CURLOPT_HEADER, true);

		// set request as regular post
		curl_setopt($ch, CURLOPT_POST, true);

		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

		// set data to be send
		curl_setopt($ch, CURLOPT_POSTFIELDS, $receipt);

		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

		// set header
		curl_setopt($ch, CURLOPT_HTTPHEADER, array("Accept: application/json", "Authorization: DEV-CD1T1C38T9B36CPBK4H1MCIF32V9OOK0:API-PCTBN1REOP5H67Q0BL2NCLDK38R8LVMK"));

		// return transfer as string
		//curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

		$response = curl_exec($ch);
		curl_close($ch);

		$decode = json_decode($response, true);

		dd($decode);
	}
}
