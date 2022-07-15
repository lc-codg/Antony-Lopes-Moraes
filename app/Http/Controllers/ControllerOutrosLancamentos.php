<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Http\Controllers\DespesasController;
use App\Http\Controllers\ReceitasController;
use App\Classes\ObterDados;

class ControllerOutrosLancamentos extends Controller
{
    public function Novo()
    {
        $ObterDados = new ObterDados();
        return view('Outros.Novo',['Empresas'=>$ObterDados->ListaDeEmpresas(),'Contas'=>$ObterDados->ListarContasBancarias()]);
    }
    public function Salvar(Request $request)
    {
        $Despesas = new DespesasController();
        $Receitas = new ReceitasController();

      ($request->Tipo == 'Crédito') ? $Receitas->create($request) : $Despesas->create($request); 
      return $this->Novo();
        
    }
}
