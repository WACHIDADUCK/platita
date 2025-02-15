<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Asociacion;

use Orion\Concerns\DisableAuthorization;
use Orion\Http\Controllers\Controller as RelationController;

class AsociacionController extends RelationController
{
    use DisableAuthorization;
    protected $model = Asociacion::class;
}
