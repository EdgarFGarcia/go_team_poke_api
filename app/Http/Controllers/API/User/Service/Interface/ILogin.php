<?php

namespace App\Http\Controllers\API\User\Service\Interface;

use Illuminate\Database\Eloquent\Model;

interface ILogin{
    public function login(Array $data) : bool;
    public function getUserInformation(Int $id, Array $with) : Object;
    public function getUserAuthInfo() : Object;
    public function generateToken(Model $model, String $email) : String;
}