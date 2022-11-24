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
use App\Http\Controllers\ComprasController;
use App\Http\Controllers\ItensCompraController;
use App\Http\Controllers\ReceitasController;
use App\Http\Controllers\ControllerOutrosLancamentos;
use App\Http\Controllers\ArrecadacaoController;
use App\Http\Controllers\ExtratoController;
use App\Http\Controllers\BalancoController;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\AbateController;
use App\Http\Controllers\User;

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
    return view('Public');
});

Route::get('/Produtos/Novo', [ProdutosController::class, 'Cadastrar']);
Route::post('/Produtos/Salvar', [ProdutosController::class, 'Salvar']);
Route::get('/Produtos/Editar/{Id}', [ProdutosController::class, 'Editar']);
Route::get('/Produtos/Delete/{Id}', [ProdutosController::class, 'Delete']);
Route::get('/Produtos/Ver/{Id}', [ProdutosController::class, 'ListarPorId']);
Route::get('/Produtos/Todos', [ProdutosController::class, 'ListarTodos']);
Route::get('/Produtos/Inserir', [ProdutosController::class, 'Inserir']);
Route::get('/Produtos/InserirCompras', [ProdutosController::class, 'InserirCompras']);
Route::get('/Produtos/LocDesc', [ProdutosController::class, 'LocalizarPorDescricao'])->name('Produtos.LocDesc');

Route::get('/Clientes/Novo', [ClientesController::class, 'Cadastrar']);
Route::post('/Clientes/Salvar', [ClientesController::class, 'Salvar']);
Route::get('/Clientes/Editar/{Id}', [ClientesController::class, 'Editar']);
Route::get('/Clientes/Delete/{Id}', [ClientesController::class, 'Delete']);
Route::get('/Clientes/Ver/{Id}', [ClientesController::class, 'ListarPorId']);
Route::get('/Clientes/Todos', [ClientesController::class, 'ListarTodos']);
Route::get('/Clientes/Inserir', [ClientesController::class, 'Inserir']);
Route::get('/Clientes/PesquisaNome', [ClientesController::class, 'ListarPorNome']);

Route::get('/Pedidos/Ver/{Id}', [PedidoController::class, 'ListarPorId']);
Route::get('/Pedidos/Todos', [PedidoController::class, 'ListarTodos']);
Route::get('/Pedidos/Delete/{id}', [PedidoController::class, 'Delete']);
Route::get('/Pedidos/Carrinho', [PedidoController::class, 'Show']);
Route::get('/Pedidos/LimparCarrinho', [PedidoController::class, 'LimparCarrinho']);
Route::get('/Pedidos/Salvar', [PedidoController::class, 'create']);
Route::get('/Pedidos/ImprimirA4/{id}/{tipo}', [PedidoController::class, 'Imprimir']);

Route::get('/Itens/Delete/{Id}', [ItensController::class, 'Delete']);
Route::get('/Itens/Ver/{id}', [ItensController::class, 'ListarPorId']);
Route::get('/Itens/Todos/{id}', [ItensController::class, 'ListarTodos']);

Route::get('/ItensCompra/Delete/{Id}', [ItensCompraController::class, 'Delete']);
Route::get('/ItensCompra/Ver/{id}', [ItensCompraController::class, 'ListarPorId']);
Route::get('/ItensCompra/Todos/{id}', [ItensCompraController::class, 'ListarTodos']);

Route::get('/Fornecedor/Novo', [FornecedorController::class, 'Cadastrar']);
Route::post('/Fornecedor/Salvar', [FornecedorController::class, 'Salvar']);
Route::get('/Fornecedor/Editar/{Id}', [FornecedorController::class, 'Editar']);
Route::get('/Fornecedor/Delete/{Id}', [FornecedorController::class, 'Delete']);
Route::get('/Fornecedor/Ver/{Id}', [FornecedorController::class, 'ListarPorId']);
Route::get('/Fornecedor/Todos', [FornecedorController::class, 'ListarTodos']);
Route::get('/Fornecedor/Inserir', [FornecedorController::class, 'Inserir']);
Route::get('/Fornecedor/PesquisaNome', [FornecedorController::class, 'ListarPorNome']);

Route::get('/Empresa/Novo', [EmpresaController::class, 'Cadastrar']);
Route::post('/Empresa/Salvar', [EmpresaController::class, 'Salvar']);
Route::get('/Empresa/Editar/{Id}', [EmpresaController::class, 'Editar']);
Route::get('/Empresa/Delete/{Id}', [EmpresaController::class, 'Delete']);
Route::get('/Empresa/Ver/{Id}', [EmpresaController::class, 'ListarPorId']);
Route::get('/Empresa/Todos', [EmpresaController::class, 'ListarTodos']);
Route::post('/Empresa/Inserir', [EmpresaController::class, 'Inserir']);
Route::get('/Empresa/Seleciona', [EmpresaController::class, 'Seleciona']);

Route::get('/ContasBancarias/Novo', [ContasBancariasController::class, 'index']);
Route::post('/ContasBancarias/Salvar', [ContasBancariasController::class, 'Salvar']);
Route::get('/ContasBancarias/Todos/', [ContasBancariasController::class, 'ListarTodos']);
Route::get('/ContasBancarias/Ver/{id}', [ContasBancariasController::class, 'show']);
Route::get('/ContasBancarias/Editar/{id}', [ContasBancariasController::class, 'Update']);
Route::get('/ContasBancarias/Delete/{id}', [ContasBancariasController::class, 'Delete']);

