<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FilesController;
use App\Http\Controllers\Administracion\UsersController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get("/administracion/usuario/getListarUsuarios", [UsersController::class, "getListarUsuarios"]);
Route::post("/administracion/usuario/setRegistrarUsuario", [UsersController::class, "setRegistrarUsuario"]);

Route::post('/archivo/setRegistrarArchivo', [FilesController::class, "setRegistrarArchivo"]);

Route::get('/{optional?}', function () {
    return view('app');
})->name('basepath')
  ->where('optional', '.*');

// Route::get('/administracion/usuario/getListarUsuarios', 'App\Http\Controllers\Administracion\UsersController@getListarUsuarios');
// Route::get("/administracion/usuario/getListarUsuarios", "App\\Http\\Controllers\\Administracion\\UsersController@getListarUsuarios");
// Route::get('/', 'Administracion\UsersController@getListarUsuarios')->name('getListarUsuarios');
// Route::get('/administracion/usuario/getListarUsuarios', 'Administracion\UsersController@getListarUsuarios')->name('home');
// Route::get('/administracion/usuario/getListarUsuarios','Administracion\UsersController@getListarUsuarios');
