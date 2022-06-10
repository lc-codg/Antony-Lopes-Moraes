<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Arr;




class ProdutosController extends Controller
{
    public function Cadastrar()
    {
        return view('Produtos.produto');
    }

    public function Salvar(Request $request)
    {
        if (empty($request->Descricao)) {
            echo "<script>
          alert('Digite o nome do produto.');
          javascript:history.back();
          </script>";
            exit;
        }
        if (empty($request->Barras)) {
            echo "<script>
            alert('Digite o Código de barras.');
            javascript:history.back();
            </script>";
            exit;
        }
        if (empty($request->ValorUnitario)) {
            echo "<script>
            alert('Digite o Valor unitário.');
            javascript:history.back();
            </script>";
            exit;
        }
        if (empty($request->Quantidade)) {
            echo "<script>
            alert('Digite a Quantidade.');
            javascript:history.back();
            </script>";
            exit;
        } else {


            Produto::create([
                'Descricao' => $request->Descricao,
                'Barras' => $request->Barras,
                'ValorUnitario' => $request->ValorUnitario,
                'Quantidade' => $request->Quantidade,
                'ValorPrazo' => $request->prazo ,
                'ValorPromocao' => $request->promocao ,
                'Custo' => $request-> custo,
                'Icms' => $request-> icms,
                'Origem' => $request->origem ,
                'Cst' => $request->cst ,
                'Ncm' => $request->ncm ,
                'Cest' => $request->cest ,
                'Cfop' => $request->cfop ,
                'CodPis' => $request->codpis ,
                'CodCofins' => $request-> codcofins,
                'CodIpi' => $request-> codipi,
                'BasePis' => $request->basepis ,
                'Basecofins' => $request->basecofins ,
                'BaseIpi' => $request->baseipi ,
                'Peso' => $request-> peso,
                'Reducao' => $request-> reducao,
                'Mva' => $request->mva ,
                'BaseIcms' => $request->base ,
                'BaseSt' => $request->basest ,
                'St' => $request->st ,
                'AlPis' => $request->alpis ,
                'AlCofins' => $request->alcofins ,
                'Secao' => $request->secao ,
                'Tamanho' => $request->tamanho ,
                'Cor' => $request->cor ,
                'Referencia' => $request->referencia ,
                'Fator' => $request->fator ,
                'Modelo' => $request->modelo ,
                'Serie' => $request->serie ,
                'Suframa' => $request->suframa ,
                'Validade' => $request->validade ,
                'Lote' => $request->lote ,
                'SubSecao' => $request->subsecao ,
                'Beneficio'=> $request->beneficio,
                'Alipi'=> $request->alipi
            ]);

            return "<script>alert('Salvo com sucesso!');location='/Produtos/Novo';</script>";
        }
    }
    public function Editar(Request $request, $Id)
    {
        $produto = Produto::findOrFail($Id);

        if (empty($request->Descricao)) {
            echo "<script>
          alert('Digite o nome do produto.');
          javascript:history.back();
          </script>";
            exit;
        }
        if (empty($request->Barras)) {
            echo "<script>
            alert('Digite o Código de barras.');
            javascript:history.back();
            </script>";
            exit;
        }
        if (empty($request->ValorUnitario)) {
            echo "<script>
            alert('Digite o Valor unitário.');
            javascript:history.back();
            </script>";
            exit;
        }
        if (empty($request->Quantidade)) {
            echo "<script>
            alert('Digite a Quantidade.');
            javascript:history.back();
            </script>";
            exit;
        } else {


            $produto->update([
                'Descricao' => $request->Descricao,
                'Barras' => $request->Barras,
                'ValorUnitario' => $request->ValorUnitario,
                'Quantidade' => $request->Quantidade,
                'ValorPrazo' => $request->prazo ,
                'ValorPromocao' => $request->promocao ,
                'Custo' => $request-> custo,
                'Icms' => $request-> icms,
                'Origem' => $request->origem ,
                'Cst' => $request->cst ,
                'Ncm' => $request->ncm ,
                'Cest' => $request->cest ,
                'Cfop' => $request->cfop ,
                'CodPis' => $request->codpis ,
                'CodCofins' => $request-> codcofins,
                'CodIpi' => $request-> codipi,
                'BasePis' => $request->basepis ,
                'Basecofins' => $request->basecofins ,
                'BaseIpi' => $request->baseipi ,
                'Peso' => $request-> peso,
                'Reducao' => $request-> reducao,
                'Mva' => $request->mva ,
                'BaseIcms' => $request->base ,
                'BaseSt' => $request->basest ,
                'St' => $request->st ,
                'AlPis' => $request->alpis ,
                'AlCofins' => $request->alcofins ,
                'Secao' => $request->secao ,
                'Tamanho' => $request->tamanho ,
                'Cor' => $request->cor ,
                'Referencia' => $request->referencia ,
                'Fator' => $request->fator ,
                'Modelo' => $request->modelo ,
                'Serie' => $request->serie ,
                'Suframa' => $request->suframa ,
                'Validade' => $request->validade ,
                'Lote' => $request->lote ,
                'SubSecao' => $request->subsecao ,
                'Beneficio'=> $request->beneficio,
                'Alipi'=> $request->alipi
            ]);

            return "<script>alert('Salvo com sucesso!');location='/Produtos/Todos';</script>";
        }
    }
    public function Delete($id)
    {
        $produto = Produto::findOrfail($id);
        $produto->delete();
        return "<script>alert('Deletado com sucesso!');location='/Produtos/Todos';</script>";
    }

    public function ListarPorId($id)
    {
        $produto = Produto::findOrfail($id);
        return view('Produtos.Ver',['produto' => $produto]);
    }
    public function ListarTodos()
    {
        $produtos = DB::table('produtos')->paginate(10);
        return view('Produtos.Todos' , ['produtos' => $produtos]);
    }
    public function Inserir(Request $Request)
    {
        $Carrinho = collect([
            'Barras' => $Request->Barras,
            'Descricao' => $Request->Descricao,
            'ValorUnitario' => $Request->ValorUnitario,
            'Quantidade' => $Request->Quantidade
        ]);
        Session::push('Carrinho' , $Carrinho);
        return "<script>location='/Pedidos/Carrinho';</script>";
    }
}
