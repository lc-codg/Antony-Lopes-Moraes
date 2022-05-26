<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Resources\views\Produtos\Produtos;

class ProdutosController extends Controller
{
    public function Cadastrar(){
        return view('Produtos.produto');
    }
    }

