<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Compras;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Classes\ObterDados;
use App\Http\Controllers\ItensController;
use Exception;

class ComprasController extends Controller
{
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
    public function ListarTodos(Request $request)
    {
        $Dados = new ObterDados;
        $Empresa = $Dados->ListaDeEmpresas();
        $Fornecedor = $Dados->ListaDeFornecedores();

        $Compras = DB::table('Compras')->select(
            'Compras.id',
            'Compras.CodigoDoFornecedor',
            'Compras.Total',
            'Compras.TotalDesconto',
            'Compras.TotalAcréscimo',
            'Compras.DtPedido',
            'Compras.CodEmpresa',
            'Fornecedors.Nome',
            'empresas.Razao',

        )->
        join('Fornecedors', 'Compras.CodigoDoFornecedor', '=', 'Fornecedors.id')->
        join('empresas', 'Compras.CodEmpresa','=','empresas.id')->
        where('empresas.Razao', 'LIKE', '%'.$request->Nome.'%')->
        orwhere('Fornecedors.Nome','LIKE','%'.$request->Nome.'%')->
        orwhere('Fornecedors.Razao','LIKE','%'.$request->Nome.'%')->
        whereBetween('DtPedido',array($request->Dataini,$request->Datafim))->
        paginate(20);

        return view('Compras.Todos', ['Compras' => $Compras,'Empresa'=>$Empresa,'Fornecedor'=>$Fornecedor]);
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
        $Itens = new ItensController;
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
                'CodigoDoFornecedor' => $Fornecedor['Id'],
                'Total' => $Total,
                'TotaldosProdutos' => $Total,
                'DtPedido' => date('Y-m-d'),
                'Dataemissao' => date('Y-m-d'),
                'DataSaida' => date('Y-m-d'),
                'Finalidade' => 'Venda',
                'CodEmpresa' => $Empresa['Id']
            ]);

            $Id = $Compras->id;

            if ($Itens->Salvar($Produtos, $Id)) {
                return "<script>alert('Pedido Salvo com sucesso.'),location='LimparCarrinho'</script>";
            } else {
                return "<script>alert(Erro ao Gravar.)</script>";
            }
        }
    }
}
