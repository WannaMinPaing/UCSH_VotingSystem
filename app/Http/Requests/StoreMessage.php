<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMessage extends FormRequest
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
     *'start_date' => 'required|date|date_equals:brith_date',
     *'brith_date' => 'required|date',
     * ['required', 'regex:/^((71)|(73)|(77))[0-9]{7}/']  //true
     *regex:/^09(5[0-9])+$/',   0959  <
     * @return array
     */
    public function rules()
    {
        return [
            'name'=> 'required|string|min:5|max:50|regex:/^[a-zA-Z\s]+$/', 
            'phone_num' => ['required', 'regex:/^((09)|(\+959))((2[5-7])|(4[0-5])|(7[6-9])|(9[6-9])|(7[7-9])|(6[6-9])|(3[1-2]))[0-9]{7}/'],
            'email' => 'required|email',
            'message' => 'required',
            'check' => 'required',

        ];
    }
}
