<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comentario;
use Illuminate\Support\Facades\Log;
use Orion\Concerns\DisableAuthorization;
use Orion\Http\Controllers\Controller as RelationController;

class ComentarioController extends RelationController
{
    use DisableAuthorization;
    protected $model = Comentario::class;

    public function store(Request $request)
    {
        // Depura el valor recibido
        Log::info('Datos recibidos:', $request->all());
        // O
        dd($request->all());

        // Validación y creación del comentario
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'comentario' => 'required|string',
            'valoracion' => 'nullable|integer',
            'comentarioable_type' => 'required|string', // Asegúrate de que esté presente
            'comentarioable_id' => 'required|integer',
        ]);

        if ($request->comentarioable_type == "Asociacion") $type = "App\Models\Asociacion";
        else $type = "App\Models\Evento";

        $comentario = Comentario::create([
            'user_id' => $request->user_id,
            'comentario' => $request->comentario,
            'valoracion' => $request->valoracion,
            'comentarioable_type' => $type, // Asigna el valor
            'comentarioable_id' => $request->comentarioable_id,
        ]);

        return response()->json($comentario, 201);
    }
}
