<?php

namespace App\Http\Middleware;


use Closure;
use Illuminate\Support\Facades\Auth;

class CheckSubscriptionStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {

	    $user = Auth::user();

	    $receipt = $user['clickbank_receipt'];

	    if ($receipt != null) {
		    $ch = curl_init();
		    curl_setopt($ch, CURLOPT_URL, "https://api.clickbank.com/rest/1.3/orders2/" . $receipt);
		    curl_setopt($ch, CURLOPT_HEADER, true);
		    curl_setopt($ch, CURLOPT_HTTPGET, true);
		    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		    curl_setopt($ch, CURLOPT_HEADER, 0);
		    curl_setopt($ch, CURLOPT_HTTPHEADER, array("Accept: application/json", "Authorization: DEV-CD1T1C38T9B36CPBK4H1MCIF32V9OOK0:API-PCTBN1REOP5H67Q0BL2NCLDK38R8LVMK"));
		    $result = curl_exec($ch);
		    curl_close($ch);

		    $decode = json_decode($result, true);

		    $status = strtolower($decode['orderData']['lineItemData']['status']);

		    if ($status == "active") {

			    return $next($request);

		    } else {

			    return redirect('/inactive');
		    }


	    } else {

		    $userRegisterDate = $user['created_at'];

		    if($user->hasRole('subscriber') && strtotime($userRegisterDate) < strtotime('-7 days') /*&& $user['free_trial'] == "yes"*/) {

			    return redirect('/expired');

		    } else {

			    return $next($request);
		    }
	    }


    }
}
