<?php

namespace App\Http\Controllers\API\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * service
 */
use App\Http\Controllers\API\User\Service\SOther;

class COther extends Controller
{
    /**
     * class properties
     */
    protected $other_service;

    /**
     * Dependency Inversion
     */
    function __construct(
        SOther $other_service
    ){
        $this->other_service = $other_service;
    }

    public function getListUser(){
        try{
            $user = $this->other_service->getUserInformation();
            $data = $this->other_service->getOtherInformatio($user->id);
            return response()->json([
                'response'  => true,
                'data'      => $data
            ], 200);
        }catch(\Exception $e){
            return $this->getException($e, 500);
        }
    }
}
