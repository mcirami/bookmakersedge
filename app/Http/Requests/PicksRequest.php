<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Carbon\Carbon;
use Illuminate\Validation\Rule;

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
    public function rules() {

    	/*$rules = [];
	    $requests = $this->request->all();

	    foreach($requests as $key=>$values) {
		    if(is_array($values)) {
			    foreach ( $values as $key2 => $value ) {
				    $rules[ $key.".".$key2 ]   = 'required|string|max:255';
			    }
		    }
	    }

	    return $rules;*/

	    return [
	    	'sport' => 'required|string|max:255',
		    'team' => Rule::unique('picks')->ignore($this->pick_id, 'id')->where(function ($query) {
			    return $query->where('day', Carbon::today());
		    }),
		    'line' => 'required|string|max:255',
		    'time' => 'required|string|max:255',
		    'comment' => 'string|max:255'
        ];
    }
}
