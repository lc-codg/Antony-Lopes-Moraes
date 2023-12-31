<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Compras;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Classes\ObterDados;
use App\Http\Controllers\ItensCompraController;
use Illuminate\Support\Str;
use Exception;
use App\Http\Controllers\ArrecadacaoController;
use App\Models\Empresa;
use PhpParser\Node\Expr\Empty_;

class ComprasController extends Controller
{
    public function Imprimir($id, $tipo)
    {
        $comprass = DB::table('compras')->select(
            'compras.Id',
            'fornecedors.Nome as Nomecliente',
            'fornecedors.Razao as RazaoCliente',
            'empresas.RAZAO as RazaoEmpresa',
            'compras.Total',
            'compras.DtPedido',
            'fornecedors.endereco',
            'fornecedors.bairro',
            'fornecedors.cnpj',
            'fornecedors.cep',
            'fornecedors.telefone',
            'fornecedors.ie',
            'fornecedors.numero'
        )->join('fornecedors', 'compras.CodigoDocliente', '=', 'fornecedors.id')->join('empresas', 'compras.CodEmpresa', '=', 'empresas.Id')->where('compras.id', '=', $id)->get();

        $itens = new ItensCompraController();
        $Produtos = $itens->LocalizaItens($id);

        return view('Pedidos.ImpressaoA4', ['Itens' => $Produtos, 'Venda' => $comprass, 'Tipo' => $tipo, 'Estado' => 'F']);
    }
    public function Show()
    {
        if (session()->has('CartCompras'))
            $Carrinho = (Session::get('CartCompras'));
        else
            $Carrinho = session('CartCompras', []);

        if (session()->has('Fornecedor')) {
            $Fornecedor = Session::get('Fornecedor');
        } else {
            $Fornecedor = session('Fornecedor', ['Razao' => '', 'Cnpj' => '', 'Id' => '']);
        }
        $ObterDados = new ObterDados();
        $Empresa = $ObterDados->ListaDeEmpresas();

        return view('Compras.Carrinho', ['CartCompras' => $Carrinho, 'Fornecedor' => $Fornecedor, 'Empresa' => $Empresa]);
    }
    public function LimparCarrinho()
    {
        Session::forget('CartCompras');
        Session::forget('Fornecedor');
        return "<script>location='/Compras/Carrinho';</script>";
    }
    public function Delete($id)
    {
        $Compras = Compras::findOrfail($id);
        $Compras->delete();
        return "<script>alert('Deletado com sucesso!');location='/Compras/Todos';</script>";
    }

    public function ListarPorId($Id)
    {
        $Pedido = Compras::findOrfail($Id);
        return view('Compras.Ver', ['Compras' => $Pedido]);
    }

