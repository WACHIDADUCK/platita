<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\EventoController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\AsociacionController;
use App\Http\Controllers\Api\ComentarioController;
use Orion\Facades\Orion;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

    Orion::resource('usuario', UserController::class);
    Orion::resource('asociacion', AsociacionController::class);
    Orion::resource('evento', EventoController::class);
    Orion::resource('comentario', ComentarioController::class);



// Ejemplo para definir rutas personalizadas
// Route::get('/usuarios/admins', [UserController::class, 'customMethod']);


// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');
