<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutosController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\ItensController;
use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\ContasBancariasController;
use App\Http\Controllers\ContasaPagarController;
use App\Http\Controllers\ContasaReceberController;
use App\Http\Controllers\DespesasController;
use App\Models\ContasaReceber;

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

Route::get('/Produtos/Novo', [ProdutosController::class, 'Cadastrar']);
Route::post('/Produtos/Salvar', [ProdutosController::class, 'Salvar']);
Route::get('/Produtos/Editar/{Id}', [ProdutosController::class, 'Editar']);
Route::get('/Produtos/Delete/{Id}', [ProdutosController::class, 'Delete']);
Route::get('/Produtos/Ver/{Id}', [ProdutosController::class, 'ListarPorId']);
Route::get('/Produtos/Todos', [ProdutosController::class, 'ListarTodos']);
Route::get('/Produtos/Inserir', [ProdutosController::class, 'Inserir']);
Route::get('/Produtos/LocDesc', [ProdutosController::class, 'LocalizarPorDescricao'])->name('Produtos.LocDesc');

Route::get('/Clientes/Novo', [ClientesController::class, 'Cadastrar']);
Route::post('/Clientes/Salvar', [ClientesController::class, 'Salvar']);
Route::get('/Clientes/Editar/{Id}', [ClientesController::class, 'Editar']);
Route::get('/Clientes/Delete/{Id}', [ClientesController::class, 'Delete']);
Route::get('/Clientes/Ver/{Id}', [ClientesController::class, 'ListarPorId']);
Route::get('/Clientes/Todos', [ClientesController::class, 'ListarTodos']);
Route::post('/Clientes/Inserir', [ClientesController::class, 'Inserir']);


Route::get('/Pedidos/Ver/{Id}', [PedidoController::class, 'ListarPorId']);
Route::get('/Pedidos/Todos', [PedidoController::class, 'ListarTodos']);
Route::get('/Pedidos/Delete/{id}', [PedidoController::class, 'Delete']);
Route::get('/Pedidos/Carrinho', [PedidoController::class, 'Show']);
Route::get('/Pedidos/LimparCarrinho', [PedidoController::class, 'LimparCarrinho']);

Route::get('/Itens/Delete/{Id}', [ItensController::class, 'Delete']);
Route::get('/Itens/Ver/{id}', [ItensController::class, 'ListarPorId']);
Route::get('/Itens/Todos', [ItensController::class, 'ListarTodos']);

Route::get('/Fornecedor/Novo', [FornecedorController::class, 'Cadastrar']);
Route::post('/Fornecedor/Salvar', [FornecedorController::class, 'Salvar']);
Route::get('/Fornecedor/Editar/{Id}', [FornecedorController::class, 'Editar']);
Route::get('/Fornecedor/Delete/{Id}', [FornecedorController::class, 'Delete']);
Route::get('/Fornecedor/Ver/{Id}', [FornecedorController::class, 'ListarPorId']);
Route::get('/Fornecedor/Todos', [FornecedorController::class, 'ListarTodos']);
Route::post('/Fornecedor/Inserir', [FornecedorController::class, 'Inserir']);

Route::get('/Empresa/Novo', [EmpresaController::class, 'Cadastrar']);
Route::post('/Empresa/Salvar', [EmpresaController::class, 'Salvar']);
Route::get('/Empresa/Editar/{Id}', [EmpresaController::class, 'Editar']);
Route::get('/Empresa/Delete/{Id}', [EmpresaController::class, 'Delete']);
Route::get('/Empresa/Ver/{Id}', [EmpresaController::class, 'ListarPorId']);
Route::get('/Empresa/Todos', [EmpresaController::class, 'ListarTodos']);
Route::post('/Empresa/Inserir', [EmpresaController::class, 'Inserir']);

Route::get('/ContasBancarias/Novo', [ContasBancariasController::class, 'index']);
Route::post('/ContasBancarias/Salvar', [ContasBancariasController::class, 'Salvar']);
Route::get('/ContasBancarias/Todos', [ContasBancariasController::class, 'ListarTodos']);
Route::get('/ContasBancarias/Ver/{id}', [ContasBancariasController::class, 'show']);
Route::get('/ContasBancarias/Editar/{id}', [ContasBancariasController::class, 'Update']);
Route::get('/ContasBancarias/Delete/{id}', [ContasBancariasController::class, 'Delete']);

Route::get('/ContasaPagar/Novo', [ContasaPagarController::class, 'index']);
Route::post('/ContasaPagar/Salvar', [Contasapagarcontroller::class, 'create']);
Route::get('/ContasaPagar/Todos', [ContasaPagarController::class, 'ListarTodos']);
Route::get('/ContasaPagar/Ver/{id}', [ContasaPagarController::class, 'show']);
Route::get('/ContasaPagar/Editar/{id}', [ContasaPagarController::class, 'update']);
Route::get('/ContasaPagar/Delete/{id}', [Contasapagarcontroller::class, 'destroy']);
Route::get('/ContasaPagar/Quitar/{id},{tipo}', [ContasaPagarController::class, 'Quitar']);
Route::get('/ContasaPagar/Estornar/{id},{tipo}', [ContasaPagarController::class, 'Estornar']);

Route::get('/ContasaReceber/Novo', [ContasaReceberController::class, 'index']);
Route::post('/ContasaReceber/Salvar', [ContasaRecebercontroller::class, 'create']);
Route::get('/ContasaReceber/Todos', [ContasaReceberController::class, 'ListarTodos']);
Route::get('/ContasaReceber/Ver/{id}', [ContasaReceberController::class, 'show']);
Route::get('/ContasaReceber/Editar/{id}', [ContasaReceberController::class, 'update']);
Route::get('ContasaReceber/Delete/{id}', [ContasaRecebercontroller::class, 'destroy']);
Route::get('/ContasaReceber/Quitar/{id},{tipo}', [ContasaReceberController::class, 'Quitar']);
Route::get('/ContasaReceber/Estornar/{id},{tipo}', [ContasaReceberController::class, 'Estornar']);

Route::get('/Despesas/Novo', [DespesasController::class, 'index']);
Route::post('/Despesas/Salvar', [Despesascontroller::class, 'create']);
Route::get('/Despesas/Todos', [DespesasController::class, 'ListarTodos']);
Route::get('/Despesas/Ver/{id}', [DespesasController::class, 'show']);
Route::get('/Despesas/Editar/{id}', [DespesasController::class, 'update']);
Route::get('Despesas/Delete/{id}', [Despesascontroller::class, 'destroy']);
