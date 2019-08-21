<?php

namespace App\Http\Middleware;


use Closure;
use Illuminate\Support\Facades\Auth;
use App\Services\UserService;

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

	    $service = new UserService;

	    if ($receipt) {

		    if ($service->checkClickbankStatus($receipt) == "active") {

			    return $next($request);

		    } else {

			    return redirect('/inactive');
		    }


	    } else {

		    $userRegisterDate = $user['created_at'];

		    if($user->hasRole('subscriber') && !$service->checkTrialStatus($userRegisterDate)) {

		    	return redirect('/expired');
		    }

		    return $next($request);
	    }

    }
}
