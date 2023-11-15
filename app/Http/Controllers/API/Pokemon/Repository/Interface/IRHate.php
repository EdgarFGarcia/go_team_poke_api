<?php

namespace App\Http\Controllers\API\Pokemon\Repository\Interface;

interface IRHate{
    public function addHatePokemon(Array $data) : Object | Int;
    public function getHatePokemon(Int $id) : Object;
}