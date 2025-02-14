<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Usuario extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre',
        'email',
        'password',
        'admin',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'admin' => 'boolean',
    ];

    public function gestionaAsociaciones(): HasMany
    {
        return $this->hasMany(Asociacion::class);
    }

    public function tieneComentarios(): HasMany
    {
        return $this->hasMany(Comentario::class);
    }

    public function asociacions(): BelongsToMany
    {
        return $this->belongsToMany(Asociacion::class);
    }

    public function eventos(): BelongsToMany
    {
        return $this->belongsToMany(Evento::class);
    }
}
