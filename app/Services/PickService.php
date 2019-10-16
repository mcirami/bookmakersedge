<?php
/**
 * Created by PhpStorm.
 * User: matteocirami
 * Date: 2019-01-14
 * Time: 15:18
 */

namespace App\Services;
use Illuminate\Support\Facades\Auth;
use App\Pick;

class PickService {

	public function savePicks($request) {
		// gets current user saves picks into picks table
		$userID = Auth::id();

		$pick = new Pick;

		$pick->user_id = $userID;
		$pick->sport = $request['sport'];
		$pick->team = $request['team'];
		$pick->line = $request['line'];
		$pick->day = now();
		$pick->game_time = $request['game_time'];
		$pick->comment = $request['comment'];

		return $pick->save();
	}

	public function updatePick($request, $pick) {

		$pick->sport = $request['sport'];
		$pick->team = $request['team'];
		$pick->line = $request['line'];
		$pick->game_time = $request['game_time'];
		$pick->comment = $request['comment'];
		$pick->grade = $request['grade'];

		$pick->save();
	}
}
