<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresa;
use Illuminate\Support\Facades\DB;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Cadastrar()
    {
        return view('Empresa.Empresa');
    }

    public function Salvar(Request $request)
    {
        if (empty($request->Nome)) {
            echo "<script>
          alert('Digite o nome do Empresa.');
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
        if ($request->Juridico){
        if (empty($request->cnpj)) {
            echo "<script>
            alert('Digite ao Bairro.');
            javascript:history.back();
            </script>";
            exit;
        }
    }
        if (empty($request->Numero)) {
            echo "<script>
            alert('Digite o Número.');
            javascript:history.back();
            </script>";
            exit;
        } else {


            Empresa::create([
                'Nome' => $request->Nome,
                'CPF' => $request->CPF,
                'RG' => $request->RG,
                'CNPJ' => $request->CNPJ,
                'ie' =>$request->Ie,
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
             
            ]);

            return "<script>alert('Salvo com sucesso!');location='/Empresa/Novo';</script>";
        }
    }
    public function Editar(Request $request, $Id)
    {
        $cliente = Empresa::findOrFail($Id);

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
                'ie' =>$request->Ie,
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
              
            ]);

            return "<script>alert('Salvo com sucesso!');location='/Empresa/Todos';</script>";
        }
    }

    public function Delete($id)
    {
        $cliente = Empresa::findOrfail($id);
        $cliente->delete();
        return "<script>alert('Deletado com sucesso!');location='/Empresa/Todos';</script>";
    }

    public function ListarPorId($id)
    {
        $cliente = Empresa::findOrfail($id);
        return view('Empresa.Ver', ['cliente' => $cliente]);
    }
    public function ListarTodos()
    {
        $Empresa = DB::table('Empresa')->paginate(20);
        return view('Empresa.Todos', ['Empresa' => $Empresa]);
    }
    public function ListarPrimeiro()
    {
        $Empresa = DB::table('Empresa')->
        select('id')->limit(1);
        return view('Empresa.Todos', ['Empresa' => $Empresa]);
    }
}
