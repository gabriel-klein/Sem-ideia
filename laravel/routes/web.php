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

    Route::post('cliente/conhecimento', 'ClienteController@conhecimento')
        ->name('cliente.conhecimento');
    
    Route::resource('cliente', 'ClienteController')->except([
        'destroy', 'create', 'store',
    ]);

    Route::resource('empresa', 'EmpresaController')->except([
        'destroy', 'create', 'store'
    ]);
    Route::resource('vagas', 'VagaController');
    
    Route::post('vagas/candidatar', 'VagaController@candidatar')
        ->name('vagas.candidatar');

    Route::post('vagas/cancelarCandidatura', 'VagaController@cancelarCandidatura')
        ->name('vagas.cancelarCandidatura');

    Route::get('cliente/{id}/curriculo','ClienteController@curriculo')
        ->name('cliente.curriculo');
    


});

Route::get('/home', 'HomeController@index')->name('home');
