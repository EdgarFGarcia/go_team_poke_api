<?php

namespace App\Http\Controllers\API\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;

class CUtil extends Controller
{
    //
    public function logout(){
        Auth::user()->tokens()->where('id', $id)->delete();
    }
}
