<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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

    	$rules = [];
	    $requests = $this->request->all();

	    foreach($requests as $key=>$values) {
		    if(is_array($values)) {
			    foreach ( $values as $key2 => $value ) {
				    $rules[ $key.".".$key2 ]   = 'required|string|max:255';
			    }
		    }
	    }

	    return $rules;
    }
}
