<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class ProviderMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {

	    if ( ! Auth::user()) {
		    return redirect('/login');
	    }

    	if(! $request->user()->hasRole('provider')) {
    		//return new Response(view('unauthorized')->with('role', 'PROVIDER'));
		    return redirect('/');
	    }

        return $next($request);
    }
}
