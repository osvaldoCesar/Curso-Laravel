<?php

namespace App\Http\Controllers\Administracion;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function getListarUsuarios(Request $request){
        try {
            return $request;
        } catch (\Throwable $th) {
            throw new Exception("Error Processing Request", 1);

        }

    }
}
