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
        'destroy', 'create', 'store',
    ]);

    Route::put('cliente/{cliente}/curriculo', 'ClienteController@curriculoUpdate')
        ->name('cliente.curriculo.update');

    Route::get('cliente/{cliente}/curriculo/editar', 'ClienteController@curriculoEdit')
        ->name('cliente.curriculo.edit');

    Route::resource('empresa', 'EmpresaController')->except([
        'destroy', 'create', 'store'
    ]);
    Route::resource('vagas', 'VagaController');

    Route::post('vagas/candidatar', 'VagaController@candidatar')
        ->name('vagas.candidatar');

    Route::resource('cliente/{cliente}/experiencias', 'ExperienciaController');

    Route::post('vagas/cancelarCandidatura', 'VagaController@cancelarCandidatura')
        ->name('vagas.cancelarCandidatura');

    Route::resource('admin', 'AdminController')->parameters([
        'admin' => 'user'
    ])->middleware('admin');
});

Route::get('/home', 'HomeController@index')->name('home');
