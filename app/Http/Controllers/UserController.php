<?php

namespace App\Http\Controllers;
use App\Http\Requests\UpdateInfoRequest;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Cashier\Billable;

class UserController extends Controller
{
	use Billable;

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

	public function updateUserInfo(UpdateInfoRequest $request, UserService $user) {

		$user->updateUser($request);

		return redirect()->back()->with('success', 'Your Account Information has Been updated' );
	}

	public function changePassword() {
		$user = Auth::user();
		return view('auth.change-password')->with(['user' => $user]);
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

	/**
	 * Show Our Method Page
	 *
	 */

	public function method() {

		return view('member.method');
	}
}
