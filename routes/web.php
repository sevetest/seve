<?php

use Illuminate\Support\Facades\Route;

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

/* Ruta para la Página de Seve */
Route::get('/', function () {
    return view('welcome');
    /* return redirect()->away('https://seve.mx/'); */
})->name('home');



