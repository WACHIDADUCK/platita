<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AsociacionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'nombre' => $this->nombre,
            'descripcion' => $this->descripcion,
            'contacto' => $this->contacto,
            'email' => $this->email,
            'acreditado' => $this->acreditado,
            'imagen' => $this->imagen,
            'gestor_id' => $this->gestor_id,
            'eventos' => $this->eventos,
            'users' => $this->users,
            'comentarios' => $this->comentarios,
        ];
    }
}
