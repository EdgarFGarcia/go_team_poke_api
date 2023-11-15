<?php

namespace App\Http\Controllers\API\Pokemon;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * service
 */
use App\Http\Controllers\API\Pokemon\Service\SHate;

class CHate extends Controller
{
    /**
     * class properties
     */
    protected $service_hate;

    /**
     * constructor | Dependency Inversion
     */
    function __construct(
        SHate $service_hate
    ){
        $this->service_hate = $service_hate;
    }

    public function addHatePokemon(
        Request $request
    ){
        try{
            $this->service_hate->addHatePokemon($request->all());
            return response()->json([
                'response'  => true,
                'message'   => 'Pokemon added as hate'
            ], 200);
        }catch(\Exception $e){
            return $this->getException($e, 500);
        }
    }

    public function getHatePokemon(
        Int $id
    ){
        try{
            $data = $this->service_hate->getHatePokemon($id);
            return response()->json([
                'response'  => true,
                'data'      => $data
            ], 200);
        }catch(\Exception $e){
            return $this->getException($e, 500);
        }
    }
}
