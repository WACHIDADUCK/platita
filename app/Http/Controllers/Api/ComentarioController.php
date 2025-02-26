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

}
