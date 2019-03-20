<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateInfoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {

    	$user = Auth::User();

        return [
	        'username' => 'required|string|max:255|unique:users,username,' . $user->id,
	        'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
        ];
    }
}
