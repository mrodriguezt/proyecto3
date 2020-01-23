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


//Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
Route::group(['middleware'=>'auth'],function() {

Route::get('/', function () {
    return view('index');
});
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

Route::get('inteligencia/', [
    'as' => 'inteligencia',
    'uses' => 'InteligenciaController@inteligencia'
]);
Route::get('layoutInteligencia/', [
    'as' => 'layoutInteligencia',
    'uses' => 'InteligenciaController@layoutInteligencia'
]);
Route::get('dataInteligencia/', [
    'as' => 'dataInteligencia',
    'uses' => 'InteligenciaController@dataInteligencia'
]);
Route::post('saveInteligencia/', [
    'as' => 'saveInteligencia/',
    'uses' => 'InteligenciaController@saveInteligencia'
]);
Route::post('subirFotoInteligencia/', [
    'as'=>'subirFotoInteligencia',
    'uses'=>'InteligenciaController@subirFotoInteligencia'
]);
Route::post('subirDocsInteligencia/', [
    'as'=>'subirDocsInteligencia',
    'uses'=>'InteligenciaController@subirDocsInteligencia'
]);
Route::get('clientes/', [
    'as' => 'clientes',
    'uses' => 'ClienteController@clientes'
]);
Route::get('layoutClientes/', [
    'as' => 'layoutClientes',
    'uses' => 'ClienteController@layoutClientes'
]);
Route::get('dataClientes/', [
    'as' => 'dataClientes',
    'uses' => 'ClienteController@dataClientes'
]);
Route::post('saveClientes/', [
    'as' => 'saveClientes/',
    'uses' => 'ClienteController@saveClientes'
]);
});