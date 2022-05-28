<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutosController;
use App\Http\Controllers\ClientesController;

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
    return view('Home');
});
Route::get('/Produtos/Novo',[ProdutosController::class,'Cadastrar']);
Route::post('/Produtos/Salvar',[ProdutosController::class,'Salvar']);
Route::get('/Produtos/Editar/{Id}',[ProdutosController::class,'Editar']);
Route::get('/Produtos/Delete/{Id}',[ProdutosController::class,'Delete']);
Route::get('Produtos/Ver/{Id}',[ProdutosController::class,'ListarPorId']);
Route::get('Produtos/Todos',[ProdutosController::class,'ListarTodos']);

Route::get('/Clientes/Novo',[ClientesController::class,'Cadastrar']);
Route::post('/Clientes/Salvar',[ClientesController::class,'Salvar']);
Route::get('/Clientes/Editar/{Id}',[ClientesController::class,'Editar']);
Route::get('/Clientes/Delete/{Id}',[ClientesController::class,'Delete']);
Route::get('/Clientes/Ver/{Id}',[ClientesController::class,'ListarPorId']);
Route::get('/Clientes/Todos',[ClientesController::class,'ListarTodos']);

