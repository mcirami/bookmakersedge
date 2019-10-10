<?php

namespace App\Http\Controllers;

use App\Filters\PickFilters;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\PicksRequest;
use App\Services\PickService;
use Illuminate\Support\Facades\Auth;
use App\Pick;
use Carbon\Carbon;
use Illuminate\Validation\Rule;
use App\Services\MailService;

class PickController extends Controller
{
	/**
	 * Show the submit picks page
	 *
	 */
	public function index(PickFilters $filters) {

        //$picks = Pick::latest()->filter($filters);

        $today = Carbon::today();
        $userID = Auth::user()->getAuthIdentifier();

        $picks = Pick::latest()->where( 'day', $today)->where('user_id', $userID)->get();

		$now = Carbon::now()->format('h:i A');
		$lastPick = Pick::get()->last();

		if (strtotime($lastPick->day) != strtotime(Carbon::today())) {
			$lastPick = null;
		}

		return view('member.picks.submit')->with(['picks' => $picks, 'now' => $now, 'lastPick' => $lastPick]);
	}

	public function saveNewPicks(MailService $mail, PicksRequest $request, PickService $picks) {

		$requests = $request->all();
		$picks->savePicks( $requests );

        $mail->newPickSubmitted();

		//$request->session()->flash('Your Pick Has Been Saved', 'success' );
		return redirect()->back()->with('flash', 'Your Pick Has Been Saved' );

	}

	public function update(Request $request, PickService $updatePick, Pick $pick) {

		try {
			$request->validate([
				'sport' => 'required|string|max:255',
				'team' => ['required', Rule::unique('picks')->ignore($pick->id, 'id')->where(function ($query) use($request) {
					return $query->where('day', Carbon::today())->where('game_time', $request['game_time']);
				})
				],
				'line' => 'required|string|max:255',
				'game_time' => 'required|string|max:255',
				'comment' => 'sometimes|nullable|string|max:255',
				'grade' => 'sometimes|nullable|string|max:255'
			]);

			$updatePick->updatePick($request, $pick);

		} catch(\Exception $e) {

			return response('That team and game time has already been submitted.', 422);
		}



	}

	public function reports(PickFilters $filters){

		//$distinctDays = Pick::distinct()->filter($filters);
        $dateMin = Carbon::now()->subDays( 21 );
        $distinctDays = Pick::distinct()->orderBy('day', 'desc')->whereNotNull( 'grade' )->whereDate('day', '>=', $dateMin)->get(['day']);

		$picks = Pick::whereNotNull('grade')->get();

		return view( 'member.picks.reports' )->with( [ 'picks' => $picks, 'distinctDays' => $distinctDays ] );

	}

	public function grade(PickFilters $filters) {

		//$distinctDays = Pick::distinct()->filter($filters);

        $dateMin = Carbon::now()->subDays( 21 );
        $distinctDays = Pick::distinct()->orderBy('day', 'desc')->whereDate('day', '>=', $dateMin)->get(['day']);

		$picks = Pick::get();
		return view('member.picks.grade')->with(['picks' => $picks, 'distinctDays' => $distinctDays]);
	}

	public function destroy(Pick $pick) {

		$pick->delete();

		if (request()->expectsJson()) {
			return response(['status' => 'Pick has been deleted']);
		}
	}
}
