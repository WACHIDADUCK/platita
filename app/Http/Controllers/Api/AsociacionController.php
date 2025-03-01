<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Asociacion;
use Illuminate\Http\JsonResponse;
use App\Http\Resources\AsociacionResource;
use Orion\Concerns\DisableAuthorization;
use Orion\Http\Controllers\Controller as RelationController;


class AsociacionController extends RelationController
{
    //use DisableAuthorization;
    protected $model = Asociacion::class;


    public function index(Request $request): JsonResponse
    {
        $asociaciones = Asociacion::with(['eventos', 'users', 'comentarios'])
            ->withCount('users')
            ->get();

        return response()->json([
            'message' => 'Asociaciones con eventos y número de usuarios',
            'data' => AsociacionResource::collection($asociaciones),
        ], 200);
    }
}
