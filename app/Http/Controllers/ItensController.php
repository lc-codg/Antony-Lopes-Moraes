<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Itens;
use Illuminate\Support\Facades\DB;

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
    public function ListarTodos()
    {
        $itens = DB::table('itens')->paginate(20);
        return view('Itens.Todos', ['itens' => $itens]);
    }
}
