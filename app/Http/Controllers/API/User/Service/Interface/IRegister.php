<?php

namespace App\Http\Controllers\API\User\Service\Interface;

interface IRegister{
    /**
     * @params
     * Array $data
     * 
     * @returns
     * boolean or int
     */
    public function register(Array $data) : Object;
}