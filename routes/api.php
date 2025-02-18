<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\EventoController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\AsociacionController;
use App\Http\Controllers\Api\ComentarioController;
use App\Http\Controllers\Api\AuthController;
;
use Orion\Facades\Orion;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Orion::resource('usuario', UserController::class);
Orion::resource('evento', EventoController::class);
Orion::resource('comentario', ComentarioController::class);

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/profile', [AuthController::class, 'profile']);
    Orion::resource('asociacion', AsociacionController::class);

});

// Route::controller(AuthController::class)->group(function(){
//     Route::post('register', 'register');
//     Route::post('login', 'login');
// });



// Ejemplo para definir rutas personalizadas
// Route::get('/usuarios/admins', [UserController::class, 'customMethod']);


// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');
