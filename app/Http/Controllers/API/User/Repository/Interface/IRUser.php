<?php

namespace App\Http\Controllers\API\User\Repository\Interface;

interface IRUser{
    public function getUserInformation(Int $id, Array $with) : Object;
    public function getUserInformationSimple(Array $data) : Object;
    public function editUserInforamtion(Array $data, Int $user_id) : Int;
}