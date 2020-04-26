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

Route::get('/', function () {
    return view('dashboard');
})->middleware('auth');

Auth::routes();

Route::get('/rdo/criar', function() {
    return view('rdo/criar');
})->name('criar_rdo');

// rota para busca ajax
Route::get('/busca/itens', 'BuscaController@itensAjax')->name('buscaItensDaPPU');