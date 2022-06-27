<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Pedidos;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Classes\ObterDados;


class PedidoController extends Controller
{
    public function Show()
    {
        if (session()->has('Cart'))
            $Carrinho = (Session::get('Cart'));
        else
            $Carrinho = session('Cart', []);

        if (session()->has('Cliente')) {
            $Cliente = Session::get('Cliente');
        } else {
            $Cliente = session('Cliente', ['Razao' => '', 'Cnpj' => '', 'Id' => '']);
        }
        $ObterDados = new ObterDados();
        $Empresa = $ObterDados->ListaDeEmpresas();

        return view('Pedidos.Carrinho', ['Cart' => $Carrinho, 'Cliente' => $Cliente, 'Empresa' => $Empresa]);
    }
    public function LimparCarrinho()
    {
        Session::flush('Cart');
        Session::flush('Cliente');
        return "<script>location='/Pedidos/Carrinho';</script>";
    }
    public function Delete($id)
    {
        $Pedidos = Pedidos::findOrfail($id);
        $Pedidos->delete();
        return "<script>alert('Deletado com sucesso!');location='/Pedidos/Todos';</script>";
    }

    public function ListarPorId($Id)
    {
        $Pedido = Pedidos::findOrfail($Id);
        return view('Pedidos.Ver', ['Pedidos' => $Pedido]);
    }
    public function ListarTodos()
    {
        $Pedidos = DB::table('pedidos')->select(
            'pedidos.id',
            'pedidos.CodigoDoCliente',
            'pedidos.Total',
            'pedidos.TotalDesconto',
            'pedidos.TotalAcréscimo',
            'pedidos.DtPedido',
            'clientes.Nome'
        )->join('clientes', 'pedidos.CodigoDoCliente', '=', 'clientes.id')
            ->paginate(20);

        return view('Pedidos.Todos', ['Pedidos' => $Pedidos]);
    }
    public function VerificaDados(Request $request)
    {
        empty(!$request->CodigoCliente)? exit:"<scrip>Selecione o Cliente</scrip>";
        empty(!$request->Total)?exit : "<scrip>Insira os produtos.</scrip>";
        empty(!$request->CodEmpresa)?exit:"<scrip>Selecione a Empresa emitente.</scrip>";
        return True;
    }
    public function create(Request $request)
    {
        $Cliente = session::get('Cliente');
        $Empresa = session::get('Empresa');
        $Produtos = session::get('Cart');
        $Total = 0;



        foreach ($Produtos as $row){
            $Total += ($row['Valor'] *  $row['Quantidade']);
        }

        Pedidos::create([
            'CodigoDoCliente'=>$Cliente['Id'],
            'Total'=>$Total,
            'TotaldosProdutos'=>$Total,
            'DtPedido' => date('Y-m-d'),
            'Dataemissao'=>date('Y-m-d'),
            'DataSaida'=>date('Y-m-d'),
            'Finalidade'=>'Venda',
            'CodEmpresa'=>$Empresa['Id']
        ]);
        return "<script>alert('Pedido Salvo com sucesso.'),location='LimparCarrinho'</script>";

    }
}
