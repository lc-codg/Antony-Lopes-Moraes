<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContasBancarias;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\EmpresaController;
use Illuminate\Support\Str;
use App\Classes\ObterDados;

class ContasBancariasController extends Controller
{
    public function Listar()
    {
        $Contas = DB::table('contas_bancarias')->get();
        return $Contas;
    }
    public function Deposito($id, $Valor)
    {

        $ContasBancarias = ContasBancarias::findOrFail($id);
        $ContasBancarias->update([
            'Saldo' => ($ContasBancarias->Saldo) + ($Valor),
        ]);

        return true;
    }
    public function Saque($id, $Valor)
    {
        $ContasBancarias = ContasBancarias::findOrFail($id);
        $ContasBancarias->update([
            'Saldo' => ($ContasBancarias->Saldo) - ($Valor),
        ]);

        return true;
    }

    public function index()
    {
        $Empresa = new EmpresaController;
        $Dados = $Empresa->Listar();

        return view('ContasBancarias.ContasBancarias', ['Empresas' => $Dados]);
    }
    public function show($id)
    {
        $Empresa = new EmpresaController;
        $Dados = $Empresa->Listar();

        $ContasBancarias = ContasBancarias::FindOrFail($id);
        return View('ContasBancarias.Ver', ['ContasBancarias' => $ContasBancarias, 'Empresas' => $Dados]);
    }

    public function ListarTodos(Request $request)
    {
        $ContasBancarias = DB::table('contas_bancarias')->join('empresas', 'empresas.id', '=', 'contas_bancarias.CodEmpresa')->select(
            'contas_bancarias.id',
            'contas_bancarias.Descricao',
            'contas_bancarias.Banco',
            'contas_bancarias.Agencia',
            'contas_bancarias.Operacao',
            'contas_bancarias.Tipo',
            'empresas.Razao',
            'contas_bancarias.Saldo'
        )->where('empresas.Razao', 'LIKE', '%' . $request->Nome . '%')->orwhere('empresas.Cnpj', '=', $request->Nome)->orwhere('empresas.id', '=', $request->Nome)->paginate(20);
        return View('ContasBancarias.Todos', ['ContasBancarias' => $ContasBancarias]);
    }

    public function Saldo()
    {
        $ContasBancarias = DB::table('contas_bancarias')->join('empresas', 'empresas.id', '=', 'contas_bancarias.CodEmpresa')->select(
            'contas_bancarias.id',
            'contas_bancarias.Descricao',
            'contas_bancarias.Banco',
            'contas_bancarias.Agencia',
            'contas_bancarias.Operacao',
            'contas_bancarias.Tipo',
            'empresas.Razao',
            'contas_bancarias.Saldo'
        )->paginate(20);
        return View('ContasBancarias.Saldo', ['ContasBancarias' => $ContasBancarias]);
    }


    public function Salvar(Request $request)
    {
        if (empty($request->Banco)) {
            echo "<script>
            alert('Digite o Banco.');
            javascript:history.back();
            </script>";
            exit;
        }

        if (empty($request->Agencia)) {
            echo "<script>
            alert('Digite o Agência.');
            javascript:history.back();
            </script>";
            exit;
        }


        if (empty($request->Conta)) {
            echo "<script>
            alert('Digite o Conta.');
            javascript:history.back();
            </script>";
            exit;
        }


        if (empty($request->Descricao)) {
            echo "<script>
            alert('Digite o Descrição.');
            javascript:history.back();
            </script>";
            exit;
        }


        if (empty($request->CodEmpresa)) {
            echo "<script>
            alert('Digite o Código Empresa.');
            javascript:history.back();
            </script>";
            exit;
        } else {

            ContasBancarias::create(
                [
                    'Banco' => $request->Banco,
                    'Saldo' => $request->Saldo,
                    'Agencia' => $request->Agencia,
                    'Tipo' => $request->Tipo,
                    'Conta' => $request->Conta,
                    'Operacao' => $request->Operacao,
                    'Descricao' => $request->Descricao,
                    'CodEmpresa' => Str::substr($request->CodEmpresa, 0, 1)
                ]
            );
            return
                "<script>
             alert('Salvo com sucesso!');
             location = '/ContasBancarias/Novo'; 

          </script>";
        }
    }

    public function Delete($id)
    {

        $ContasBancarias = ContasBancarias::findOrFail($id);
        $ContasBancarias->delete();
        return
            "<script>
          alert('Deletado com sucesso!');
          location='/ContasBancarias/Todos';
        </script>";
    }

    public function update(Request $request, $id)
    {
        $ContasBancarias = ContasBancarias::findOrFail($id);

        if (empty($request->Banco)) {
            echo "<script>
            alert('Digite o Banco.');
            javascript:history.back();
            </script>";
            exit;
        }

        if (empty($request->Agencia)) {
            echo "<script>
            alert('Digite o Agência.');
            javascript:history.back();
            </script>";
            exit;
        }


        if (empty($request->Conta)) {
            echo "<script>
            alert('Digite o Conta.');
            javascript:history.back();
            </script>";
            exit;
        }


        if (empty($request->Descricao)) {
            echo "<script>
            alert('Digite o Descrição.');
            javascript:history.back();
            </script>";
            exit;
        }


        if (empty($request->CodEmpresa)) {
            echo "<script>
            alert('Digite o Código Empresa.');
            javascript:history.back();
            </script>";
            exit;
        } else {

            $ContasBancarias->update(
                [
                    'Banco' => $request->Banco,
                    'Saldo' => $request->Saldo,
                    'Agencia' => $request->Agencia,
                    'Tipo' => $request->Tipo,
                    'Conta' => $request->Conta,
                    'Operacao' => $request->Operacao,
                    'Descricao' => $request->Descricao,
                    'CodEmpresa' => Str::substr($request->CodEmpresa, 0, 1)
                ]
            );
            return
                "<script>
             alert('Salvo com sucesso!');
             location = '/ContasBancarias/Todos';
          </script>";
        }
    }
}
