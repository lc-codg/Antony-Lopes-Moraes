<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContasaPagar;
use App\Http\Controllers\EmpresaController;
use Illuminate\Support\Facades\DB;

class ContasaPagarController extends Controller
{
    public function index()
    {
    $Empresa = new EmpresaController();
    $Dados = $Empresa->Listar();

    return view('ContasaPagar.ContasaPagar',['Empresas'=>$Dados]);
    }

    public function create(Request $request)
    {
        if (empty($request->Descricao)) {
            echo "<script>
              alert('Preencha a Descrição');
            </script>";
            exit;
        }
        if (empty($request->Vencimento)) {
            echo "<script>
              alert('Preencha o vencimento');
            </script>";
            exit;
        }
        if (empty($request->Dataemissao)) {
            echo "<script>
              alert('Preencha a Data da emissão');
            </script>";
            exit;
        }
        if (empty($request->Total)) {
            echo "<script>
              alert('Preencha a Total');
            </script>";
            exit;
        }
        if (empty($request->Datarecebimento)) {
            echo "<script>
              alert('Preencha a Data do recebimento');
            </script>";
            exit;
        }
        if (empty($request->CodEmpresa)) {
            echo "<script>
              alert('Preencha a Descrição');
            </script>";
            exit;
        } else {
            ContasaPagar::create([
                'Barras' => $request->Barras,
                'Descricao' => $request->Descricao,
                'CodFornecedor' => $request->CodFornecedor,
                'Total' => $request->Total,
                'TotalDesconto' => $request->TotalDesconto,
                'TotalAcréscimo' => $request->TotalAcrescimo,
                'TotaldosProdutos' => $request->TotalProdutos,
                'Vencimento' => $request->Vencimento,
                'CodGrupo' => $request->CodGrupo,
                'CodSubGrupo' => $request->CodSubGrupo,
                'Parcelas' => $request->Parcelas,
                'Dataemissao' => $request->Dataemissao,
                'Datarecebimento' => $request->Datarecebimento,
                'Boleta' => $request->Boleta,
                'NotaFiscal' => $request->NotaFiscal,
                'Serie' => $request->Serie,
                'CodEmpresa' => $request->CodEmpresa,
            ]);
        }
    }

    public function show($id)
    {
        $ContasaPagar = ContasaPagar::findOrFail($id);
        return view('/ContasaPagar.Ver',['ContasaPagar'=>$ContasaPagar]);
    }

    public function Listartodos()
    {

        $ContasaPagar = DB::table('contasa_pagars')->paginate(20);
        return view('/ContasaPagar.Todos',['ContasaPagar'=>$ContasaPagar]);
    }

    public function update(Request $request, $id)
    {
        $ContasaPagar = ContasaPagar::findOrFail($id);

        if (empty($request->Descricao)) {
            echo "<script>
              alert('Preencha a Descrição');
            </script>";
            exit;
        }
        if (empty($request->Vencimento)) {
            echo "<script>
              alert('Preencha o vencimento');
            </script>";
            exit;
        }
        if (empty($request->Dataemissao)) {
            echo "<script>
              alert('Preencha a Data da emissão');
            </script>";
            exit;
        }
        if (empty($request->Total)) {
            echo "<script>
              alert('Preencha a Total');
            </script>";
            exit;
        }
        if (empty($request->Datarecebimento)) {
            echo "<script>
              alert('Preencha a Data do recebimento');
            </script>";
            exit;
        }
        if (empty($request->CodEmpresa)) {
            echo "<script>
              alert('Preencha a Descrição');
            </script>";
            exit;
        } else {
            $ContasaPagar->Update([
                'Barras' => $request->Barras,
                'Descricao' => $request->Descricao,
                'CodFornecedor' => $request->CodFornecedor,
                'Total' => $request->Total,
                'TotalDesconto' => $request->TotalDesconto,
                'TotalAcréscimo' => $request->TotalAcrescimo,
                'TotaldosProdutos' => $request->TotalProdutos,
                'Vencimento' => $request->Vencimento,
                'CodGrupo' => $request->CodGrupo,
                'CodSubGrupo' => $request->CodSubGrupo,
                'Parcelas' => $request->Parcelas,
                'Dataemissao' => $request->Dataemissao,
                'Datarecebimento' => $request->Datarecebimento,
                'Boleta' => $request->Boleta,
                'NotaFiscal' => $request->NotaFiscal,
                'Serie' => $request->Serie,
                'CodEmpresa' => $request->CodEmpresa,
            ]);
        }
    }

    public function destroy($id)
    {
        $ContasaPagar = ContasaPagar::findOrFail($id);
        $ContasaPagar->delete();

        return "<script>alert('Deletado com sucesso.');location = '/ContasaPagar/Todos';</script>";
    }
}
