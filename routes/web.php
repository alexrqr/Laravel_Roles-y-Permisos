<?php

use App\Http\Controllers\AsignarController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\PermisoController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    //Rutas de acceso
    Route::resource('/client', ClienteController::class)->names('cliente');
    //codigo para obtener una segunda ruta mediante el controlador.
    Route::get('/client/create', [ClienteController::class, 'create'])->name('cliente.create');

    //para roles y permisos
    Route::resource('/roles', RoleController::class)->names('roles');
    Route::resource('/permisos', PermisoController::class)->names('permisos');
    Route::resource('/users', AsignarController::class)->names('users');
});

