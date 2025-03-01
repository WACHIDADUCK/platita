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

// Rutas públicas (solo GET)
Orion::resource('usuario', UserController::class)->only(['index', 'show']);
Orion::resource('asociacion', AsociacionController::class)->only(['index', 'show']);
Orion::resource('evento', EventoController::class)->only(['index', 'show']);
Orion::resource('comentario', ComentarioController::class)->only(['index', 'show']);

// Rutas protegidas (todas las operaciones excepto GET)
Route::middleware(['auth:sanctum'])->group(function () {
    Orion::resource('usuario', UserController::class)->except(['index', 'show']);
    Orion::resource('asociacion', AsociacionController::class)->except(['index', 'show']);
    Orion::resource('evento', EventoController::class)->except(['index', 'show']);
    Orion::resource('comentario', ComentarioController::class)->except(['index', 'show']);
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
