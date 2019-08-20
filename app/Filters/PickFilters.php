<?php


namespace App\Filters;

use App\Pick;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class PickFilters extends Filters {

	protected $filters = ['today', 'gdays', 'rdays'];


	protected function today() {

		$today = Carbon::today();
		$userID = Auth::user()->getAuthIdentifier();

		return $this->builder->where( 'day', $today)->where('user_id', $userID);
	}

	protected function gdays($days) {

		$dateMin = Carbon::now()->subDays( $days );
		return $this->builder->orderBy('day', 'desc')->whereDate('day', '>=', $dateMin);

	}

	protected function rdays($days) {
		$dateMin = Carbon::now()->subDays( $days );
		return $this->builder->orderBy('day', 'desc')->whereNotNull( 'grade' )->whereDate('day', '>=', $dateMin);
	}
}