Route::get('/ContasaPagar/Novo', [ContasaPagarController::class, 'index']);
Route::post('/ContasaPagar/Salvar', [Contasapagarcontroller::class, 'create']);
Route::get('/ContasaPagar/Todos', [ContasaPagarController::class, 'ListarTodos']);
Route::get('/ContasaPagar/Ver/{id}', [ContasaPagarController::class, 'show']);
Route::get('/ContasaPagar/Editar/{id}', [ContasaPagarController::class, 'update']);
Route::get('/ContasaPagar/Delete/{id}', [Contasapagarcontroller::class, 'destroy']);
Route::get('/ContasaPagar/Quitar/', [ContasaPagarController::class, 'Quitar']);
Route::get('/ContasaPagar/Estornar', [ContasaPagarController::class, 'Estornar']);

Route::get('/ContasaReceber/Novo', [ContasaReceberController::class, 'index']);
Route::post('/ContasaReceber/Salvar', [ContasaRecebercontroller::class, 'create']);
Route::get('/ContasaReceber/Todos', [ContasaReceberController::class, 'ListarTodos']);
Route::get('/ContasaReceber/Ver/{id}', [ContasaReceberController::class, 'show']);
Route::get('/ContasaReceber/Editar/{id}', [ContasaReceberController::class, 'update']);
Route::get('ContasaReceber/Delete/{id}', [ContasaRecebercontroller::class, 'destroy']);
Route::get('/ContasaReceber/Quitar/', [ContasaReceberController::class, 'Quitar']);
Route::get('/ContasaReceber/Estornar/', [ContasaReceberController::class, 'Estornar']);
Route::get('/ContasaReceber/Validar/', [ContasaReceberController::class, 'Validar']);
Route::post('/ContasaReceber/EstornarParcial/', [ContasaReceberController::class, 'EParcial']);

Route::get('/Despesas/Novo', [DespesasController::class, 'index']);
Route::post('/Despesas/Salvar', [Despesascontroller::class, 'create']);
Route::get('/Despesas/Todos', [DespesasController::class, 'ListarTodos']);
Route::get('/Despesas/Ver/{id}', [DespesasController::class, 'show']);
Route::get('/Despesas/Editar/{id}', [DespesasController::class, 'update']);
Route::get('Despesas/Delete/{id}', [Despesascontroller::class, 'destroy']);

Route::get('/Compras/Ver/{Id}', [ComprasController::class, 'ListarPorId']);
Route::get('/Compras/Todos', [ComprasController::class, 'ListarTodos']);
Route::get('/Compras/Delete/{id}', [ComprasController::class, 'Delete']);
Route::get('/Compras/Carrinho', [ComprasController::class, 'Show']);
Route::get('/Compras/LimparCarrinho', [ComprasController::class, 'LimparCarrinho']);
Route::get('/Compras/Salvar', [ComprasController::class, 'create']);
Route::get('/Compras/ImprimirA4/{id}/{tipo}', [ComprasController::class, 'Imprimir']);

Route::get('/Receitas/Novo', [ReceitasController::class, 'index']);
Route::get('/Receitas/Todos', [ReceitasController::class, 'ListarTodos']);
Route::post('/Receitas/Salvar', [Receitascontroller::class, 'create']);
Route::get('/Receitas/Ver/{id}', [ReceitasController::class, 'show']);
Route::get('/Receitas/Editar/{id}', [ReceitasController::class, 'update']);
Route::get('Receitas/Delete/{id}', [ReceitasController::class, 'destroy']);

Route::get('/Outros/Novo', [ControllerOutrosLancamentos::class, 'Novo']);
Route::post('/Outros/Salvar', [ControllerOutrosLancamentos::class, 'Salvar']);


route::get('/Arrecadacao/Novo', [ArrecadacaoController::class, 'index']);
Route::post('/Arrecadacao/Salvar', [ArrecadacaoController::class, 'Salvar']);
Route::get('/Arrecadacao/Todos', [ArrecadacaoController::class, 'Listartodos']);
Route::get('/Arrecadacao/Deletar/{id}', [ArrecadacaoController::class, 'Excluir']);
Route::get('/Arrecadacao/Editar/{id}', [ArrecadacaoController::class, 'Editar']);
Route::post('/Arrecadacao/Atualizar', [ArrecadacaoController::class, 'Atualizar']);

Route::get('/Extrato/Todos/{id}', [ExtratoController::class, 'ShowExtrato']);
Route::get('/Extrato/View', [ExtratoController::class, 'ExtratoGeral']);

Route::get('/Balanco/Show', [BalancoController::class, 'Show']);
Route::post('/Balanco/Cadastrar', [BalancoController::class, 'Cadastrar']);
Route::get('/Balanco/Listar', [BalancoController::class, 'Listar']);
Route::get('/Balanco/Localizar', [BalancoController::class, 'Localizar']);

Route::get('/Categorias/Categorias', [CategoriasController::class, 'Show']);
Route::post('/Categorias/Salvar', [CategoriasController::class, 'Salvar']);
Route::post('/Categorias/Editar', [CategoriasController::class, 'Editar']);
Route::get('/Categorias/Todos', [CategoriasController::class, 'Listar']);
Route::get('/Categorias/Localizar', [CategoriasController::class, 'Localizar']);
Route::get('/Categorias/Excluir/', [CategoriasController::class, 'Excluir']);

Route::get('/Boi', [AbateController::class, 'index']);
Route::get('/Tabela', [AbateController::class, 'show']);

Route::get('/Usuario/{Tipo}',[user::class,'index']);
