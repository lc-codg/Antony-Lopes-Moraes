<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classes\ObterDados;
use App\Models\Arrecadacao;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\ExtratoController;

class ArrecadacaoController extends Controller
{
    public function index()
    {
        $Obterdados = new ObterDados();
        return view('Arrecadacao.Novo', ['Empresa' => $Obterdados->ListaDeEmpresas(),'Contas'=>$Obterdados->ListarContasBancarias()]);
    }
    public function ListarTodos(Request $request)
    {
        $Arrecada = DB::table('arrecadacaos')->join(
            'empresas',
            'arrecadacaos.Codempresa',
            '=',
            'empresas.id'
        )->select(
            'arrecadacaos.*',
            'empresas.Razao as Razaoe'
        )->wherebetween(
            'DataRecebimento',
            [$request->DataIni, $request->DataFim]
        )->paginate(20);

        return view('/Arrecadacao.Todos', ['Arrecada' => $Arrecada]);
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
                'Descricao' => $request->Descricao,
                'conta' => Str::substr($request->Conta, 0, 1),
            ]);

            $Extrato = new ExtratoController();
            $Extrato->InserirNoExtrato($request->Valor,'C',Str::substr($request->Conta, 0, 1),'Arrecadação',Str::substr($request->Codempresa, 0, 1));


           

            return  "<script>
            alert('Arrecadação Salva com sucesso!');
            location = '/Arrecadacao/Novo';
          </script>";
        }
    }

    public function Excluir($id)
    {
        $Arreacadacao = Arrecadacao::findOrFail($id);
        $Arreacadacao->delete();
        try {
            return "<script>alert('Registro deletado com sucesso!');
          location = '/Arrecadacao/Todos';
          </script>";
        } catch (Exception $e) {
            return "<script>alert('Erro ao deletar');</script>";
        }
    }
    public function Editar($id)
    {
        $Empresa = new ObterDados();
        $Arrecadacao = Arrecadacao::findOrFail($id);
        return View('Arrecadacao.Ver', ['Arrecadacao' => $Arrecadacao], ['Empresa' => $Empresa->ListaDeEmpresas()]);
    }
    public function Atualizar(Request $request)
    {

        if ($this->Verificar($request)) {
            $Arrecadacao = Arrecadacao::findOrFail($request->id);
            $Arrecadacao->update([
                'CodEmpresa' => Str::substr($request->Codempresa, 0, 1),
                'Valor' => $request->Valor,
                'Numero' => $request->Numero,
                'DataRecebimento' => $request->Data,
                'Descricao' => $request->Descricao
            ]);
            return  "<script>
            alert('Ajustes Salva com sucesso!');
            location = '/Arrecadacao/Todos';
          </script>";
        }
    }
}
