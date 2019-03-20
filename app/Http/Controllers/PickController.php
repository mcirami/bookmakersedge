<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PicksRequest;
use App\Services\PickService;
use Illuminate\Support\Facades\Auth;
use App\Pick;
use Carbon\Carbon;

class PickController extends Controller
{
	/**
	 * Show the submit picks page
	 *
	 */
	public function index() {

		return view('member.picks.submit');
	}

	public function saveNewPicks(PicksRequest $request, PickService $picks) {

		$requests = $request->all();
		$picks->savePicks( $requests );

		return redirect( '/member-home' )->with( 'success', 'Your Picks Have Been Saved' );

	}

	public function reports(){

		//$user = Auth::user();

		/*$userRegisterDate = $user['created_at'];

		if($user->hasRole('subscriber') && $user['free_trial'] == "1" && strtotime($userRegisterDate) < strtotime('-3 days')) {
			return redirect('/membership-levels');
		} else {*/
			$distinctDays = Pick::distinct()->orderBy( 'day', 'desc' )->whereNotNull( 'grade' )->get( [ 'day' ] );
			$daysAgo      = Carbon::now()->subDays( 14 );
			foreach ( $distinctDays as $key => $day ) {
				if ( strtotime( $day->day ) < strtotime( $daysAgo ) ) {
					$distinctDays->forget( $key );
				}
			}

			$picks = Pick::whereNotNull('grade')->get();

			return view( 'member.picks.reports' )->with( [ 'picks'        => $picks,
			                                            'distinctDays' => $distinctDays,
			                                            'daysAgo'      => $daysAgo
			] );
		//}
	}

	public function grade() {
		$distinctDays = Pick::distinct()->orderBy('day', 'desc')->where('grade', NULL)->get(['day']);

		foreach($distinctDays as $key => $day) {
			if(strtotime($day->day) == strtotime(Carbon::today())) {
				$distinctDays->forget($key);
			}
		}

		$picks = Pick::get();
		return view('member.picks.grade')->with(['picks' => $picks, 'distinctDays' => $distinctDays]);
	}

	public function saveGrade(Request $request, PickService $picks) {
		$requestArray = $request->all();

		$picks->saveGrade($requestArray);

		return redirect()->back()->with('success', 'Your Picks Grades Were Saved' );

	}
}
