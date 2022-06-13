<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContasBancarias;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\EmpresaController;

class ContasBancariasController extends Controller
{

    public function index()
    {
        $Empresa = new EmpresaController;
        $Dados = $Empresa->Listar();

        return view('ContasBancarias.ContasBancarias', ['Empresas' => $Dados]);
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
                    'CodEmpresa' => $request->CodEmpresa
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
    public function show($id)
    {
        $Empresa = new EmpresaController;
        $Dados = $Empresa->Listar();

        $ContasBancarias = ContasBancarias::FindOrFail($id);
        return View('ContasBancarias.Ver', ['ContasBancarias' => $ContasBancarias,'Empresas'=>$Dados]);
    }

    public function ListarTodos()
    {
        $ContasBancarias = DB::table('contas_bancarias')->paginate(20);
        return View('ContasBancarias.Todos', ['ContasBancarias' => $ContasBancarias]);
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
        }else{

        $ContasBancarias->update(
            [
                'Banco' => $request->Banco,
                'Saldo' => str_replace(",",".",$request->Saldo),
                'Agencia' => $request->Agencia,
                'Tipo' => $request->Tipo,
                'Conta' => $request->Conta,
                'Operacao' => $request->Operacao,
                'Descricao' => $request->Descricao,
                'CodEmpresa' => $request->CodEmpresa
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
