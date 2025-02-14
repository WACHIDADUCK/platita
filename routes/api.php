<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\EventoController;
use App\Http\Controllers\Api\UsuarioController;
use App\Http\Controllers\Api\AsociacionController;
use App\Http\Controllers\Api\ComentarioController;






Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');






Route::
// middleware('auth:sanctum')->
get('/asociacion', [AsociacionController::class, 'index']);






Route::
// middleware('auth:sanctum')->
get('/comentario', [ComentarioController::class, 'index']);





Route::
// middleware('auth:sanctum')->
get('/EventroController', [EventoController::class, 'index']);







Route::
// middleware('auth:sanctum')->
get('/usuario', [UsuarioController::class, 'index']);

