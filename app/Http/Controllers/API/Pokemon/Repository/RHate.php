<?php

namespace App\Http\Controllers\API\Pokemon\Repository;

/**
 * repository interface
 */
use App\Http\Controllers\API\Pokemon\Repository\Interface\IRHate;

/**
 * model trait
 */
use App\Models\PokemonHate;

class RHate implements IRHate{
    public function addHatePokemon(Array $data) : Object | Int{
        return PokemonHate::create($data);
    }

    public function getHatePokemon(Int $id) : Object{
        return PokemonHate::where('user_id', $id);
    }
}