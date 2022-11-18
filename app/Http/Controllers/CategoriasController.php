<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorias;

class CategoriasController extends Controller
{
    public function Salvar(request $request)
    {
        Categorias::create(
            [
                'descricao' => $request->descricao,
                'tipo' => $request->tipo,


            ]
        );
    }
    public function Validar($Dados)
    {

    }
}
