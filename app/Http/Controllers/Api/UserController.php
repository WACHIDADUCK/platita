<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Evento;

use App\Models\User;

use Orion\Concerns\DisableAuthorization;
use Orion\Http\Controllers\Controller as RelationController;


class UserController extends RelationController
{
    use DisableAuthorization;
    protected $model = User::class;
}
