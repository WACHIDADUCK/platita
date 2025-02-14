<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Asociacion extends Model
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
        'contacto',
        'email',
        'imagen',
        'asiste_evento_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'asiste_evento_id' => 'integer',
    ];

    public function asisteEvento(): BelongsTo
    {
        return $this->belongsTo(Usuario::class);
    }

    public function usuarios(): BelongsToMany
    {
        return $this->belongsToMany(Usuario::class);
    }

    public function eventos(): BelongsToMany
    {
        return $this->belongsToMany(Evento::class);
    }
}
