<?php

namespace App\Http\Controllers\API\Pokemon\Service\Interface;

interface ILike{
    public function addLikePokemon(Array $data) : Object | Int;
    public function getLikePokemon(Int $id) : Object;
}