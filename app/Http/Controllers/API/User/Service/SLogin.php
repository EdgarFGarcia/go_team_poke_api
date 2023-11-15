<?php

namespace App\Http\Controllers\API\User\Service;

/**
 * interface
 */
use App\Http\Controllers\API\User\Service\Interface\ILogin;

/**
 * repository
 */
use App\Http\Controllers\API\User\Repository\RUser;

/**
 * Laravel facade helper
 */
use Auth;
use Illuminate\Database\Eloquent\Model;

class SLogin implements ILogin{

    /**
     * variables
     * $r_user => User Repository
     */
    protected $r_user;

    /**
     * constructor
     */
    function __construct(
        RUser $r_user
    ){
        $this->r_user = $r_user;
    }

    /**
     * @params
     * Array $data
     * 
     * @returns
     * bool
     */
    public function login(
        Array $data
    ) : bool{
        return Auth::attempt($data);
    }

    /**
     * get user information
     * @params
     * Int $id,
     * Array $with (can be empty array)
     * 
     * @return
     * Object
     */
    public function getUserInformation(
        Int $id,
        Array $with
    ) : Object{
        return $this->r_user->getUserInformation($id, $with);
    }

    /**
     * get user via auth facade
     * @params
     * none
     * 
     * @returns
     * Object
     */
    public function getUserAuthInfo() : Object {
        return Auth::user();
    }

    /**
     * generate token
     * @params
     * Model $model,
     * String password
     * 
     * @return
     * Object
     */
    public function generateToken(
        Model $model,
        String $email,
    ) : String{
        return $model->createToken($email)->plainTextToken;
    }
}