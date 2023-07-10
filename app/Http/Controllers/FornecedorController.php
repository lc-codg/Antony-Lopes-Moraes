<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fornecedor;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

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
    public function Inserir(Request $request)
    {
        $cliente = Fornecedor::findorFail($request->id);

        Session::put('Fornecedor', [
            'Razao' => ($cliente->Nome == '') ? $cliente->Razao : $cliente->Nome,
            'Cnpj' => ($cliente->Cpf == '') ? $cliente->Cnpj : $cliente->Cpf,
            'Id' => $cliente->id,
        ]);
        return Session::get('Fornecedor');
    }
    public function ListarPorNome(Request $request)
    {
        $Fornecedor = DB::table('fornecedors')->select('Nome', 'Id', 'Cnpj', 'Cpf', 'Razao')->where('Nome', 'LIKE', '%' . $request->Nome . '%')->orwhere('Razao', 'LIKE', '%' . $request->Nome . '%')->orwhere('Cnpj', 'LIKE', '%' . $request->Nome . '%')->orwhere('Cpf', 'LIKE', '%' . $request->Nome . '%')->orwhere('Nome', 'LIKE', '%' . $request->Nome . '%')->get();
        return response()->json(array('Fornecedor' => $Fornecedor));
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
    public function ListarTodos(Request $request)
    {
        $Fornecedor = DB::table('fornecedors')->where('Nome', 'LIKE', '%' . $request->Nome . '%')->orwhere('Razao', 'LIKE', '%' . $request->Nome . '%')->orwhere('Cnpj', 'LIKE', '%' . $request->Nome . '%')->orwhere('Cpf', 'LIKE', '%' . $request->Nome . '%')->orwhere('Nome', 'LIKE', '%' . $request->Nome . '%')->paginate(20);
        return view('Fornecedor.Todos', ['Fornecedors' => $Fornecedor]);
    }
    public function Listar()
    {
        $Fornecedor = DB::table('fornecedors')->get();
        return $Fornecedor;
    }
    public function ListarPrimeiro()
    {
        $Fornecedor = DB::table('fornecedors')->select('id')->limit(1);
        return view('Fornecedor.Todos', ['Fornecedors' => $Fornecedor]);
    }

    public function Salvar(Request $request)
    {
        if (empty($request->Nome)) {
            echo "<script>
          alert('Digite o nome do Fornecedor.');
          javascript:history.back();
          </script>";
            exit;




        } else {


            Fornecedor::create([
                'Nome' => $request->Nome,
                'Cpf' => $request->CPF,
                'Cnpj' => $request->cnpj,
                'Ie' => $request->ie,
                'Rg' => $request->ie,
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
                'Exterior' => $request->exterior,
                'Juridico' => $request->juridico
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



        } else {


            $cliente->update([
                'Nome' => $request->Nome,
                'Cpf' => $request->CPF,
                'Cnpj' => $request->cnpj,
                'Ie' => $request->ie,
                'Rg' => $request->ie,
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
                'Exterior' => $request->exterior,
                'Juridico' => $request->juridico
            ]);

            return "<script>alert('Salvo com sucesso!');location='/Fornecedor/Todos';</script>";
        }
    }
}
