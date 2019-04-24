<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Pick;
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
	    $daysAgo      = Carbon::now()->subDays( 22 );
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

        $receipt =  $user['clickbank_receipt'];

        if ($receipt != null) {
	        $ch = curl_init();
	        curl_setopt($ch, CURLOPT_URL, "https://api.clickbank.com/rest/1.3/orders2/" . $receipt);
	        curl_setopt($ch, CURLOPT_HEADER, true);
	        curl_setopt($ch, CURLOPT_HTTPGET, true);
	        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	        curl_setopt($ch, CURLOPT_HEADER, 0);
	        curl_setopt($ch, CURLOPT_HTTPHEADER, array("Accept: application/json", "Authorization: DEV-CD1T1C38T9B36CPBK4H1MCIF32V9OOK0:API-SQ6474OA2QRDEUQHMU9H0NOMVBJFBQ9E"));
	        $result = curl_exec($ch);
	        curl_close($ch);

	        $decode = json_decode($result, true);
	        $status = strtolower($decode['orderData']['lineItemData']['status']);

	        if ($status == "active") {
		        $distinctDays = Pick::distinct()->orderBy('day', 'desc')->get(['day']);
		        $picks = Pick::get();
		        $todaysDate = Carbon::now()->format('m-d-Y');

		        return view('member.home')->with(['picks' => $picks, 'distinctDays' => $distinctDays, 'user' => $user, 'date' => $todaysDate]);
	        } else {
		        return redirect('/inactive');
	        }


        } else {

	        $userRegisterDate = $user['created_at'];

	        if($user->hasRole('subscriber') && strtotime($userRegisterDate) < strtotime('-7 days')) {
		        	return redirect('/expired');
            } else{
		        $distinctDays = Pick::distinct()->orderBy('day', 'desc')->get(['day']);
		        $picks = Pick::get();
		        $todaysDate = Carbon::now()->format('m-d-Y');

		        return view('member.home')->with(['picks' => $picks, 'distinctDays' => $distinctDays, 'user' => $user, 'date' => $todaysDate]);
            }
        }
	}

	public function inactive() {
		$user = Auth::user();
		$email = $user['email'];

		return view('member.inactive')->with(['email' => $email]);
	}

	public function expiredTrial() {
		$user = Auth::user();
		$email = $user['email'];

		return view('member.expired')->with(['email' => $email]);
	}
}
