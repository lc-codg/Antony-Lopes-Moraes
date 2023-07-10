<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Despesas;
use App\Classes\ObterDados;
use App\Http\Controllers\ContasBancariasController;
use App\Http\Controllers\ExtratoController;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\ArrecadacaoController;

class DespesasController extends Controller
{
    public function Verificar($Dados)
    {

        if (empty($Dados->Total)) {
            echo "<script>
              alert('Preencha a Total');
              javascript:history.back();
            </script>";
            exit;
        }
        if (empty($Dados->Datarecebimento)) {
            echo "<script>
              alert('Preencha a Data do recebimento');
              javascript:history.back();
            </script>";
            exit;
        }
        if (empty($Dados->CodEmpresa)) {
            echo "<script>
              alert('Preencha a Descrição');
              javascript:history.back();
            </script>";
            exit;
        } else {
            return true;
        }
    }
    public function index()
    {
        $ObterDados = new ObterDados();
        $Categoria = new CategoriasController();
        $Cat = $Categoria->ListaCategoria('Categoria');
        $SubCategoria = $Categoria->ListaCategoria('Sub-Categoria');

        return view('Despesas.Despesas', [
            'Empresas'
            =>  $ObterDados->ListaDeEmpresas(),
            'Fornecedor' =>  $ObterDados->ListaDeFornecedores(),
            'Contas' => $ObterDados->ListarContasBancarias(),
            'Categoria' => $Cat,
            'Sub' => $SubCategoria,
        ]);
    }

    public function create(Request $request)
    {
        $Contas = new ContasBancariasController();

        if ($this->Verificar($request)) {
$Forn =  explode("-",$request->CodFornecedor);
            Despesas::create([
                'Barras' => $request->Barras,
                'Descricao' => $request->Descricao,
                'CodFornecedor' => isset($request->CodFornecedor) ? $Forn[0] : 0,
                'Total' => Str_replace(",", ".", $request->Total),
                'TotalDesconto' => isset($request->TotalDesconto) ? Str_replace(",", ".", $request->TotalDesconto) : 0,
                'TotalAcréscimo' => isset($request->TotalAcrescimo) ? Str_replace(",", ".", $request->TotalAcrescimo) : 0,
                'Vencimento' => $request->Datarecebimento,
                'CodGrupo' => isset($request->CodGrupo) ? Str::substr($request->CodGrupo, 0, 1) : 0,
                'CodSubGrupo' =>  isset($request->CodGrupo) ? Str::substr($request->SubGrupo, 0, 1) : 0,
                'Parcelas' => $request->Parcelas,
                'Dataemissao' => $request->Datarecebimento,
                'Datarecebimento' => $request->Datarecebimento,
                'Boleta' => $request->boleta,
                'NotaFiscal' => $request->NotaFiscal,
                'Serie' => $request->Serie,
                'CodEmpresa' => Str::substr($request->CodEmpresa, 0, 1),
                //'Conta' => Str::substr($request->Conta, 0, 1),
            ]);

                $Arrecadacao = new ArrecadacaoController();
                $Arrecadacao->CompraAVista(Str::substr($request->CodEmpresa, 0, 1),Str_replace(",", ".", $request->Total),1,$request->Datarecebimento);



            /* $Contas->Saque(Str::substr($request->Conta, 0, 1), $request->Total);
            $Empresa = Str::substr($request->CodEmpresa, 0, 1);

            $Total = $request->Total;
            $Extrato = new ExtratoController();
            $Extrato->InserirNoExtrato($Total, 'D', Str::substr($request->Conta, 0, 1), 'Despesa', $Empresa, $request->Descricao);
*/
            return
                "<script>
            alert('Salvo com sucesso!');
            location = '/Despesas/Novo';
         </script>";
        }
    }
    public function Debito(Request $request)
    {
        $Contas = new ContasBancariasController();


        $Contas->Saque(Str::substr($request->Conta, 0, 1), $request->Total);
        $Empresa = Str::substr($request->CodEmpresa, 0, 1);

        $Total = $request->Total;
        $Extrato = new ExtratoController();
        $Extrato->InserirNoExtrato($Total, 'D', Str::substr($request->Conta, 0, 1), 'Despesa', $Empresa, $request->Descricao);

        return
            "<script>
            alert('Débito lançado com sucesso!');
            location = '/Despesas/Novo';
         </script>";
    }

    public function show($id)
    {
        $ObterDados = new ObterDados();

        $Despesas = Despesas::findOrFail($id);
        $Categoria = new CategoriasController();
        $Cat = $Categoria->ListaCategoria('Categoria');
        $SubCategoria = $Categoria->ListaCategoria('Sub-Categoria');

        return view('/Despesas.Ver', [
            'Despesas' => $Despesas,
            'Empresas'
            =>  $ObterDados->ListaDeEmpresas(),
            'Fornecedor' =>  $ObterDados->ListaDeFornecedores(),
            'Categoria' => $Cat,
            'Sub' => $SubCategoria,
        ]);
    }

    public function Listartodos(Request $request)
    {

        $Despesas = DB::table('despesas')->join(
            'empresas',
            'despesas.CodEmpresa',
            '=',
            'empresas.id'
        )->select('despesas.*', 'empresas.Razao as Razaoe', 'despesas.CodFornecedor as Razaof')->wherebetween('Datarecebimento', [$request->DataIni, $request->DataFim])->paginate(20);

        return view('/Despesas.Todos', ['Despesas' => $Despesas]);
    }

