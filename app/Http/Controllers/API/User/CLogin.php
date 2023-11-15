<?php

namespace App\Http\Controllers\API\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * service layer
 */
use App\Http\Controllers\API\User\Service\SLogin;

/**
 * Validation
 */
use App\Http\Controllers\API\User\Validation\VUser;

class CLogin extends Controller
{
    /**
     * class properties */
    protected $s_login;

    /**
     * constructor
     * SLogin (Service Layer)
     */
    function __construct(
        SLogin $s_login
    ){
        $this->s_login = $s_login;
    }

    /**
     * attempt to login a request
     * @params
     * Object
     * - email (String),
     * - password (String)
     * 
     * @return
     * Object
     */
    public function loginAttempt(
        VUser $request
    ){
        try{
            $valid_data = $request->validated();
            /**
             * login attempt
             */
            $is_auth = $this->s_login->login($valid_data);
            if($is_auth){
                /**
                 * get user information
                 */
                $user = $this->s_login->getUserAuthInfo();
                $u_data = $this->s_login->getUserInformation($user->id, [])->first();
                $token = $this->s_login->generateToken($request->user(), $user->email);
                return response()->json([
                    'response'  => true,
                    'data'      => $u_data,
                    'token'     => $token
                ], 200);
            }
            return response()->json([
                'response'  => false,
                'message'   => "User does not exist!"
            ]);
        }catch(\Exception $e){
            return $this->getException($e, 500);
        }
    }
}