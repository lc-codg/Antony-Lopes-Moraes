<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classes\ObterDados;
use App\Models\Arrecadacao;

class ArrecadacaoController extends Controller
{
    public function index()
    {
        $Obterdados = new ObterDados();
        return view('Arrecadacao.Novo',['Empresa'=>$Obterdados->ListaDeEmpresas()]);
    }
    private function Verificar($Dados)
    {
        Isset($Dados->CodEmpresa) ? "<script>alert(Verifique o código da Empresa')</script>" : exit;
        Isset($Dados->Valor) ? "<script>alert(Verifique o Valor')</script>":exit;
        Isset($Dados->Data) ? "<script>alert(Verifique a data')</script>": exit;
       
        return true;
    }
    public function Salvar(Request $request)
    {
        if ($this->Verificar($request))
        {
            Arrecadacao :: create ([
                'CodEmpresa'=>$request->Codempresa,
                'Valor'=>$request->Valor,
                'Numero'=>$request->Numero,
                'DataRecebimento'=>$request->Data,
                'Descricao'=>$request->Descricao
            ]);
            return "<scrip>alet('Salvo com sucesso1)</scrip>";
            
        }

    }
}
