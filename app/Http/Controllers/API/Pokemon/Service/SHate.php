<?php

namespace App\Http\Controllers\API\Pokemon\Service;

/**
 * interface
 */
use App\Http\Controllers\API\Pokemon\Service\Interface\IHate;

/**
 * repository inject
 */
use App\Http\Controllers\API\Pokemon\Repository\RHate;

class SHate implements IHate{

    /**
     * class properties
     */
    protected $repo_hate;

    /**
     * constructor | Dependency Inversion
     */
    function __construct(
        RHate $repo_hate
    ){
        $this->repo_hate = $repo_hate;
    }

    public function addHatePokemon(Array $data) : Object | Int{
        return $this->repo_hate->addHatePokemon($data);
    }

    public function getHatePokemon(Int $id) : Object {
        return $this->repo_hate->getHatePokemon($id)->orderBy('id', 'DESC')->take(3)->get();
    }
}