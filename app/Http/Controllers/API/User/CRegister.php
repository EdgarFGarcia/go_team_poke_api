<?php

namespace App\Http\Controllers\API\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * service sub-concrete class
 */
use App\Http\Controllers\API\User\Service\SRegister;

/**
 * validation method injection
 */
use App\Http\Controllers\API\User\Validation\UserRegister;

class CRegister extends Controller{
    // class properties
    protected $service_register;
    
    /**
     * Dependency Inversion
     */
    function __construct(
                SRegister $service_register
    ){
        $this->service_register = $service_register;
    }

    public function register(
        UserRegister $request
    ){
        try{
            $data = $request->validated();
            $this->service_register->register($data);
            return response()->json([
                'response'  => true,
                'message'   => 'Registration Successful! You can now login!'
            ], 200);
        }catch(\Exception $e){
            return $this->getException($e, 500);
        }
    }
}
