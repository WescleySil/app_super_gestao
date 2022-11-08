<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\TesteController;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\SobreController;
use App\Http\Controllers\FornecedorController;

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

//Página principal
Route::get('/', [PrincipalController::class , 'principal'])->name('site.index');

//Página Sobre nós
Route::get('/sobre', [SobreController::class, 'sobre'])->name('site.sobre');

//Página Contato
Route::get('/contato', [ContatoController::class , 'contato'])->name('site.contato');
Route::post('/contato', [ContatoController::class , 'salvar'])->name('site.contato');

Route::get('/login', function(){ return 'Login';})->name('site.login');

/* Parte restrita */

Route::prefix('/app')->middleware('aute:padrao')->group(function(){
    Route::get('/clientes', function(){ return 'Clientes';})->name('app.clientes');
    Route::get('/fornecedores', [FornecedorController::class, 'index'])->name('app.fornecedores');
    Route::get('/produtos', function(){ return 'Produtos';})->name('app.produtos');

});

Route::fallback(function(){
    echo 'A rota acessada não existe. <a href="'.route('site.index').'">Clique aqui</a> para ir para página inicial';
});
/*  Verbos HTTP

get
post
put
patch
delete
options

*/
