<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EventoResource extends JsonResource
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
            'lugar' => $this->lugar,
            'tipo' => $this->tipo,
            'fecha_inicio' => $this->fecha_inicio,
            'fecha_fin' => $this->fecha_fin,
            'accesibilidad' => $this->accesibilidad,
            'estado' => $this->estado,
            'aforo' => $this->aforo,
            'contador_aforo' => $this->contador_aforo,
            'aforo_socios' => $this->aforo_socios,
            'contador_aforo_socios' => $this->contador_aforo_socios,
            'aforo_no_socios' => $this->aforo_no_socios,
            'contador_aforo_no_socios' => $this->contador_aforo_no_socios,
            'aforo_voluntarios' => $this->aforo_voluntarios,
            'contador_aforo_voluntarios' => $this->contador_aforo_voluntarios,
            'imagen' => $this->imagen,
            'asociacions' => $this->asociacions,
            'users' => $this->users,
            'comentarios' => $this->comentarios,
        ];
    }
}
