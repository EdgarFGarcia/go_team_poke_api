<?php

namespace App\Http\Controllers\API\Pokemon\Service\Interface;

interface IHate{
    public function addHatePokemon(Array $data) : Object | Int;
    public function getHatePokemon(Int $id) : Object;
}