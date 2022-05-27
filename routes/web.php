<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FilesController;
use App\Http\Controllers\Administracion\RolesController;
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
// Usuarios
Route::get("/administracion/usuario/getListarUsuarios", [UsersController::class, "getListarUsuarios"]);
Route::post("/administracion/usuario/setRegistrarUsuario", [UsersController::class, "setRegistrarUsuario"]);
Route::post("/administracion/usuario/setEditarUsuario", [UsersController::class, "setEditarUsuario"]);
Route::post("/administracion/usuario/setCambiarEstadoUsuario", [UsersController::class, "setCambiarEstadoUsuario"]);


// Roles
Route::get("/administracion/rol/getListarRoles", [RolesController::class, "getListarRoles"]);
Route::get("/administracion/rol/getListarPermisosByRol", [RolesController::class, "getListarPermisosByRol"]);
Route::post("/administracion/rol/setRegistrarRolPermisos", [RolesController::class, "setRegistrarRolPermisos"]);
Route::post("/administracion/rol/setEditarRolPermisos", [RolesController::class, "setEditarRolPermisos"]);

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
