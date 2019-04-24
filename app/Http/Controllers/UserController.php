<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Plan;
use Laravel\Cashier\Billable;

class UserController extends Controller
{
	use Billable;

	/**
	 * Show the register new user page
	 *
	 */
	public function register() {
		return view('guest.register');
	}

	/**
	 * Show the member account page
	 *
	 */
	public function index() {

		$user = Auth::user();

		return view( 'member.account.index' )->with( [ 'user' => $user ] );

	}

	/**
	 * Show the update account info page
	 *
	 */
	public function update() {

		$user = Auth::user();
		return view('member.account.update')->with(['user' => $user]);
	}

	public function changePassword() {
		$user = Auth::user();
		return view('auth.change-password')->with(['user' => $user]);
	}

	/**
	 * Show Our Method Page
	 *
	 */

	public function method() {

		return view('member.method');
	}
}
