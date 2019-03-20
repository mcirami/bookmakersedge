<?php
/**
 * Created by PhpStorm.
 * User: matteocirami
 * Date: 10/23/18
 * Time: 6:58 PM
 */

namespace App\Services;

use App\Plan;
//use Spatie\Permission\Traits\HasRoles;
use Illuminate\Foundation\Auth\RegistersUsers;
//use Backpack\CRUD\CrudTrait;
use Laravel\Cashier\Billable;

class BraintreeService {

	use RegistersUsers, Billable;
	//use HasRoles;

	public function createBraintreeSubscription($request) {

		// get the plan after submitting the form
		$plan = Plan::findOrFail( $request->plan );

		// Subscribe the user
		$request->user()->newSubscription(
			$plan->name,
			$plan->braintree_plan )
		        ->trialDays($plan->trial_duration)
		        ->create( $request->payment_method_nonce, [
			        'firstName' => $request->first_name,
			        'lastName' => $request->last_name,
		        	'creditCard' => [
		        		'billingAddress' => [
		        			'firstName' => $request->first_name,
				            'lastName' => $request->last_name,
				            'streetAddress' => $request->address,
					        'locality' => $request->city,
					        'region' => $request->state,
					        'postalCode' => $request->postal_code,
					        'countryName' => $request->country
				        ]
			        ]
		        ]);
	}

	public function cancelBraintreeSubscription($request, $subscriptionName) {

		$request->user()->subscription($subscriptionName)->cancel();

	}

	public function upgradeBraintreeSubscription($request, $subscriptionName, $planID) {

		$plan = Plan::where('braintree_plan', $planID)->first();
		$planName = $plan->name;
		$request->user()->subscription($subscriptionName)->swap($planID)->update(['name' => $planName]);
	}
}