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
		$pick->game_time = $request['time'];

		$pick->save();
	}

	public function updatePick($request) {

		$pick = Pick::findOrFail($request['pick_id']);

		$pick->sport = $request['sport'];
		$pick->team = $request['team'];
		$pick->line = $request['line'];
		$pick->game_time = $request['time'];

		$pick->save();
	}

	public function saveGrade($requestArray) {
		$picks = Pick::where('grade', NULL)->get();

		foreach ($requestArray as $request=>$key) {

			foreach ($picks as $pick) {
				if($request == $pick->id) {
					if ($key != "NULL") {
						$pick->grade = $key;
						$pick->save();
					}
				}
			}
		}
	}
}