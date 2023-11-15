<?php

namespace App\Http\Controllers\API\User\Repository;

/**
 * repository interface
 */
use App\Http\Controllers\API\User\Repository\Interface\IROther;

/**
 * model
 */
use App\Models\User;

class ROther implements IROther{
    public function getOtherInformatio(Int $id) : Object{
        return User::where('id', '!=', $id);
    }
}