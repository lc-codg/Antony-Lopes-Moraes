<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Receitas;
use App\Classes\ObterDados;
use App\Http\Controllers\ContasBancariasController;

class ReceitasController extends Controller
{
    public function index()
    {
        $ObterDados = new ObterDados();
        return view('Receitas.Receitas', [
            'Empresas'
            =>  $ObterDados->ListaDeEmpresas(),
            'Cliente' =>  $ObterDados->ListaDeClientes(),
            'Contas' => $ObterDados->ListarContasBancarias(),
        ]);
    }
    public function Verificar($dados)
    {
        if (empty($dados->Total)) {
            echo "<script>
              alert('Preencha a Total');
              javascript:history.back();
            </script>";
            exit;
        }
        if (empty($dados->Datarecebimento)) {
            echo "<script>
              alert('Preencha a Data do recebimento');
              javascript:history.back();
            </script>";
            exit;
        }
        if (empty($dados->CodEmpresa)) {
            echo "<script>
              alert('Preencha a Descrição');
              javascript:history.back();
            </script>";
            exit;
        } else {

            return true;
        }
    }


    public function create(Request $request)
    {
        $Contas = new ContasBancariasController();

        if ($this->Verificar($request)) {

            Receitas::create([
                'Descricao' => $request->Descricao,
                'CodCliente' => Isset($request->CodCliente) ? Str::substr($request->CodCliente, 0, 1) :0,
                'Total' => Str_replace(",", ".", $request->Total),
                'TotalDesconto' => isset($request->TotalDesconto) ? Str_replace(",", ".", $request->TotalDesconto) : 0,
                'TotalAcréscimo' => isset($request->TotalAcrescimo) ? Str_replace(",", ".", $request->TotalAcrescimo) : 0,
                'Vencimento' => $request->Vencimento,
                'Parcelas' => $request->Parcelas,
                'DataDaEntrada' => $request->Datarecebimento,
                'Boleta' => $request->boleta,
                'NotaFiscal' => $request->NotaFiscal,
                'Serie' => $request->Serie,
                'CodEmpresa' => Str::substr($request->CodEmpresa, 0, 1),
            ]);
            $Contas->Deposito(Str::substr($request->Conta, 0, 1), $request->Total);

            return
                "<script>
                alert('Receita Salva com sucesso!');
                location = '/Receitas/Novo';
              </script>";
        }
    }


    public function show($id)
    {
        $ObterDados = new ObterDados();
        $Conta = new ContasBancariasController();

        $Receitas = Receitas::findOrFail($id);

        return view('/Receitas.Ver', [
            'Receitas' => $Receitas,
            'Empresas'
            =>  $ObterDados->ListaDeEmpresas(),
            'Cliente' =>  $ObterDados->ListaDeClientes()
        ]);
    }

    public function Listartodos(Request $request)
    {
        $Receitas = DB::table('Receitas')->join(
            'empresas',
            'Receitas.CodEmpresa',
            '=',
            'empresas.id'
        )->select('Receitas.*', 'empresas.Razao as Razaoe', 'Receitas.CodCliente as Razaof')->wherebetween('DataDaEntrada', [$request->DataIni, $request->DataFim])->paginate(20);

        return view('/Receitas.Todos', ['Receitas' => $Receitas]);
    }

    public function update(Request $request, $id)
    {
        $Receitas = Receitas::findOrFail($id);

        if ($this->Verificar($request)) {
            $Receitas->Update([
                'Descricao' => $request->Descricao,
                'CodCliente' => Isset($request->CodCliente) ? Str::substr($request->CodCliente, 0, 1) :0,
                'Total' => Str_replace(",", ".", $request->Total),
                'TotalDesconto' => isset($request->TotalDesconto) ? Str_replace(",", ".", $request->TotalDesconto) : 0,
                'TotalAcréscimo' => isset($request->TotalAcrescimo) ? Str_replace(",", ".", $request->TotalAcrescimo) : 0,
                'Vencimento' => $request->Vencimento,
                'Parcelas' => $request->Parcelas,
                'DataDaEntrada' => $request->Datarecebimento,
                'Boleta' => $request->boleta,
                'NotaFiscal' => $request->NotaFiscal,
                'Serie' => $request->Serie,
                'CodEmpresa' => Str::substr($request->CodEmpresa, 0, 1)
            ]);

            return
                "<script>
          alert('Salvo com Sucesso!');
          location = '/Receitas/Todos';
      </script>";
        }
    }


    public function destroy($id)
    {

        $Receitas = Receitas::findOrFail($id);
        $Receitas->delete();

        return "<script>alert('Deletado com sucesso.');location = '/Receitas/Todos';</script>";
    }
}
