<?php

namespace App\Http\Controllers\API\User\Validation;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class UserRegister extends FormRequest{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(){
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(){
        return [
            'name'  => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string'
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
            'name.required'         => 'Name is required!',
            'email.required'        => 'Email is required!',
            'email.unique'          => 'Email already taken!'
        ];
    }
}