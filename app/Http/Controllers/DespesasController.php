<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Despesas;
use App\Classes\ObterDados;

class DespesasController extends Controller
{
    public function index()
    {
        $ObterDados = new ObterDados();

        return view('Despesas.Despesas', [
            'Empresas'
            =>  $ObterDados->ListaDeEmpresas(),
            'Fornecedor' =>  $ObterDados->ListaDeFornecedores()
        ]);
    }

    public function create(Request $request)
    {
        if (empty($request->Descricao)) {
            echo "<script>
              alert('Preencha a Descrição');
              javascript:history.back();
            </script>";
            exit;
        }
        if (empty($request->Vencimento)) {
            echo "<script>
              alert('Preencha o vencimento');
              javascript:history.back();
            </script>";
            exit;
        }
        if (empty($request->Dataemissao)) {
            echo "<script>
              alert('Preencha a Data da emissão');
              javascript:history.back();
            </script>";
            exit;
        }
        if (empty($request->Total)) {
            echo "<script>
              alert('Preencha a Total');
              javascript:history.back();
            </script>";
            exit;
        }
        if (empty($request->Datarecebimento)) {
            echo "<script>
              alert('Preencha a Data do recebimento');
              javascript:history.back();
            </script>";
            exit;
        }
        if (empty($request->CodEmpresa)) {
            echo "<script>
              alert('Preencha a Descrição');
              javascript:history.back();
            </script>";
            exit;
        } else {
            Despesas::create([
                'Barras' => $request->Barras,
                'Descricao' => $request->Descricao,
                'CodFornecedor' => Str::substr($request->CodFornecedor, 0, 1),
                'Total' => Str_replace(",", ".", $request->Total),
                'TotalDesconto' => isset($request->TotalDesconto) ? Str_replace(",", ".", $request->TotalDesconto) : 0,
                'TotalAcréscimo' => isset($request->TotalAcrescimo) ? Str_replace(",", ".", $request->TotalAcrescimo) : 0,
                'Vencimento' => $request->Vencimento,
                'CodGrupo' => Str::substr($request->CodGrupo, 0, 1),
                'CodSubGrupo' => Str::substr($request->SubGrupo, 0, 1),
                'Parcelas' => $request->Parcelas,
                'Dataemissao' => $request->Dataemissao,
                'Datarecebimento' => $request->Datarecebimento,
                'Boleta' => $request->boleta,
                'NotaFiscal' => $request->NotaFiscal,
                'Serie' => $request->Serie,
                'CodEmpresa' => Str::substr($request->CodEmpresa, 0, 1)
            ]);

            return
                "<script>
                alert('Salvo com sucesso!');
                location = '/Despesas/Todos';
              </script>";
        }
    }

    public function show($id)
    {
        $ObterDados = new ObterDados();

        $Despesas = Despesas::findOrFail($id);

        return view('/Despesas.Ver', [
            'Despesas' => $Despesas,
            'Empresas'
            =>  $ObterDados->ListaDeEmpresas(),
            'Fornecedor' =>  $ObterDados->ListaDeFornecedores()
        ]);
    }

    public function Listartodos()
    {

        $Despesas = DB::table('despesas')->join(
            'empresas',
            'despesas.CodEmpresa',
            '=',
            'empresas.id'
        )->join('fornecedors', 'despesas.CodFornecedor', '=', 'fornecedors.id')->select('despesas.*', 'empresas.Razao as Razaoe', 'fornecedors.Razao as Razaof')
            ->paginate(20);

        return view('/Despesas.Todos', ['Despesas' => $Despesas]);
    }

    public function update(Request $request, $id)
    {
        $Despesas = Despesas::findOrFail($id);

        if (empty($request->Descricao)) {
            echo "<script>
              alert('Preencha a Descrição');
              javascript:history.back();
            </script>";
            exit;
        }
        if (empty($request->Vencimento)) {
            echo "<script>
              alert('Preencha o vencimento');
              javascript:history.back();
            </script>";
            exit;
        }
        if (empty($request->Dataemissao)) {
            echo "<script>
              alert('Preencha a Data da emissão');
              javascript:history.back();
            </script>";
            exit;
        }
        if (empty($request->Total)) {
            echo "<script>
              alert('Preencha a Total');
              javascript:history.back();
            </script>";
            exit;
        }
        if (empty($request->Datarecebimento)) {
            echo "<script>
              alert('Preencha a Data do recebimento');
              javascript:history.back();
            </script>";
            exit;
        }
        if (empty($request->CodEmpresa)) {
            echo "<script>
              alert('Preencha a Descrição');
              javascript:history.back();
            </script>";
            exit;
        } else {
            $Despesas->Update([
                'Barras' => $request->Barras,
                'Descricao' => $request->Descricao,
                'CodFornecedor' => Str::substr($request->CodFornecedor, 0, 1),
                'Total' => Str_replace(",", ".", $request->Total),
                'TotalDesconto' => isset($request->TotalDesconto) ? Str_replace(",", ".", $request->TotalDesconto) : 0,
                'TotalAcréscimo' => isset($request->TotalAcrescimo) ? Str_replace(",", ".", $request->TotalAcrescimo) : 0,
                'Vencimento' => $request->Vencimento,
                'CodGrupo' => Str::substr($request->CodGrupo, 0, 1),
                'CodSubGrupo' => Str::substr($request->SubGrupo, 0, 1),
                'Parcelas' => $request->Parcelas,
                'Dataemissao' => $request->Dataemissao,
                'Datarecebimento' => $request->Datarecebimento,
                'Boleta' => $request->boleta,
                'NotaFiscal' => $request->NotaFiscal,
                'Serie' => $request->Serie,
                'CodEmpresa' => Str::substr($request->CodEmpresa, 0, 1)
            ]);

            return
                "<script>
          alert('Salvo com Sucesso!');
          location = '/Despesas/Todos';
      </script>";
        }
    }

    public function destroy($id)
    {
        $Despesas = Despesas::findOrFail($id);
        $Despesas->delete();

        return "<script>alert('Deletado com sucesso.');location = '/Despesas/Todos';</script>";
    }
}
