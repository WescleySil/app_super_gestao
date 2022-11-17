<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\TesteController;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\SobreController;
use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProdutoController;

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

Route::get('/login/{erro?}', [LoginController::class, 'index'])->name('site.login');
Route::post('/login', [LoginController::class, 'autenticar'])->name('site.login');

/* Parte restrita */

Route::middleware('aute:padrao')->prefix('/app')->group(function(){
    Route::get('/home', [HomeController::class, 'index'])->name('app.home');
    Route::get('/sair', [LoginController::class, 'sair'])->name('app.sair');
    Route::get('/clientes', [ClienteController::class,'index'])->name('app.clientes');

    Route::get('/fornecedores', [FornecedorController::class, 'index'])->name('app.fornecedores');
    Route::get('/fornecedores/listar', [FornecedorController::class, 'listar'])->name('app.fornecedores.listar');
    Route::post('/fornecedores/listar', [FornecedorController::class, 'listar'])->name('app.fornecedores.listar');
    Route::get('/fornecedores/adicionar', [FornecedorController::class, 'adicionar'])->name('app.fornecedores.adicionar');
    Route::post('/fornecedores/adicionar', [FornecedorController::class, 'adicionar'])->name('app.fornecedores.adicionar');
    Route::get('/fornecedores/editar/{id}/{msg?}', [FornecedorController::class, 'editar'])->name('app.fornecedores.editar');
    Route::get('/fornecedores/excluir/{id}', [FornecedorController::class, 'excluir'])->name('app.fornecedores.excluir');

    Route::get('/produtos', [ProdutoController::class, 'index'])->name('app.produtos');

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
