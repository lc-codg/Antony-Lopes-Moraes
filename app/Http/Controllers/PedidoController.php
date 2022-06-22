<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Pedidos;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class PedidoController extends Controller
{
    public function Show()
    {
        if (session()->has('Cart')){
        $Carrinho = (Session::get('Cart'));
            return view('Pedidos.Carrinho', ['Cart' => ($Carrinho)]);
        }else{
        $Carrinho = session('cart', []);
            return view('Pedidos.Carrinho', ['Cart' => $Carrinho]);
    }
}
    public function LimparCarrinho()
    {
        Session::flush('Cart');
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
}
