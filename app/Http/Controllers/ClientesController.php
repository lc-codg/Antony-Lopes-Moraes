<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clientes;
use Illuminate\Support\Facades\DB;

class ClientesController extends Controller
{
    public function Cadastrar()
    {
        return view('Clientes.Cliente');
    }

    public function Salvar(Request $request)
    {
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


            Clientes::create([
                'Nome' => $request->Nome,
                'CPF' => $request->CPF,
                'RG' => $request->RG,
                'CNPJ' => $request->CNPJ,
                'Email' => $request->Email,
                'Endereco' => $request->Endereco,
                'Bairro' => $request->Bairro,
                'Numero' => $request->Numero,
                'PessoaJuridica' => $request->PessoaJuridica,
                'Cidade' => $request->Cidade,
                'UF' => $request->UF,
            ]);

            return "<script>alert('Salvo com sucesso!');location='/Clientes/Novo';</script>";
        }
    }
    public function Editar(Request $request, $Id)
    {
        $cliente = Clientes::findOrFail($Id);

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
                'id' => $request->id,
                'Nome' => $request->Nome,
                'CPF' => $request->CPF,
                'RG' => $request->RG,
                'CNPJ' => $request->CNPJ,
                'Email' => $request->Email,
                'Endereco' => $request->Endereco,
                'Bairro' => $request->Bairro,
                'Numero' => $request->Numero,
                'PessoaJuridica' => $request->PessoaJuridica,
                'Cidade' => $request->Cidade,
                'UF' => $request->UF,
            ]);

            return "<script>alert('Salvo com sucesso!');location='/Clientes/Todos';</script>";
        }
    }

    public function Delete($id)
    {
        $cliente = Clientes::findOrfail($id);
        $cliente->delete();
        return "<script>alert('Deletado com sucesso!');location='/Clientes/Todos';</script>";
    }

    public function ListarPorId($id)
    {
        $cliente = Clientes::findOrfail($id);
        return view('Clientes.Ver', ['cliente' => $cliente]);
    }
    public function ListarTodos()
    {
        $clientes = DB::table('clientes')->paginate(20);
        return view('Clientes.Todos', ['clientes' => $clientes]);
    }
    public function ListarPrimeiro()
    {
        $clientes = DB::table('clientes')->
        select('id')->limit(1);
        return view('Clientes.Todos', ['clientes' => $clientes]);
    }
}
