<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Evento;
use Orion\Concerns\DisableAuthorization;
use Orion\Http\Controllers\Controller as RelationController;


class EventoController extends RelationController
{
    use DisableAuthorization;
    protected $model = Evento::class;
}
