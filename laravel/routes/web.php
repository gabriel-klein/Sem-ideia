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

    Route::post('cliente', 'ClienteController@busca')
        ->name('cliente.busca');

    Route::put('cliente/{cliente}/curriculo', 'ClienteController@curriculoUpdate')
        ->name('cliente.curriculo.update');

    Route::get('cliente/{cliente}/curriculo/editar', 'ClienteController@curriculoEdit')
        ->name('cliente.curriculo.edit');

    Route::resource('empresa', 'EmpresaController')->except([
        'create', 'store'
    ]);

    Route::post('empresa/{empresa}/autorizar', 'EmpresaController@autorizar')
        ->name('empresa.autorizar');

    Route::post('empresa/{empresa}/negar', 'EmpresaController@negar')
        ->name('empresa.negar');

    Route::resource('vagas', 'VagaController');

    Route::post('vagas/store', 'VagaController@store')
        ->name('vagas.store');

    Route::post('vagas', 'VagaController@busca')
        ->name('vagas.busca');

    Route::post('vagas/candidatar', 'VagaController@candidatar')
        ->name('vagas.candidatar');

    Route::resource('cliente/{cliente}/experiencia', 'ExperienciaController', ['parameters' => [
        'experiencia' => 'experiencia'
    ]]);

    Route::post('vagas/cancelarCandidatura', 'VagaController@cancelarCandidatura')
        ->name('vagas.cancelarCandidatura');

    Route::resource('admin', 'AdminController')->parameters([
        'admin' => 'user'
    ])->middleware('admin');
});
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/email', function () {
    return new App\Mail\EmpresaVerify();
});
