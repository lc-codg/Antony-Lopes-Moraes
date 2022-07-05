<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Itens;
use GuzzleHttp\Promise\Create;
use Illuminate\Support\Facades\DB;
use app\Console\Kernel;
use App\Exceptions\InvalidOrderException;
use Exception;

class ItensController extends Controller
{
    public function Delete($id)
    {
        $Iten = Itens::findOrfail($id);
        $Iten->delete();
        return "<script>alert('Deletado com sucesso!');location='/Itens/Todos';</script>";
    }

    public function ListarPorId($id)
    {
        $Iten = Itens::findOrfail($id);
        return view('Itens.Todos', ['Itens' => $Iten]);
    }
    public function ListarTodos($id)
    {
        $itens = DB::table('itens')->where('NumeroDoPedido', '=', $id)->paginate(20);
        return view('Itens.Todos', ['itens' => $itens]);
    }
    public function Salvar($Produtos, $Id)
    {
        foreach ($Produtos as $row) {
            Itens::Create(
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
