<?php

namespace App\Http\Controllers\API\User\Repository\Interface;

interface IRRegister{
    /**
     * @params
     * Array $data
     * 
     * @returns
     * boolean or int
     */
    public function register(Array $data) : Object;
}