    public function ListarPorData(Request $request)
    {
        $Compras = DB::table('compras')->select(
            DB::raw('SUM(compras.Total) AS Total'),
            'compras.Tipo'
        )
            ->where('compras.CodEmpresa', '=', Str::Substr($request->Empresa, 0, 1))->whereBetween('DtPedido', [$request->DataIni, $request->DataFim])->groupBy('compras.Tipo')->get();
        return response()->json($Compras);
    }
public function ListarComrpasAVista(){

}
    public function ListarTodos(Request $request)
    {
        $Dados = new ObterDados;
        $Empresa = $Dados->ListaDeEmpresas();
        $Fornecedor = $Dados->ListaDeFornecedores();

        $Compras = DB::table('compras')->select(
            'compras.id',
            'compras.CodigoDocliente',
            'compras.Total',
            'compras.TotalDesconto',
            'compras.TotalAcréscimo',
            'compras.DtPedido',
            'compras.CodEmpresa',
            'fornecedors.Nome',
            'empresas.Razao',
            'compras.Tipo'

        )->join('fornecedors', 'compras.CodigoDoCliente', '=', 'fornecedors.id')->join('empresas', 'compras.CodEmpresa', '=', 'empresas.id')->where('compras.Codempresa', '=', $request->Empresa)->where('empresas.Razao', 'LIKE', '%' . $request->Nome . '%')->where('fornecedors.Nome', 'LIKE', '%' . $request->Nome . '%')->where('fornecedors.Razao', 'LIKE', '%' . $request->Nome . '%')->whereBetween('DtPedido', array($request->Dataini, $request->Datafim))->paginate(1000);

        return view('Compras.Todos', ['Compras' => $Compras, 'Empresa' => $Empresa, 'Fornecedor' => $Fornecedor]);
    }
    public function VerificaDados($Fornecedor, $Empresa, $Produtos)
    {
        if (empty($Fornecedor['Id'])) {
            echo "<script>alert('Preencha o Fornecedor.'),history.back()</script>";
            exit;
        }
        if (empty($Empresa['Id'])) {

            echo "<script>alert('Preencha o emitente.'),history.back()</script>";
            exit;
        }
        if ($Produtos == 0) {
            echo "<script>alert('Insira produtos ao pedido.'),history.back()</script>";
            exit;
        } else {

            return true;
        }
    }
    public function create(Request $request)
    {
        $Fornecedor = session::get('Fornecedor');
        $Empresa = session::get('Empresa');
        $Itens = new ItensCompraController;
        $Total = 0;

        if ($request->session()->has('CartCompras')) {

            $Produtos = session::get('CartCompras');
            foreach ($Produtos as $row) {
                $Total += ($row['Valor'] *  $row['Quantidade']);
            }
        } else {
            $Produtos = 0;
        }

        if ($this->VerificaDados($Fornecedor, $Empresa, $Produtos)) {
            $Compras = Compras::create([
                'CodigoDoCliente' => $Fornecedor['Id'],
                'Total' => $Total,
                'TotaldosProdutos' => $Total,
                'DtPedido' => date('Y-m-d'),
                'Dataemissao' => date('Y-m-d'),
                'DataSaida' => date('Y-m-d'),
                'Finalidade' => 'Venda',
                'CodEmpresa' => $Empresa['Id'],
                'Tipo' => isset($request->Tipo) ? 'Prazo' : 'Vista',
            ]);

            $Id = $Compras->id;

            if ($Itens->Salvar($Produtos, $Id)) {
                $Tipo = 'Novo';
                echo "<script>
                alert('Nota Salva com sucesso.'),
               </script>";
                $this->LimparCarrinho();
                return $this->Imprimir($Id, $Tipo);
            } else {
                return "<script>alert(Erro ao Gravar.)</script>";
            }
        }
    }
    public function SalvarComprasSimples($Dados)
    {
        $Forn =  explode("-",$Dados->CodFornecedor);
        $Empresa = Empty($Dados->Recebe)?Str::substr($Dados->CodEmpresa, 0, 1):$Forn[0];
        $Cliente = Empty($Dados->Recebe)?$Forn[0]:Str::substr($Dados->CodEmpresa, 0, 1);
        Compras::create([
            'CodigoDoCliente' => $Cliente,
            'Total' => $Dados->Total,
            'TotaldosProdutos' => $Dados->Total,
            'DtPedido' => $Dados->Datarecebimento,
            'Dataemissao' => $Dados->Datarecebimento,
            'DataSaida' => $Dados->Datarecebimento,
            'Finalidade' => 'Venda',
            'Natureza'=> $Dados->Descricao,
            'CodEmpresa' => $Empresa,
            'Tipo' => $Dados->TipoDeCompra,
            'TotalDesconto' => isset($Dados->TotalDesconto) ? Str_replace(",", ".", $Dados->TotalDesconto) : 10,
            'TotalAcréscimo' => isset($Dados->TotalAcrescimo) ? Str_replace(",", ".", $Dados->TotalAcrescimo) : 0,

        ]);
        if ($Dados->TipoDeCompra =='vista') {
            $Arrecadacao = new ArrecadacaoController();
            $Arrecadacao->CompraAVista($Dados->CodEmpresa,$Dados->Total,1,$Dados->Datarecebimento);

        }
    }

    public function Fechamento(Request $request)
    {
        $ContasaPagar = DB::table('compras')->join(
            'empresas',
            'compras.CodEmpresa',
            '=',
            'empresas.id'
        )->join('fornecedors', 'compras.CodigoDoCliente', '=', 'fornecedors.id')->select('compras.*', 'empresas.Razao as Razaoe', 'fornecedors.Razao as Razaof')
            ->where('compras.CodEmpresa', '=', $request->Empresa)->Where('compras.tipo', '=', 'vista')
            ->whereBetween('compras.DtPedido', [$request->DataIni, $request->DataFim])->get();

        return response()->json($ContasaPagar);
    }
    public function FechamentoTodos(Request $request)
    {
        $ContasaPagar = DB::table('compras')->join(
            'empresas',
            'cempresa.id',
            '=',
            'compras.CodEmpresa'
        )->join('clientes', 'clientes.id','=','compras.CodigoDoCliente')->select('compras.*', 'empresas.Razao as Razaoe', 'clientes.Nome as Razaof')
           ->Where('compras.tipo', '=', 'vista')
            ->whereBetween('compras.DtPedido', [$request->DataIni, $request->DataFim])->get();

        return response()->json($ContasaPagar);
    }
}
