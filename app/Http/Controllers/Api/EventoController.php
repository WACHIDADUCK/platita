<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Asociacion;
use Illuminate\Http\JsonResponse;
use App\Http\Resources\EventoResource;
use App\Models\Evento;
use Orion\Concerns\DisableAuthorization;
use Orion\Http\Controllers\Controller as RelationController;


class EventoController extends RelationController
{
    //use DisableAuthorization;
    protected $model = Evento::class;


    public function index(Request $request): JsonResponse
    {
        $eventos = Evento::with(['asociacions', 'users', 'comentarios'])
            ->withCount('users')
            ->get();

        return response()->json([
            'message' => 'Eventos con asociaciones, usuaarios y comentarios',
            'data' => EventoResource::collection($eventos),
        ], 200);
    }
}
