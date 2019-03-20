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

	public function savePicks($requestArray) {
		// gets current user saves picks into picks table
		$userID = Auth::id();

		$picksArray = [];
		$dataArray = [];

		foreach($requestArray as $key=>$values) {
			if(is_array($values)) {
				foreach ( $values as $key2 => $value ) {

					$picksArray['user_id'] = $userID;
					$picksArray[ $key2 ]   = $value;
					$picksArray['day']     = now();

				}

				array_push($dataArray, $picksArray);
			}
		}

		Pick::insert($dataArray);
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