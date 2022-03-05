<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBoy extends FormRequest
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
            'name'=> 'required|string|min:5|max:50|regex:/^[a-zA-Z\s]+$/',
            'age' => 'required|integer|between:16,25',
            'class' => 'required',
            'address' => 'required',
            'profile' => 'required|mimes:jpeg,bmp,png,jpg',
            'photos' => 'required|array|min:1',
            'photos.*'=>'required|mimes:jpeg,bmp,png,jpg|distinct',

        ];
    }

    public function messages()

    {

        return [

            'name.required' => 'The :attribute field can not be blank value',
            'name.min'=>'at least 5',
            'name.max'=>'No more 50',
            'name.regex'=>'No number  and No Special Sign!!',
            'age.required'=>'add your age',
            'age.integer'=>'No sting Only number',
            'age.between'=>'age must be between 16 years  and 25 years',
            'profile.mimes'=>'only image file type',
            'photos.*.mimes'=>'All photo are only image file type',

        ];

    }
}
