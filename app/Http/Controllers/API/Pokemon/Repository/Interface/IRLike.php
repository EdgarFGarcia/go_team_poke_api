<?php

namespace App\Http\Controllers\API\Pokemon\Repository\Interface;

interface IRLike{
    public function addLikePokemon(Array $data) : Object | Int;
    public function getLikePokemon(Int $id) : Object;
}