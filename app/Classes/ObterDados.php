<?php

namespace App\Classes;

use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\ContasBancariasController;

class ObterDados
{
    public function ListaDeFornecedores()
    {
        $Fornecedor = new FornecedorController();
        return $Fornecedor->Listar();
    }
    public function ListaDeEmpresas()
    {
        $Empresa = new EmpresaController();
        return $Empresa->Listar();
    }
    public function ListaDeClientes()
    {
        $clientes = new ClientesController();
        return $clientes->Listar();
    }
    public function ListarContasBancarias(){
        $Contas = new ContasBancariasController();
        return $Contas->Listar();
    }
}
