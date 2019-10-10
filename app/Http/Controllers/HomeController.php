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
        //$this->middleware(['auth' => 'verified'])->except('index');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {

        $dateMin = Carbon::now()->subDays( 21 );
        $picks = Pick::orderBy('day', 'desc')->whereNotNull( 'grade' )->whereDate('day', '>=', $dateMin)->get();

	    $clickid = (isset($_GET['clickid']) && $_GET['clickid'] != "") ? $_GET["clickid"] : "";

	    setcookie("bookmakers-clickid", $clickid, time() + (86400 * 30), "/");

        return view('guest.index')->with([ 'picks' => $picks]);
    }

	/**
	 * Show member home.
	 *
	 */
	public function member() {

		$user = Auth::user();

		$distinctDays = Pick::distinct()->orderBy('day', 'desc')->get(['day']);
		$picks = Pick::get();
		$todaysDate = Carbon::now()->format('m-d-Y');

		return view('member.home')->with(['picks' => $picks, 'distinctDays' => $distinctDays, 'user' => $user, 'date' => $todaysDate]);
	}

	public function inactive() {
		$user = Auth::user();
		$email = $user['email'];

		$firstName = $user['first_name'] != null ? $user['first_name'] : "";
		$lastName = $user['last_name'] != null ? $user['last_name'] : "";

		$name = $firstName . " " . $lastName;

		$picks = Pick::whereNotNull('grade')->get();
		$daysAgo      = Carbon::now()->subDays( 22 );
		foreach ( $picks as $key => $day ) {
			if ( strtotime( $day->day ) < strtotime( $daysAgo ) ) {
				$picks->forget( $key );
			}
		}

		return view('member.inactive')->with(['email' => $email, 'name' => $name, 'picks' => $picks]);
	}

	public function expiredTrial() {
		$user = Auth::user();
		$email = $user['email'];

		$firstName = $user['first_name'] != null ? $user['first_name'] : "";
		$lastName = $user['last_name'] != null ? $user['last_name'] : "";

		$name = $firstName . " " . $lastName;

		$picks = Pick::whereNotNull('grade')->get();
		$daysAgo      = Carbon::now()->subDays( 22 );
		foreach ( $picks as $key => $day ) {
			if ( strtotime( $day->day ) < strtotime( $daysAgo ) ) {
				$picks->forget( $key );
			}
		}

		return view('member.expired')->with(['email' => $email, 'name' => $name, 'picks' => $picks]);
	}
}
