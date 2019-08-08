<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Carbon\Carbon;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class PicksRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(Request $request) {

	    return [
	    	'sport' => 'required|string|max:255',
		    'team' => ['required', Rule::unique('picks')->ignore($this->pick_id, 'id')->where(function ($query) use($request) {
			        return $query->where('day', Carbon::today())->where('game_time', $request['game_time']);
		        })
		    ],
		    'line' => 'required|string|max:255',
		    'game_time' => 'required|string|max:255',
		    'comment' => 'sometimes|nullable|string|max:255'
        ];
    }
}
