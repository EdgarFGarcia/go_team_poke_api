<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    
    public function getException(
        \Exception $err, 
        Int $status_code
    ){
        return response()->json([
            'response' => 'error',
            'data' => [
                'message' => $err->getMessage(),
                'code' => $err->getCode(),
                'line' => $err->getLine(),
                'trace' => $err->getTraceAsString()
            ]
        ], $status_code);
    }
}
