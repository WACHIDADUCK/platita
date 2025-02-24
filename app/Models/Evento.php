<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Evento extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre',
        'descripcion',
        'lugar',
        'tipo',
        'fecha_inicio',
        'fecha_fin',
        'accesibilidad',
        'estado',
        'aforo',
        'contador_aforo',
        'aforo_socios',
        'contador_aforo_socios',
        'aforo_no_socios',
        'contador_aforo_no_socios',
        'afotor_voluntarios',
        'contador_aforo_voluntarios',
        'imagen',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'fecha_inicio' => 'datetime',
        'fecha_fin' => 'datetime',
    ];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    public function asociacions(): BelongsToMany
    {
        return $this->belongsToMany(Asociacion::class);
    }

    public function comentarios(): MorphMany
    {
        return $this->morphMany(Comentario::class, 'comentarioable');
    }
}
