<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RajaongkirController;


Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/search/provinces',[RajaongkirController::class,'getProvinces']);
    Route::get('/search/cities',[RajaongkirController::class,'getCities']);

});

Route::post('/login',[AuthController::class,'index']);
