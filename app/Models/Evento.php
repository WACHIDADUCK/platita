<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Evento extends Model
{
    use HasFactory, Notifiable, HasApiTokens;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre',
        'descripcion',
        'tipo',
        'fecha_inicio',
        'fecha_fin',
        'accesibilidad',
        'estado',
        'aforo',
        'aforo_socios',
        'aforo_no_socios',
        'voluntarios',
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

    public function comentarios(): MorphMany
    {
        return $this->morphMany(Comentario::class, 'comentarioable');
    }
}
