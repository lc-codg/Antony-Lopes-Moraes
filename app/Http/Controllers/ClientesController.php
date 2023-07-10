<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clientes;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ClientesController extends Controller
{
    public function Cadastrar()
    {
        return view('Clientes.Cliente');
    }
    public function Inserir(Request $request)
    {
        $cliente = Clientes::findorFail($request->id);

        Session::put('Cliente', [
            'Razao' => ($cliente->Nome == '') ? $cliente->Razao : $cliente->Nome,
            'Cnpj' => ($cliente->Cpf == '') ? $cliente->Cnpj : $cliente->Cpf,
            'Id' => $cliente->id,
        ]);
        return Session::get('Cliente');
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

    public function ListarPorNome(Request $request)
    {
        $Cliente = DB::table('clientes')->select('Nome', 'Id', 'Cnpj', 'Cpf', 'Razao')->where('Nome', 'LIKE', '%' . $request->Nome . '%')->orwhere('Razao', 'LIKE', '%' . $request->Nome . '%')->orwhere('Cnpj', 'LIKE', '%' . $request->Nome . '%')->orwhere('Cpf', 'LIKE', '%' . $request->Nome . '%')->orwhere('Nome', 'LIKE', '%' . $request->Nome . '%')->get();
        return response()->json(array('Clientes' => $Cliente));
    }
    public function ListarTodos(Request $request)
    {
        $clientes = DB::table('clientes')->where('Nome', 'LIKE', '%' . $request->Nome . '%')->orwhere('Razao', 'LIKE', '%' . $request->Nome . '%')->orwhere('Cnpj', 'LIKE', '%' . $request->Nome . '%')->orwhere('Cpf', 'LIKE', '%' . $request->Nome . '%')->orwhere('Nome', 'LIKE', '%' . $request->Nome . '%')->paginate(20);
        return view('Clientes.Todos', ['clientes' => $clientes]);
    }
    public function Listar()
    {
        $cliente = DB::table('clientes')->get();
        return $cliente;
    }
    public function ListarPrimeiro()
    {
        $clientes = DB::table('clientes')->select('id')->limit(1);
        return view('Clientes.Todos', ['clientes' => $clientes]);
    }

    public function Salvar(Request $request)
    {
        if (empty($request->Nome)) {
            echo "<script>
          alert('Digite o nome do cliente.');
          javascript:history.back();
          </script>";
            exit;




        } else {


            Clientes::create([
                'Nome' => $request->Nome,
                'Cpf' => $request->CPF,
                'Rg' => $request->rg,
                'Cnpj' => $request->cnpj,
                'Ie' => $request->ie,
                'Razao' => $request->razao,
                'Fantasia' => $request->fantasia,
                'Email' => $request->Email,
                'Endereco' => $request->Endereco,
                'Bairro' => $request->Bairro,
                'Numero' => $request->Numero,
                'PessoaJuridica' => $request->PessoaJuridica,
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
                'CodigoVendedor' => $request->codvendedor,
                'Limite' => $request->limite,
                'Bloqueio' => $request->bloqueio,
                'Exterior' => $request->exterior,
                'Juridico' => $request->juridico,
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




        } else {


            $cliente->update([
                'Nome' => $request->Nome,
                'Cpf' => $request->CPF,
                'Cnpj' => $request->cnpj,
                'Ie' => $request->ie,
                'Rg' => $request->RG,
                'Razao' => $request->Nome,
                'Fantasia' => $request->Nome,
                'Email' => $request->Email,
                'Endereco' => $request->Endereco,
                'Bairro' => $request->Bairro,
                'Numero' => $request->Numero,
                'PessoaJuridica' => $request->PessoaJuridica,
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
                'CodigoVendedor' => $request->codigovendedor,
                'Limite' => $request->limite,
                'Bloqueio' => $request->bloqueio,
                'Exterior' => $request->exterior,
                'Juridico' => $request->juridico
            ]);

            return "<script>alert('Salvo com sucesso!');location='/Clientes/Todos';</script>";
        }
    }
}
