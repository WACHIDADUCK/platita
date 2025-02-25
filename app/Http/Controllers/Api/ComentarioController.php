<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comentario;

use Orion\Concerns\DisableAuthorization;
use Orion\Http\Controllers\Controller as RelationController;

class ComentarioController extends RelationController
{
    use DisableAuthorization;
    protected $model = Comentario::class;

    public function store(Request $request)
    {
        dd($request->all());

        // Validación y creación del comentario
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'comentario' => 'required|string',
            'valoracion' => 'nullable|integer',
            'comentarioable_type' => 'required|string', // Asegúrate de que esté presente
            'comentarioable_id' => 'required|integer',
        ]);

        $comentario = Comentario::create([
            'user_id' => $request->user_id,
            'comentario' => $request->comentario,
            'valoracion' => $request->valoracion,
            'comentarioable_type' => $request->comentarioable_type, // Asigna el valor
            'comentarioable_id' => $request->comentarioable_id,
        ]);

        return response()->json($comentario, 201);
    }
}
