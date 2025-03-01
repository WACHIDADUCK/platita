<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ComentarioResource extends JsonResource
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
            'user_id' => $this->user_id,
            'comentario' => $this->comentario,
            'fecha' => $this->fecha,
            'valoracion' => $this->valoracion,
            'comentarioable_type' => $this->comentarioable_type,
            'comentarioable_id' => $this->comentarioable_id,
        ];
    }
}
