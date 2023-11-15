<?php

namespace App\Http\Controllers\API\Pokemon\Service;

/**
 * interface
 */
use App\Http\Controllers\API\Pokemon\Service\Interface\ILike;

/**
 * repository inject
 */
use App\Http\Controllers\API\Pokemon\Repository\RLike;

class SLike implements ILike{

    /**
     * class properties
     */
    protected $repo_like;

    /**
     * constructor | Dependency Inversion
     */
    function __construct(
        RLike $repo_like
    ){
        $this->repo_like = $repo_like;
    }

    public function addLikePokemon(Array $data) : Object | Int{
        return $this->repo_like->addLikePokemon($data);
    }

    public function getLikePokemon(Int $id) : Object {
        return $this->repo_like->getLikePokemon($id)->orderBy('id', 'DESC')->take(3)->get();
    }
}