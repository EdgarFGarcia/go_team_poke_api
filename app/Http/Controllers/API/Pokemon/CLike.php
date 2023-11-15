<?php

namespace App\Http\Controllers\API\Pokemon;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * service
 */
use App\Http\Controllers\API\Pokemon\Service\SLike;

class CLike extends Controller
{
    /**
     * class properties
     */
    protected $service_like;

    /**
     * constructor | Dependency Inversion
     */
    function __construct(
        SLike $service_like
    ){
        $this->service_like = $service_like;
    }

    public function addLikePokemon(
        Request $request
    ){
        try{
            $this->service_like->addLikePokemon($request->all());
            return response()->json([
                'response'  => true,
                'message'   => 'Pokemon added as like'
            ], 200);
        }catch(\Exception $e){
            return $this->getException($e, 500);
        }
    }

    public function getLikePokemon(
        Int $id
    ){
        try{
            $data = $this->service_like->getLikePokemon($id);
            return response()->json([
                'response'  => true,
                'data'      => $data
            ], 200);
        }catch(\Exception $e){
            return $this->getException($e, 500);
        }
    }
}
