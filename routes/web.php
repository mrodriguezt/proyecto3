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
    return view('index');
});
//Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
Route::group(['middleware'=>'auth'],function() {
Route::get('oportunidades/', [
    'as' => 'oportunidades',
    'uses' => 'OportunidadesController@oportunidades'
]);
Route::get('layoutPipeline/', [
    'as' => 'layoutPipeline',
    'uses' => 'OportunidadesController@layoutPipeline'
]);
Route::get('dataPipeline/', [
    'as' => 'dataPipeline',
    'uses' => 'OportunidadesController@dataPipeline'
]);
Route::post('savePipeline/', [
    'as' => 'savePipeline/',
    'uses' => 'OportunidadesController@savePipeline'
]);

Route::get('clientes/', [
    'as' => 'clientes',
    'uses' => 'ClienteController@clientes'
]);
Route::post('crearCliente/', [
    'as' => 'crearCliente',
    'uses' => 'ClienteController@crearCliente'
]);
    });