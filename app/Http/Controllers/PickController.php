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
		$userID = Auth::user()->getAuthIdentifier();

		$today = Carbon::today();
		$todaysPicks = Pick::where('day', $today)->where('user_id', $userID)->get();

		$now = Carbon::now()->format('h:i A');

		$lastPick = Pick::get()->last();

		if (strtotime($lastPick->day) != strtotime(Carbon::today())) {
			$lastPick = null;
		}

		return view('member.picks.submit')->with(['todaysPicks' => $todaysPicks, 'now' => $now, 'lastPick' => $lastPick]);
	}

	public function saveNewPicks(PicksRequest $request, PickService $picks) {

		$requests = $request->all();
		$picks->savePicks( $requests );

		return redirect()->back()->with('success', 'Your Pick Has Been Saved') ;

	}

	public function update(PicksRequest $request, PickService $picks) {
		$requests = $request->all();
		$picks->updatePick( $requests );

		return redirect()->back()->with('success', 'Your Pick Has Been Updated') ;
	}

	public function reports(){

		$user = Auth::user();

		//$userRegisterDate = $user['created_at'];

		//if($user->hasRole('subscriber') && $user['free_trial'] == "1" && strtotime($userRegisterDate) < strtotime('-7 days')) {
		//	return redirect('https://jvax157.pay.clickbank.net/?cbitems=1');
		//} else {
			$distinctDays = Pick::distinct()->orderBy( 'day', 'desc' )->whereNotNull( 'grade' )->get( [ 'day' ] );
			$daysAgo      = Carbon::now()->subDays( 22 );
			foreach ( $distinctDays as $key => $day ) {
				if ( strtotime( $day->day ) < strtotime( $daysAgo ) ||  strtotime( $day->day ) == strtotime(Carbon::today()) ) {
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

		$picks = Pick::get();
		return view('member.picks.grade')->with(['picks' => $picks, 'distinctDays' => $distinctDays]);
	}

	public function saveGrade(Request $request, PickService $picks) {
		$requestArray = $request->all();

		$picks->saveGrade($requestArray);

		return redirect()->back()->with('success', 'Your Picks Grades Were Saved' );

	}
}
