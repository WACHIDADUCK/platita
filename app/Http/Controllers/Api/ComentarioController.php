<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comentario;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use App\Http\Resources\ComentarioResource;
use Orion\Concerns\DisableAuthorization;
use Orion\Http\Controllers\Controller as RelationController;

class ComentarioController extends RelationController
{
    //use DisableAuthorization;
    protected $model = Comentario::class;

    public function index(Request $request): JsonResponse
    {
        $comentarios = Comentario::paginate(15);

        return response()->json([
            'message' => 'Eventos con asociaciones, usuaarios y comentarios',
            'data' => ComentarioResource::collection($comentarios),
        ], 200);
    }
}
