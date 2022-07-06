<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ItensCompras;
use GuzzleHttp\Promise\Create;
use Illuminate\Support\Facades\DB;
use app\Console\Kernel;
use App\Exceptions\InvalidOrderException;
use Exception;

class ItensCompraController extends Controller
{
    public function Delete($id)
    {
        $Iten = ItensCompras::findOrfail($id);
        $Iten->delete();
        return "<script>alert('Deletado com sucesso!');location='/ItensCompras/Todos';</script>";
    }

    public function ListarPorId($id)
    {
        $Iten = ItensCompras::findOrfail($id);
        return view('ItensCompras.Todos', ['Itens' => $Iten]);
    }
    public function ListarTodos($id)
    {
        $itens = DB::table('itens_compras')->where('NumeroDoPedido', '=', $id)->paginate(20);
        return view('ItensCompras.Todos', ['itens' => $itens]);
    }
    public function Salvar($Produtos, $Id)
    {
        foreach ($Produtos as $row) {
            ItensCompras::Create(
                [
                    'Descricao' => $row['Descricao'],
                    'Barras' => $row['Barras'],
                    'ValorUnitario' => $row['Valor'],
                    'Quantidade' => $row['Quantidade'],
                    'Subtotal' => ($row['Valor'] * $row['Quantidade']),
                    'NumeroDoPedido' => $Id,

                ]
            );
        }
        try {
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
}
