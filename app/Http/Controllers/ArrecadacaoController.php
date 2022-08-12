<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classes\ObterDados;
use App\Models\Arrecadacao;
use Illuminate\Support\Str;

class ArrecadacaoController extends Controller
{
    public function index()
    {
        $Obterdados = new ObterDados();
        return view('Arrecadacao.Novo', ['Empresa' => $Obterdados->ListaDeEmpresas()]);
    }
    private function Verificar($Dados)
    {
        if (empty($Dados->Codempresa)) {
            echo "<script>
             alert('Preencha a Empresa');
             javascript:history.back();
            </script>";
            exit;
        }
        if (empty($Dados->Valor)) {
            echo "<script>
              alert('Preencha o Valor');
              javascript:history.back();
             </script>";
            exit;
        }
        if (empty($Dados->Data)) {
            echo "<script>
             alert('Preencha a Data');
             javascript:history.back();
            </script>";
            exit;
        } else {
            return true;
        }
    }
    public function Salvar(Request $request)
    {
        if ($this->Verificar($request)) {

            Arrecadacao::create([
                'CodEmpresa' => Str::substr($request->Codempresa, 0, 1),
                'Valor' => $request->Valor,
                'Numero' => $request->Numero,
                'DataRecebimento' => $request->Data,
                'Descricao' => $request->Descricao
            ]);
            return  "<script>
            alert('Arrecadação Salva com sucesso!');
            location = '/Arrecadacao/Novo';
          </script>";
        }
    }
}
