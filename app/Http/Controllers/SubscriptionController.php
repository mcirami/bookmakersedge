<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationRequest;
use App\Http\Requests\UpdateInfoRequest;
use App\Services\UserService;
use Illuminate\Http\Request;
use Laravel\Cashier\Billable;

class SubscriptionController extends Controller
{

	use Billable;

	public function registerNewFreeUser(RegistrationRequest $request, UserService $user) {

		$user->createFreeUser($request);

		return redirect( '/member-home' );
	}

	public function subscribeClickBankUser(Request $request, UserService $createClickBankUser) {

		$createClickBankUser->createClickBankUser($request);

		return view('guest.ipn');
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
}
