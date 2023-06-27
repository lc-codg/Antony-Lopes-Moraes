<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Compras;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Classes\ObterDados;
use App\Http\Controllers\ItensCompraController;
use Illuminate\Support\Str;
use Exception;

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
        Session::flush('CartComprasCompras');
        Session::flush('Fornecedor');
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
            'fornecedors.Nome'
        )->join('fornecedors', 'fornecedors.id', '=', 'compras.CodigoDoCliente')
            ->whereBetween('DtPedido', array($request->Dataini, $request->Datafim))->where('compras.CodEmpresa','=',Str::Substr($request->CodEmpresa,0,1))->
            groupBy('fornecedors.Nome')->get();
            return $Compras;
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

        )->join('fornecedors', 'compras.CodigoDoCliente', '=', 'fornecedors.id')->join('empresas', 'compras.CodEmpresa', '=', 'empresas.id')->where('compras.Codempresa', '=', $request->Empresa)->where('empresas.Razao', 'LIKE', '%' . $request->Nome . '%')->where('fornecedors.Nome', 'LIKE', '%' . $request->Nome . '%')->where('fornecedors.Razao', 'LIKE', '%' . $request->Nome . '%')->whereBetween('DtPedido', array($request->Dataini, $request->Datafim))->paginate(20);

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
}
