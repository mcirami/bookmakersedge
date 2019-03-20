<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
