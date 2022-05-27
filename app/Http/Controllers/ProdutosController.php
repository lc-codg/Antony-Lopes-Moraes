<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Resources\views\Produtos\Produtos;
use App\Models\Produto;

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
            ]);

            return "<script>alert('Salvo com sucesso!');location='/Produtos/Novo';</script>";
        }
    }
    public function Editar(Request $request)
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


            Produto::update([
                'id'=> $request->Id,
                'Descricao' => $request->Descricao,
                'Barras' => $request->Barras,
                'ValorUnitario' => $request->ValorUnitario,
                'Quantidade' => $request->Quantidade,
            ]);

            return "<script>alert('Salvo com sucesso!');location='/Produtos/Novo';</script>";
        }
    }
}
