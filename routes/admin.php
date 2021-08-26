<?php

//Solicita ser archivo de ruta desde Providers/RouteServiceProvider
use Illuminate\Support\Facades\Route;

//Se manda a llamar al controlador de rutas para empleados
use App\Http\Controllers\Admin\EmpleadoController;
use App\Http\Controllers\DireccionController;

//Ruta del dashboard de jetstream (verificación y autentificación de usuarios)
Route::middleware(['auth:sanctum', 'verified'])->get('/panel', function () {
    return view('layouts.sbadmin2');
    })->name('panel');

//Rutas de la páginas(vistas) del CRUD para Empleados con su controlador y la funciónes de edición de registros
Route::resource('empleado', EmpleadoController::class);

//Ruta para el autollenado del formulario en campos relacionados a la dirección del empleado
Route::get('colonia/empleado', 'App\\Http\\Controllers\\DireccionController@getColonias')->name('colonia.empleado');
