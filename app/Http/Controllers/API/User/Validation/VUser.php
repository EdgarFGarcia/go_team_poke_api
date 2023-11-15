<?php

namespace App\Http\Controllers\API\User\Validation;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class VUser extends FormRequest{

    public function authorize(){
        return true;
    }

    public function rules(){
        return [
            'email'     => 'required|email',
            'password'  => 'required|string'
        ];
    }

    public function failedValidation(Validator $validator){
        throw new HttpResponseException(response()->json([
            'response'      => false,
            'message'       => 'Validation Error',
            'data'          => $validator->errors()
        ], 422));
    }

    public function messages(){
        return [
            'email.required'    => 'Email is required',
            'password.required' => 'Password is required'
        ];
    }

}