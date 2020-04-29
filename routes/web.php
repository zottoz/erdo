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

use App\Http\Controllers\BuscaController;

Auth::routes();

Route::get('/', function () {
    return view('dashboard');
});//->middleware('auth');


Route::get('/rdo/criar', 'RdoController@index');


// rota para busca ajax
Route::get('/busca/itens', 'BuscaController@itensAjax')
            ->name('buscaItensDaPPU');
//            ->middleware('auth');

//Rotas Empresa
Route::get('empresa/novo',       'EmpresaController@create')->middleware('auth');
Route::post('empresa/novo',      'EmpresaController@store')->middleware('auth');

Route::get('empresa/exibir',     'EmpresaController@show')->middleware('auth');
Route::get('empresa/editar/:id', 'EmpresaController@show')->middleware('auth');
Route::get('empresa/excluir',    'EmpresaController@destroy')->middleware('auth');
Route::get('empresa/listar',     'EmpresaController@index')->middleware('auth');
