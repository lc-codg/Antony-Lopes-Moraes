<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class ProdutosController extends Controller
{
    public function Busca($barras)
    {
        $Produtos = DB::table('produtos')->get()->Limit(25);
        return response()->json($Produtos);
    }
    public function LocalizarPorDescricao(Request $request)
    {
        $Produtos = DB::table('produtos')->select('Id', 'Descricao', 'Barras', 'ValorUnitario')->where('Descricao', 'LIKE', '%' . $request->Descricao . '%')->orwhere('Barras', 'LIKE', '%' . $request->Descricao . '%')->get();
        return response()->json(array('Produtos' => $Produtos));
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
        return view('Produtos.Ver', ['produto' => $produto]);
    }
    public function ListarTodos(Request $request)
    {
        $produtos = DB::table('produtos')->where('Barras', 'LIKE', '%' . $request->Nome . '%')->orwhere('Descricao', 'LIKE', '%' . $request->Nome . '%')->paginate(10);
        return view('Produtos.Todos', ['produtos' => $produtos]);
    }
    public function Inserir(Request $request)
    {
        $Produtos = Produto::findOrfail($request->id);

        Session::push('Cart', [
            'Barras' => $Produtos->Barras,
            'Descricao' => $Produtos->Descricao,
            'Valor' => $Produtos->ValorUnitario,
            'Quantidade' => $request->Quantidade,
        ]);
        $Carrinho = (Session::get('Cart'));
        return ($Carrinho);
    }

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
                'ValorUnitario' => Str::replace(",", ".", $request->ValorUnitario),
                'Quantidade' =>  Str::replace(",", ".", $request->Quantidade),
                'ValorPrazo' => Str::replace(",", ".", $request->prazo),
                'ValorPromocao' => $request->promocao,
                'Custo' => Str::replace(",", ".", $request->custo),
                'Icms' => isset($request->icms) ? Str::replace(",", ".", $request->icms) : 0,
                'Origem' => $request->origem,
                'Cst' => $request->cst,
                'Ncm' => $request->ncm,
                'Cest' => $request->cest,
                'Cfop' => $request->cfop,
                'CodPis' => $request->codpis,
                'CodCofins' => $request->codcofins,
                'CodIpi' => $request->codipi,
                'BasePis' => isset($request->basepis) ? Str::replace(",", ".", $request->basepis) : 0,
                'Basecofins' => isset($request->basecofins) ? Str::replace(",", ".", $request->basecofins) : 0,
                'BaseIpi' => isset($request->baseipi) ? Str::replace(",", ".", $request->baseipi) : 0,
                'Peso' =>  Str::replace(",", ".", $request->peso),
                'Reducao' => isset($request->reducao) ? Str::replace(",", ".", $request->reducao) : 0,
                'Mva' => isset($request->mva) ? Str::replace(",", ".", $request->mva) : 0,
                'BaseIcms' => isset($request->baseicms) ? Str::replace(",", ".", $request->base) : 0,
                'BaseSt' => isset($request->basest) ? Str::replace(",", ".", $request->basest) : 0,
                'St' => isset($request->st) ? Str::replace(",", ".", $request->st) : 0,
                'AlPis' => isset($request->alpis) ? Str::replace(",", ".", $request->alpis) : 0,
                'AlCofins' => isset($request->alcofins) ? Str::replace(",", ".", $request->alcofins) : 0,
                'Secao' => $request->secao,
                'Tamanho' => $request->tamanho,
                'Cor' => $request->cor,
                'Referencia' => $request->referencia,
                'Fator' => $request->fator,
                'Modelo' => $request->modelo,
                'Serie' => $request->serie,
                'Suframa' => $request->suframa,
                'Validade' => $request->validade,
                'Lote' => $request->lote,
                'SubSecao' => $request->subsecao,
                'Beneficio' => $request->beneficio,
                'Alipi' => isset($request->alipi) ? Str::replace(",", ".", $request->alipi) : 0,
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
                'ValorUnitario' => Str::replace(",", ".", $request->ValorUnitario),
                'Quantidade' =>  Str::replace(",", ".", $request->Quantidade),
                'ValorPrazo' => Str::replace(",", ".", $request->prazo),
                'ValorPromocao' => $request->promocao,
                'Custo' => Str::replace(",", ".", $request->custo),
                'Icms' => isset($request->icms) ? Str::replace(",", ".", $request->icms) : 0,
                'Origem' => $request->origem,
                'Cst' => $request->cst,
                'Ncm' => $request->ncm,
                'Cest' => $request->cest,
                'Cfop' => $request->cfop,
                'CodPis' => $request->codpis,
                'CodCofins' => $request->codcofins,
                'CodIpi' => $request->codipi,
                'BasePis' => isset($request->basepis) ? Str::replace(",", ".", $request->basepis) : 0,
                'Basecofins' => isset($request->basecofins) ? Str::replace(",", ".", $request->basecofins) : 0,
                'BaseIpi' => isset($request->baseipi) ? Str::replace(",", ".", $request->baseipi) : 0,
                'Peso' =>  Str::replace(",", ".", $request->peso),
                'Reducao' => isset($request->reducao) ? Str::replace(",", ".", $request->reducao) : 0,
                'Mva' => isset($request->mva) ? Str::replace(",", ".", $request->mva) : 0,
                'BaseIcms' => isset($request->baseicms) ? Str::replace(",", ".", $request->base) : 0,
                'BaseSt' => isset($request->basest) ? Str::replace(",", ".", $request->basest) : 0,
                'St' => isset($request->st) ? Str::replace(",", ".", $request->st) : 0,
                'AlPis' => isset($request->alpis) ? Str::replace(",", ".", $request->alpis) : 0,
                'AlCofins' => isset($request->alcofins) ? Str::replace(",", ".", $request->alcofins) : 0,
                'Secao' => $request->secao,
                'Tamanho' => $request->tamanho,
                'Cor' => $request->cor,
                'Referencia' => $request->referencia,
                'Fator' => $request->fator,
                'Modelo' => $request->modelo,
                'Serie' => $request->serie,
                'Suframa' => $request->suframa,
                'Validade' => $request->validade,
                'Lote' => $request->lote,
                'SubSecao' => $request->subsecao,
                'Beneficio' => $request->beneficio,
                'Alipi' => isset($request->alipi) ? Str::replace(",", ".", $request->alipi) : 0,
            ]);

            return "<script>alert('Salvo com sucesso!');location='/Produtos/Todos';</script>";
        }
    }
}
