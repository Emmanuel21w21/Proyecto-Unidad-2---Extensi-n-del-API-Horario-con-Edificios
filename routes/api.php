<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MesaController;
use App\Http\Controllers\SillaController;
use App\Http\Controllers\EdificioController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('sillas', SillaController::class);
Route::apiResource('edificios', EdificioController::class);