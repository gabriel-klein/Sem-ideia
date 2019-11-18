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

Route::group(['middleware' => 'web'], function() {

    Route::group(['middleware' =>'auth:empresa'], function(){
        Route::get('/empresa/index','EmpresaController@index');
        Route::get('/empresa/logout','EmpresaController@logout');
    });
    Route::get('/empresa/cadastro','EmpresaController@novo');
    Route::get('/empresa/login','EmpresaController@login');
    Route::post('/empresa/cadastro','EmpresaController@registro');
    Route::post('/empresa/login','EmpresaController@postLogin');

    Route::group(['middleware' =>'auth:web'], function(){
        Route::get('/cliente/conhecimento','UserController@conhecimento');

    });
});

Auth::routes();
Route::middleware(['auth'])->group(function () {
    Route::resource('cliente', 'ClienteController@authenticate');

    Route::resource('vagas', 'VagaController')->except([
        'destroy'
    ]);
});


Route::get('/home', 'HomeController@index')->name('home');
Route::post('/clientes/salvar','ClienteController@salvar');
Route::post('/clientes/sovai','ClienteController@authenticate');
