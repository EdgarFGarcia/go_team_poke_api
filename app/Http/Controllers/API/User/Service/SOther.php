<?php

namespace App\Http\Controllers\API\User\Service;

/**
 * interface
 */
use App\Http\Controllers\API\User\Service\Interface\IOther;

/**
 * repository
 */
use App\Http\Controllers\API\User\Repository\ROther;

use Auth;

class SOther implements IOther{

    /**
     * class properties
     */
    protected $other_repo;

    /**
     * dependency inversion
     */
    function __construct(
        ROther $other_repo
    ){
        $this->other_repo = $other_repo;
    }

    public function getOtherInformatio(Int $id) : Object{
        return $this->other_repo->getOtherInformatio($id)
        ->with(['getHatePokemon', 'getLikePokemon'])
        ->get();
    }

    public function getUserInformation(){
        return Auth::user();
    }
}