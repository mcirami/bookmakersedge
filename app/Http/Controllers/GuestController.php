<?php

namespace App\Http\Controllers;

use App\User;

class GuestController extends Controller
{
	/**
	 * Show the privacy policy page.
	 *
	 */
	public function privacy() {
		return view('guest.privacy');
	}

	/**
	 * Show the terms of service page.
	 *
	 */
	public function terms() {
		return view('guest.terms');
	}

	/**
	 * Show the Our Method page.
	 *
	 */
	public function method() {
		return view('guest.method');
	}

	/**
	 * Show the Our Method page.
	 *
	 */
	public function thankYou() {

		$name = (isset($_GET['cname']) && $_GET['cname'] != "") ? $_GET['cname'] : "";

		$email = (isset($_GET['cemail']) && $_GET['cemail'] != "") ? $_GET['cemail'] : "";

		$user = User::where('email', $email)->first();

		if($user['free_trial'] == 1) {
			$newAccount = false;
		} else {
			$newAccount = true;
		}

		return view('guest.thank-you')->with(['name' => $name, 'email' => $email, 'newAccount' => $newAccount]);
	}
}
