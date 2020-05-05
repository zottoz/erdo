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
use Illuminate\Support\Facades\Route;

//Rota para autenticacao
Auth::routes();

//Rota para Dashboard
Route::get('/', 'DashboardController@index')->middleware('auth');

//Rota para Usuarios
Route::get('/user/settings', function(){
    return view('usuario/configuracao');
})->middleware('auth');


//Rota para R.D.O.
Route::get('rdo', 'RdoController@index')->name('rdo')->middleware('auth');
Route::get('rdo/novo', 'RdoController@create')->name('rdo.novo')->middleware('auth');
Route::post('rdo/novo', 'RdoController@store')->name('rdo.gravar')->middleware('auth');

//Rota para busca ajax
Route::get('/busca/itensdappu',     'BuscaController@itensAjax')->name('buscaItensDaPPU');
Route::get('/busca/dadoscontrato',  'BuscaController@dadosAjax')->name('buscaDadosContrato');

//Rota para os relatorios
Route::get('/relatorios', 'RelatorioController@index')->middleware('auth');

//Rotas Empresa
Route::get('empresa',               'EmpresaController@index')->name('empresa')->middleware('auth');
Route::get('empresa/novo',          'EmpresaController@create')->name('empresa.novo')->middleware('auth');
Route::post('empresa/novo',         'EmpresaController@store')->name('empresa.gravar')->middleware('auth');
Route::get('empresa/exibir/{id}',   'EmpresaController@show')->name('empresa.exibir')->middleware('auth');
Route::get('empresa/editar/{id}',   'EmpresaController@edit')->name('empresa.editar')->middleware('auth');
Route::post('empresa/editar/{id}',  'EmpresaController@update')->name('empresa.alterar')->middleware('auth');
Route::get('empresa/excluir/{id}',  'EmpresaController@destroy')->name('empresa.excluir')->middleware('auth');

//Rotas Contratos
Route::get('contrato',               'ContratoController@index')->name('contrato')->middleware('auth');
Route::get('contrato/novo',          'ContratoController@create')->name('contrato.novo')->middleware('auth');
Route::post('contrato/novo',         'ContratoController@store')->name('contrato.gravar')->middleware('auth');
Route::get('contrato/exibir/{id}',   'ContratoController@show')->name('contrato.exibir')->middleware('auth');
Route::get('contrato/editar/{id}',   'ContratoController@edit')->name('contrato.editar')->middleware('auth');
Route::post('contrato/editar/{id}',  'ContratoController@update')->name('contrato.alterar')->middleware('auth');
Route::get('contrato/excluir/{id}',  'ContratoController@destroy')->name('contrato.excluir')->middleware('auth');

//Rota para a PPU
Route::get('/contrato/ppu/importar', 'PpuController@index')->name('ppu.importar');
Route::post('/contrato/ppu/importar', 'PpuController@importar')->name('ppu.importar');