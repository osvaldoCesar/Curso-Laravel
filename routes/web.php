<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FilesController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Administracion\RolesController;
use App\Http\Controllers\Administracion\UsersController;
use App\Http\Controllers\Administracion\PermissionController;
use Illuminate\Support\Facades\Auth;


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

// Login
// Auth::routes();
Route::post("/authenticate/login", [LoginController::class,"login"]);
Route::post("/authenticate/logout", [LoginController::class,"logout"]);
Route::get("/authenticate/getRefrescarUsuarioAutenticado", function (){
    return Auth::user()->load('file');
});

// Usuarios

Route::get("/administracion/usuario/getListarRolPermisosByUsuario", [UsersController::class, "getListarRolPermisosByUsuario"]);
Route::get("/administracion/usuario/getListarUsuarios", [UsersController::class, "getListarUsuarios"]);
Route::post("/administracion/usuario/setRegistrarUsuario", [UsersController::class, "setRegistrarUsuario"]);
Route::post("/administracion/usuario/setRegistrarUsuario", [UsersController::class, "setRegistrarUsuario"]);
Route::post("/administracion/usuario/setEditarUsuario", [UsersController::class, "setEditarUsuario"]);
Route::post("/administracion/usuario/setCambiarEstadoUsuario", [UsersController::class, "setCambiarEstadoUsuario"]);
Route::post("/administracion/usuario/setEditarRolByUsuario", [UsersController::class, "setEditarRolByUsuario"]);
Route::get("/administracion/usuario/getRolByUsuario", [UsersController::class, "getRolByUsuario"]);
Route::get('/administracion/usuario/getListarPermisosByRolAsignado', [UsersController::class, "getListarPermisosByRolAsignado"]);
Route::get('/administracion/usuario/getListarPermisosByUsuario', [UsersController::class, "getListarPermisosByUsuario"]);
Route::post('/administracion/usuario/setRegistrarPermisosByUsuario', [UsersController::class, "setRegistrarPermisosByUsuario"]);

// Roles
Route::get("/administracion/rol/getListarRoles", [RolesController::class, "getListarRoles"]);
Route::get("/administracion/rol/getListarPermisosByRol", [RolesController::class, "getListarPermisosByRol"]);
Route::post("/administracion/rol/setRegistrarRolPermisos", [RolesController::class, "setRegistrarRolPermisos"]);
Route::post("/administracion/rol/setEditarRolPermisos", [RolesController::class, "setEditarRolPermisos"]);

// Permisos
Route::get("/administracion/permiso/getListarPermisos", [PermissionController::class, "getListarPermisos"]);
Route::post("/administracion/permiso/setRegistrarPermisos", [PermissionController::class, "setRegistrarPermisos"]);
Route::post("/administracion/permiso/setEditarPermiso", [PermissionController::class, "setEditarPermiso"]);



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

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