    public function update(Request $request, $id)
    {
        $Despesas = Despesas::findOrFail($id);
        $Forn =  explode("-",$request->CodFornecedor);
        if ($this->Verificar($request)) {
            $Despesas->Update([
                'Barras' => $request->Barras,
                'Descricao' => $request->Descricao,
                'CodFornecedor' => isset($request->CodFornecedor) ? $Forn[0] : 0,
                'Total' => Str_replace(",", ".", $request->Total),
                'TotalDesconto' => isset($request->TotalDesconto) ? Str_replace(",", ".", $request->TotalDesconto) : 0,
                'TotalAcréscimo' => isset($request->TotalAcrescimo) ? Str_replace(",", ".", $request->TotalAcrescimo) : 0,
                'Vencimento' => $request->Datarecebimento,
                'CodGrupo' => Str::substr($request->CodGrupo, 0, 1),
                'CodSubGrupo' => Str::substr($request->SubGrupo, 0, 1),
                'Parcelas' => $request->Parcelas,
                'Dataemissao' => $request->Datarecebimento,
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
        $Total = $Despesas->Total;
        $Descricao = $Despesas->Descricao;
        /*
        //Depósito em Conta
        $Banco = new ContasBancariasController();
        if ($Banco->Deposito($Despesas->conta, $Despesas->total));
        //Inserir no Extrato
        $Extrato = new ExtratoController();
        $Extrato->InserirNoExtrato($Total, 'C', $Despesas->Conta, 'Despesa_Cancelada', $Despesas->CodEmpresa, $Descricao);
        */
        $Despesas->delete();

        return "<script>alert('Deletado com sucesso.');location = '/Despesas/Todos';</script>";
    }

    public function FechamentoDespesa(Request $request)
    {
        $Despesa = Despesas::select(
            'despesas.id',
            'Barras',
            'Descricao',
            'CodFornecedor',
            'Total',
            'TotalDesconto',
            'TotalAcréscimo',
            'TotaldosProdutos',
            'Vencimento',
            'CodGrupo',
            'CodSubGrupo',
            'Parcelas',
            'Dataemissao',
            'Datarecebimento',
            'Boleta',
            'NotaFiscal',
            'Serie',
            'CodEmpresa',
            'empresas.Razao as Razaoe',
            'fornecedors.Razao as Razaof'
        )->join(
            'empresas',
            'despesas.CodEmpresa',
            '=',
            'empresas.id'
        )->join(
            'fornecedors',
            'despesas.CodFornecedor',
            '=',
            'fornecedors.id'

        )->whereBetween('datarecebimento', [$request->DataIni, $request->DataFim])->where('CodEmpresa', $request->Empresa)->get();
        return response()->json($Despesa, 200);
    }
    public function FechamentoDespesaTodos(Request $request)
    {
        $Despesa = Despesas::select(
            'despesas.id',
            'Barras',
            'Descricao',
            'CodFornecedor',
            'Total',
            'TotalDesconto',
            'TotalAcréscimo',
            'TotaldosProdutos',
            'Vencimento',
            'CodGrupo',
            'CodSubGrupo',
            'Parcelas',
            'Dataemissao',
            'Datarecebimento',
            'Boleta',
            'NotaFiscal',
            'Serie',
            'CodEmpresa',
            'empresas.Razao as Razaoe',
            'fornecedors.Razao as Razaof'
        )->join(
            'empresas',
            'despesas.CodEmpresa',
            '=',
            'empresas.id'
        )->join(
            'fornecedors',
            'despesas.CodFornecedor',
            '=',
            'fornecedors.id'

        )->whereBetween('datarecebimento', [$request->DataIni, $request->DataFim])->get();
        return response()->json($Despesa, 200);
    }
    public function Detalhado(Request $request)
    {
        $Despesa = Despesas::where('CodGrupo', $request->CodGrupo)->where('CodEmpresa', $request->CodEmpresa)->wherebetween('datarecebimento', [$request->Dataini, $request->DataFim])->get();
        return response()->json($Despesa, 200);
    }
    public function Relatorio()
    {
        $Utilidades = new ObterDados();
        return view('Despesas.Relatorio', ['Empresas' => $Utilidades->ListaDeEmpresas()]);
    }
    public function PorCategoria(Request $request)
    {
        $Despesa = Despesas::where('CodGrupo', $request->CodGrupo)->wherebetween('datarecebimento', [$request->Dataini, $request->DataFim])->get();
        return response()->json($Despesa, 200);
    }

    public function DespesaPorCategoria()
    {
        $Utilidades = new ObterDados();
        return view('Despesas.DespesaPorCategoria', ['Empresas' => $Utilidades->ListaDeEmpresas()]);
    }
    public function FechamentoDespesaCat(Request $request)
    {
        $Despesa = DB::table('despesas')->select('despesas.Descricao', 'despesas.Datarecebimento', 'despesas.Total', 'fornecedors.Nome')->join('fornecedors', 'fornecedors.id', '=', 'despesas.CodFornecedor')->whereBetween('datarecebimento', [$request->DataIni, $request->DataFim])->where('CodEmpresa', $request->Empresa)->where('CodGrupo', $request->CodGrupo)->get();
        return response()->json($Despesa, 200);
    }
    public function ListarPorData(Request $request)
    {
        $Despesas = DB::table('despesas')->select(DB::raw('SUM(despesas.Total) AS Total'), 'categorias.descricao', 'fornecedors.nome')->join('fornecedors','fornecedors.id','=','despesas.CodFornecedor')
            ->join('categorias', 'categorias.id', '=', 'despesas.CodGrupo')->where('despesas.CodEmpresa', '=', Str::substr($request->Empresa, 0, 1))->whereBetween('DataRecebimento', [$request->DataIni, $request->DataFim])->groupBy('categorias.descricao','fornecedors.nome')->get();
        return response()->json($Despesas);
    }
}
