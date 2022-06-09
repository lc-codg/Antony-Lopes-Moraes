<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fornecedor;
use Illuminate\Support\Facades\DB;

class FornecedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Cadastrar()
    {
        return view('Fornecedor.Fornecedor');
    }

    public function Salvar(Request $request)
    {
        if (empty($request->Nome)) {
            echo "<script>
          alert('Digite o nome do Fornecedor.');
          javascript:history.back();
          </script>";
            exit;
        }
        if (empty($request->CPF)) {
            echo "<script>
            alert('Digite o CPF.');
            javascript:history.back();
            </script>";
            exit;
        }
      
        if (empty($request->Endereco)) {
            echo "<script>
            alert('Digite o Endereço.');
            javascript:history.back();
            </script>";
            exit;
        }
        if (empty($request->Bairro)) {
            echo "<script>
            alert('Digite ao Bairro.');
            javascript:history.back();
            </script>";
            exit;
        }
        if (empty($request->cep)) {
            echo "<script>
            alert('Digite ao Bairro.');
            javascript:history.back();
            </script>";
            exit;
        }
        if (empty($request->UF)) {
            echo "<script>
            alert('Digite a UF.');
            javascript:history.back();
            </script>";
            exit;
        }
       
        if (empty($request->Numero)) {
            echo "<script>
            alert('Digite o Número.');
            javascript:history.back();
            </script>";
            exit;
        } else {


            Fornecedor::create([
                'Nome' => $request->Nome,
                'Cpf' => $request->CPF,
                'Cnpj' => $request->cnpj,
                'Ie' =>$request->ie,
                'Rg' =>$request->ie,
                'Razao'=>$request->razao,
                'Fantasia'=>$request->fantasia,
                'Email' => $request->Email,
                'Endereco' => $request->Endereco,
                'Bairro' => $request->Bairro,
                'Numero' => $request->Numero,
                'PessoaJuridica' => $request->PessoaJuridica,
                'Cidade' => $request->Cidade,
                'UF'  => $request->UF,
                'Cep' =>$request->cep,
                'Telefone' =>$request->telefone,
                'Contato' =>$request->contato,
                'Prazo' =>$request->prazo,
                'Observacao' =>$request->observacao,
                'Conta' =>$request->conta,
                'Agencia'=>$request->agencia,
                'Tipo'=>$request->tipo,
                'CodigoVendedor'=>$request->codigovendedor,
                'Limite'=>$request->limite,
                'Exterior'=>$request->exterior,
                'Juridico'=>$request->juridico
            ]);

            return "<script>alert('Salvo com sucesso!');location='/Fornecedor/Novo';</script>";
        }
    }
    public function Editar(Request $request, $Id)
    {
        $cliente = Fornecedor::findOrFail($Id);

        if (empty($request->Nome)) {
            echo "<script>
          alert('Digite o nome do cliente.');
          javascript:history.back();
          </script>";
            exit;
        }
        if (empty($request->CPF)) {
            echo "<script>
            alert('Digite o CPF.');
            javascript:history.back();
            </script>";
            exit;
        }
        if (empty($request->RG)) {
            echo "<script>
            alert('Digite o RG.');
            javascript:history.back();
            </script>";
            exit;
        }
        if (empty($request->Endereco)) {
            echo "<script>
            alert('Digite o Endereço.');
            javascript:history.back();
            </script>";
            exit;
        }
        if (empty($request->Bairro)) {
            echo "<script>
            alert('Digite ao Bairro.');
            javascript:history.back();
            </script>";
            exit;
        }
        if (empty($request->Numero)) {
            echo "<script>
            alert('Digite o Número.');
            javascript:history.back();
            </script>";
            exit;
        } else {


            $cliente->update([
                'Nome' => $request->Nome,
                'Cpf' => $request->CPF,
                'Rg' => $request->RG,
                'Cnpj' => $request->CNPJ,
                'Ie' =>$request->Ie,
                'Razao'=>$request->razao,
                'Fantasia'=>$request->fantasia,
                'Email' => $request->Email,
                'Endereco' => $request->Endereco,
                'Bairro' => $request->Bairro,
                'Numero' => $request->Numero,
                'PessoaJuridica' => $request->PessoaJuridica,
                'Cidade' => $request->Cidade,
                'UF'  => $request->UF,
                'Cep' =>$request->cep,
                'Telefone' =>$request->telefone,
                'Contato' =>$request->contato,
                'Prazo' =>$request->prazo,
                'Observacao' =>$request->observacao,
                'Conta' =>$request->conta,
                'Agencia'=>$request->agencia,
                'Tipo'=>$request->tipo,
                'CodigoVendedor'=>$request->codigovendedor,
                'Limite'=>$request->limite,
                'Exterior'=>$request->exterior,
                'Juridico'=>$request->juridico
            ]);

            return "<script>alert('Salvo com sucesso!');location='/Fornecedor/Todos';</script>";
        }
    }

    public function Delete($id)
    {
        $cliente = Fornecedor::findOrfail($id);
        $cliente->delete();
        return "<script>alert('Deletado com sucesso!');location='/Fornecedor/Todos';</script>";
    }

    public function ListarPorId($id)
    {
        $cliente = Fornecedor::findOrfail($id);
        return view('Fornecedor.Ver', ['Fornecedors' => $cliente]);
    }
    public function ListarTodos()
    {
        $Fornecedor = DB::table('Fornecedors')->paginate(20);
        return view('Fornecedor.Todos', ['Fornecedors' => $Fornecedor]);
    }
    public function ListarPrimeiro()
    {
        $Fornecedor = DB::table('Fornecedors')->
        select('id')->limit(1);
        return view('Fornecedor.Todos', ['Fornecedors' => $Fornecedor]);
    }
}
