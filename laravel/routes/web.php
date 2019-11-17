<?php

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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Auth::routes();
Route::middleware(['auth'])->group(function () {
    Route::resource('cliente', 'ClienteController')->except([
        'destroy', 'create', 'store'
    ]);

    Route::resource('empresa', 'EmpresaController')->except([
        'destroy', 'create', 'store'
    ]);

    Route::resource('vagas', 'VagaController')->except([
        'destroy'
    ]);
});

Route::get('/home', 'HomeController@index')->name('home');
