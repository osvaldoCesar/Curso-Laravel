<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

// use App\Providers\RouteServiceProvider;
use App\Http\Controllers\Auth\LoginController;

// use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    public function login(Request $request){

        $cEmail         =   $request->cEmail;
        $cContrasena    =   $request->cContrasena;
        $rpta   =   Auth::attempt(['email' => $cEmail, 'password' => $cContrasena, 'state' => 'A']);

        if ($rpta) {
            return response()->json([
                'authUser'  =>  Auth::user(),
                'code'      =>  200
            ]);
        }else {
            return response()->json([
                'code'      =>  401
            ]);
        }

    }

    public function logout(Request $request){
        Auth::logout();
        return response()->json([
            'code'      =>  204
        ]);
    }
}
