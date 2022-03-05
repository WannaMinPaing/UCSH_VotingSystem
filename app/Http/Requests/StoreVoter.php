<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreVoter extends FormRequest
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
    public function rules()
    {
        return [
            'email'=> 'required|email|unique:users,email',
            'year' => 'required',
        ];
    }

    public function messages()

    {

        return [

            'email.required' => 'The :attribute field can not be blank value',
            'email.unique:email' => 'This email is already exit!',
        ];

    }
}
