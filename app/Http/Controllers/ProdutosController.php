<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Resources\views\Produtos\Produtos;
use App\Models\Produto;

class ProdutosController extends Controller
{
    public function Cadastrar(){
        return view('Produtos.produto');
    }

    public function Salvar(Request $request){
        if (Empty($request->Descricao)?  'Preencha o nome':$Descricao = $request->Descricao);
        if (Empty($request->Barras)?'Preencha o código de barras':$Barras = $request->Barras);
        if (Empty($request->ValorUnitario)?'Preencha o Valor':$Preco = $request->ValorUnitario);
        if(Empty($request->Quantidade)?'Preencha a Quantidade':$Quantidade = $request->Quantidade);

        Produto::create([
          'Descricao'=>$Descricao,
          'Barras'=>$Barras,
          'ValorUnitario'=>$Preco,
          'Quantidade'=>$Quantidade,
        ]);

        return "Produto cadastrado com sucesso";

        
    }
    }

