<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Pick;
use App\User;
use Carbon\Carbon;

class HomeController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {

	    $picks = Pick::whereNotNull('grade')->get();
	    $daysAgo      = Carbon::now()->subDays( 14 );
	    foreach ( $picks as $key => $day ) {
		    if ( strtotime( $day->day ) < strtotime( $daysAgo ) ) {
			    $picks->forget( $key );
		    }
	    }


        return view('guest.index')->with([ 'picks' => $picks]);
    }

	/**
	 * Show member home.
	 *
	 */
	public function member() {
		$user = Auth::user();

		//$userRegisterDate = $user['created_at'];

		/*if($user->hasRole('subscriber') && $user['free_trial'] == "1" && strtotime($userRegisterDate) < strtotime('-3 days')) {
			return redirect('/membership-levels');
		} else{*/
			$distinctDays = Pick::distinct()->orderBy('day', 'desc')->get(['day']);
			$picks = Pick::get();
			$todaysDate = Carbon::now()->format('m-d-Y');

			return view('member.home')->with(['picks' => $picks, 'users' => User::get(), 'distinctDays' => $distinctDays, 'user' => Auth::user(), 'date' => $todaysDate]);
		//}
	}
}
