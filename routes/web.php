<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AgendaController;

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
Auth::routes();

Route::get('/', function () {
    return view('welcome');
})->name('inicio');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/ponentes', function () {
    return view('ponentes');
})->name('ponentes');



Route::resource('agenda','\App\Http\Controllers\AgendaController')->middleware('auth');
Route::resource('eventos','\App\Http\Controllers\EventosController')->middleware('auth');
Route::resource('areas','\App\Http\Controllers\EventosController')->middleware('auth');

Route::get('lista-agendas',[App\Http\Controllers\AgendaController::class, 'agenda'])->name('lista-agendas');

Route::get('/dia',[AgendaController::class,'eventos_dia'])->name('buscar.dia');