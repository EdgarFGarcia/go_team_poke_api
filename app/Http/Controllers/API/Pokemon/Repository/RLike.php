<?php

namespace App\Http\Controllers\API\Pokemon\Repository;

/**
 * repository interface
 */
use App\Http\Controllers\API\Pokemon\Repository\Interface\IRLike;

/**
 * model trait
 */
use App\Models\PokemonLike;

class RLike implements IRLike{
    public function addLikePokemon(Array $data) : Object | Int{
        return PokemonLike::create($data);
    }

    public function getLikePokemon(Int $id) : Object{
        return PokemonLike::where('user_id', $id);
    }
}