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
        if (empty($request->razao)) {
            echo "<script>
            alert('Digite o Razao.');
            javascript:history.back();
            </script>";
            exit;
        }
        if (empty($request->ie)) {
            echo "<script>
            alert('Digite o IE.');
            javascript:history.back();
            </script>";
            exit;
        }
        if (empty($request->cnpj)) {
            echo "<script>
            alert('Digite o Cnpj.');
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


            Empresa::create([
                'Cnpj' => $request->cnpj,
                'Ie' => $request->ie,
                'Razao' => $request->razao,
                'Fantasia' => $request->fantasia,
                'Email' => $request->Email,
                'Endereco' => $request->Endereco,
                'Bairro' => $request->Bairro,
                'Numero' => $request->Numero,
                'Cidade' => $request->Cidade,
                'UF'  => $request->UF,
                'Cep' => $request->cep,
                'Telefone' => $request->telefone,
                'Contato' => $request->contato,
                'Prazo' => $request->prazo,
                'Observacao' => $request->observacao,
                'Conta' => $request->conta,
                'Agencia' => $request->agencia,
                'Tipo' => $request->tipo,

            ]);

            return "<script>alert('Salvo com sucesso!');location='/Empresa/Novo';</script>";
        }
    }
    public function Editar(Request $request, $Id)
    {
        $empresa = Empresa::findOrFail($Id);

        if (empty($request->razao)) {
            echo "<script>
            alert('Digite o Razao.');
            javascript:history.back();
            </script>";
            exit;
        }
        if (empty($request->ie)) {
            echo "<script>
            alert('Digite o IE.');
            javascript:history.back();
            </script>";
            exit;
        }
        if (empty($request->cnpj)) {
            echo "<script>
            alert('Digite o Cnpj.');
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


            $empresa->update([
                'Cnpj' => $request->cnpj,
                'Ie' => $request->ie,
                'Razao' => $request->razao,
                'Fantasia' => $request->fantasia,
                'Email' => $request->Email,
                'Endereco' => $request->Endereco,
                'Bairro' => $request->Bairro,
                'Numero' => $request->Numero,
                'Cidade' => $request->Cidade,
                'UF'  => $request->UF,
                'Cep' => $request->cep,
                'Telefone' => $request->telefone,
                'Contato' => $request->contato,
                'Prazo' => $request->prazo,
                'Observacao' => $request->observacao,
                'Conta' => $request->conta,
                'Agencia' => $request->agencia,
                'Tipo' => $request->tipo,

            ]);

            return "<script>alert('Salvo com sucesso!');location='/Empresa/Todos';</script>";
        }
    }

    public function Delete($id)
    {
        $empresa = Empresa::findOrfail($id);
        $empresa->delete();
        return "<script>alert('Deletado com sucesso!');location='/Empresa/Todos';</script>";
    }

    public function ListarPorId($id)
    {
        $empresa = Empresa::findOrfail($id);
        return view('Empresa.Ver', ['Empresas' => $empresa]);
    }
    public function ListarTodos()
    {
        $Empresa = DB::table('Empresas')->paginate(20);
        return view('Empresa.Todos', ['Empresas' => $Empresa]);
    }
    public function Listar(){
       
            $Empresa = DB::table('Empresas')->get();
            return $Empresa;
        
    }
    public function ListarPrimeiro()
    {
        $Empresa = DB::table('Empresas')->select('id')->limit(1);
        return view('Empresa.Todos', ['Empresas' => $Empresa]);
    }
}
