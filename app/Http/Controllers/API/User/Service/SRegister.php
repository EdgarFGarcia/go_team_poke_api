<?php

namespace App\Http\Controllers\API\User\Service;

/**
 * interface concrete
 */
use App\Http\Controllers\API\User\Service\Interface\IRegister;

/**
 * repository sub-concrete class
 */
use App\Http\Controllers\API\User\Repository\RRegister;

class SRegister implements IRegister{

    /**
     * class properties
     */
    protected $repo_register;

    /**
     * Dependency Inversion
     */
    function __construct(
                RRegister $repo_register
    ){
        $this->repo_register = $repo_register;
    }

    /**
     * @params
     * Array $data
     * 
     * @returns
     * boolean or int
     */
    public function register(Array $data) : Object{
        return $this->repo_register->register($data);
    }
}