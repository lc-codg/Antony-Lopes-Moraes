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
                'ValorUnitario' =>str_replace(",",".", $request-> ValorUnitario),
                'Quantidade' =>  str_replace(",",".", $request-> quantidade),
                'ValorPrazo' => str_replace(",",".", $request-> cprazo),
                'ValorPromocao' => $request->promocao ,
                'Custo' => str_replace(",",".", $request-> custo),
                'Icms' => $request-> str_replace(",",".", $request-> icms),
                'Origem' => $request->origem ,
                'Cst' => $request->cst ,
                'Ncm' => $request->ncm ,
                'Cest' => $request->cest ,
                'Cfop' => $request->cfop ,
                'CodPis' => $request->codpis ,
                'CodCofins' => $request-> codcofins,
                'CodIpi' => $request-> codipi,
                'BasePis' => $request->str_replace(",",".", $request-> basepis),
                'Basecofins' =>str_replace(",",".", $request-> basecofins),
                'BaseIpi' => str_replace(",",".", $request-> baseipi),
                'Peso' =>  str_replace(",",".", $request-> peso),
                'Reducao' => str_replace(",",".", $request-> reducao),
                'Mva' =>str_replace(",",".", $request-> mva),
                'BaseIcms' => str_replace(",",".", $request-> base),
                'BaseSt' =>str_replace(",",".", $request-> basest),
                'St' => str_replace(",",".", $request-> st),
                'AlPis' => str_replace(",",".", $request-> alpis),
                'AlCofins' => str_replace(",",".", $request-> alcofins),
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
                'Alipi'=> str_replace(",",".", $request-> alipi),
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
                'ValorUnitario' =>str_replace(",",".", $request-> ValorUnitario),
                'Quantidade' =>  str_replace(",",".", $request-> quantidade),
                'ValorPrazo' => str_replace(",",".", $request-> cprazo),
                'ValorPromocao' => $request->promocao ,
                'Custo' => str_replace(",",".", $request-> custo),
                'Icms' => $request-> str_replace(",",".", $request-> icms),
                'Origem' => $request->origem ,
                'Cst' => $request->cst ,
                'Ncm' => $request->ncm ,
                'Cest' => $request->cest ,
                'Cfop' => $request->cfop ,
                'CodPis' => $request->codpis ,
                'CodCofins' => $request-> codcofins,
                'CodIpi' => $request-> codipi,
                'BasePis' => $request->str_replace(",",".", $request-> basepis),
                'Basecofins' =>str_replace(",",".", $request-> basecofins),
                'BaseIpi' => str_replace(",",".", $request-> baseipi),
                'Peso' =>  str_replace(",",".", $request-> peso),
                'Reducao' => str_replace(",",".", $request-> reducao),
                'Mva' =>str_replace(",",".", $request-> mva),
                'BaseIcms' => str_replace(",",".", $request-> base),
                'BaseSt' =>str_replace(",",".", $request-> basest),
                'St' => str_replace(",",".", $request-> st),
                'AlPis' => str_replace(",",".", $request-> alpis),
                'AlCofins' => str_replace(",",".", $request-> alcofins),
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
                'Alipi'=> str_replace(",",".", $request-> alipi),
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
