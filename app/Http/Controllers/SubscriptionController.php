<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationRequest;
use App\Http\Requests\UpdateInfoRequest;
use App\Services\UserService;
use App\Services\BraintreeService;
use Illuminate\Http\Request;
use Laravel\Cashier\Billable;

class SubscriptionController extends Controller
{

	use Billable;

	public function registerNewUser(RegistrationRequest $request, UserService $user) {

		$user->createUser($request);

		return redirect( '/member-home' );
	}

	public function subscribe(Request $request, BraintreeService $braintreeSubscription) {

		return redirect( '/member-home' );
	}


	public function show($id) {
         $subscriptions = Subscription::findOrFail($id);
    	 return view('subscription.show', compact('subscriptions'));

    }

    public function upgradeUserSubscription(Request $request, BraintreeService $braintreeSubscription) {
	    $subscriptionName = $request->user()->subscriptions[0]['name'];
		$planID = $request->plan;
	    $braintreeSubscription->upgradeBraintreeSubscription($request, $subscriptionName, $planID);
	    return redirect('/membership-account')->with('success', 'Your Membership Level Has Been Changed' );

    }

	public function cancelUserSubscription(Request $request, BraintreeService $braintreeSubscription) {

		$subscriptionName = $request->user()->subscriptions[0]['name'];

		$braintreeSubscription->cancelBraintreeSubscription($request, $subscriptionName);
		return redirect('/membership-account')->with('success', 'Your Membership Has Been Cancelled' );
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
