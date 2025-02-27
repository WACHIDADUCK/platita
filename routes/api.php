<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\EventoController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\AsociacionController;
use App\Http\Controllers\Api\ComentarioController;
use App\Http\Controllers\Api\AuthController;
use Orion\Facades\Orion;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Orion::resource('usuario', UserController::class);
Orion::resource('evento', EventoController::class);
Orion::resource('comentario', ComentarioController::class);

Route::middleware(['auth:sanctum'])->group(function () {
    Orion::resource('asociacion', AsociacionController::class);
});

// Route::post('/login', [AuthController::class, 'login']);
// Route::post('/register', [AuthController::class, 'register']);

// Route::middleware(['auth:sanctum'])->group(function () {
//     Orion::resource('usuario', UserController::class);
//     Route::post('/logout', [AuthController::class, 'logout']);
//     Route::get('/profile', [AuthController::class, 'profile']);
// });

// Route::controller(AuthController::class)->group(function(){
//     Route::post('register', 'register');
//     Route::post('login', 'login');
// });


// Ejemplo para definir rutas personalizadas
// Route::get('/usuarios/admins', [UserController::class, 'customMethod']);


// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');
