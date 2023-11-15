<?php

namespace App\Http\Controllers\API\User\Repository;

/**
 * interface concrete
 */
use App\Http\Controllers\API\User\Repository\Interface\IRRegister;

/**
 * model trait
 */
use App\Models\User;

class RRegister implements IRRegister{
    /**
     * @params
     * Array $data
     * 
     * @returns
     * boolean or int
     */
    public function register(Array $data) : Object{
        return User::create($data);
    }
}