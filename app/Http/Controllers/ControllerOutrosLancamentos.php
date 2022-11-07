<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Http\Controllers\DespesasController;
use App\Http\Controllers\ReceitasController;
use App\Classes\ObterDados;
use app\Http\Controllers\ExtratoController;
use Illuminate\Support\Str;

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

      $Modelo = ($request->Tipo == 'Crédito') ? 'C' : 'D';
      $Empresa = Str::substr($request->CodEmpresa, 0, 1);
      $Total = $request->Total;
      $Extrato = new ExtratoController();
      $Extrato->InserirNoExtrato($Total, $Modelo, $request->Conta, 'Outros',$Empresa);

      echo "<script>alert('Salvo com sucesso!');</script>";
      return $this->Novo();
        
    }
}
