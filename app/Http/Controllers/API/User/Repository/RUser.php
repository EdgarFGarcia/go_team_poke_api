<?php

namespace App\Http\Controllers\API\User\Repository;

/**
 * model import
 */
use App\Models\User;

/**
 * interface
 */
use App\Http\Controllers\API\User\Repository\Interface\IRUser;

class RUser implements IRUser{
    /**
     * get user information
     * @params
     * Int $id
     * Array $with
     * 
     * @return
     * Object
     */
    public function getUserInformation(Int $id, Array $with) : Object{
        return User::where('id', $id)->with($with);
    }

    /**
     * get user information simple
     * @params
     * Array $data
     * 
     * @returns
     * Object
     */
    public function getUserInformationSimple(
        Array $data
    ) : Object {
        return User::where($data);
    }

    /**
     * update user information
     * @params
     * Array $data,
     * Int $user_id
     * 
     * @returns
     * Int
     */
    public function editUserInforamtion(
        Array $data,
        Int $user_id
    ) : Int {
        return User::where('id', $user_id)->update($data);
    }
}