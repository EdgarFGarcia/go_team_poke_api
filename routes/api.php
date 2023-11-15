<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::group(['prefix' => 'unauth'], function(){
    Route::post('register', [App\Http\Controllers\API\User\CRegister::class, 'register']);
    Route::post('login', [App\Http\Controllers\API\User\CLogin::class, 'loginAttempt']);
});

Route::group(['middleware' => 'auth:sanctum'], function(){
    Route::group(['prefix' => 'pokemon'], function(){
        Route::post('/addLike', [App\Http\Controllers\API\Pokemon\CLike::class, 'addLikePokemon']);
        Route::get('/getLike/{id?}', [App\Http\Controllers\API\Pokemon\CLike::class, 'getLikePokemon']);
        Route::post('/addHate', [App\Http\Controllers\API\Pokemon\CHate::class, 'addHatePokemon']);
        Route::get('/getHate/{id?}', [App\Http\Controllers\API\Pokemon\CHate::class, 'getHatePokemon']);
    });
    Route::group(['prefix' => 'pokeUsers'], function(){
        Route::get('/getListUser', [App\Http\Controllers\API\User\COther::class, 'getListUser']);
    });

    Route::post('logout', [App\Http\Controllers\API\User\CUtil::class, 'logout']);
});