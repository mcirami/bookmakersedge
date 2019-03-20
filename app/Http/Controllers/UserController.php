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

		/*$userRegisterDate = $user['created_at'];

		if($user->hasRole('subscriber') && $user['free_trial'] == "1" && strtotime($userRegisterDate) < strtotime('-3 days')) {
			return redirect('/membership-levels');
		} else {*/
			return view( 'member.account.index' )->with( [ 'user' => $user ] );
		//}
	}

	/**
	 * Show the membership cancel page
	 *
	 */
	public function cancel() {
		return view('member.account.cancel')->with(['user' => Auth::user()]);
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
	 * Show the membership upgrade page
	 *
	 */
	public function upgrade() {

		$user = Auth::user();
		return view('member.account.upgrade')->with(['user' => $user, 'plans' => Plan::get()]);
	}

	/**
	 * Show Our Method Page
	 *
	 */

	public function method() {

		return view('member.method');
	}
}
