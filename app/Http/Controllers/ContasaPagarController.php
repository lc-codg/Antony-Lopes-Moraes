<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContasaPagar;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Classes\ObterDados;
use App\Classes\Operacoes;



class ContasaPagarController extends Controller
{

  public function Quitar($id,$tipo){
    $Operacões = new Operacoes();
    $Operacões->Quitar($id,$tipo);
  }

  public function Estornar($id,$tipo){
    $Operacões = new Operacoes();
    $Operacões->Estornar($id,$tipo);
  }

  public function index()
  {
    $ObterDados = new ObterDados();

    return view('ContasaPagar.ContasaPagar', [
      'Empresas' => $ObterDados->ListaDeEmpresas(),
      'Fornecedor' => $ObterDados->ListaDeFornecedores()
    ]);
  }

  public function create(Request $request)
  {
    if (empty($request->Descricao)) {
      echo "<script>
              alert('Preencha a Descrição');
              javascript:history.back();
            </script>";
      exit;
    }
    if (empty($request->Vencimento)) {
      echo "<script>
              alert('Preencha o vencimento');
              javascript:history.back();
            </script>";
      exit;
    }
    if (empty($request->Dataemissao)) {
      echo "<script>
              alert('Preencha a Data da emissão');
              javascript:history.back();
            </script>";
      exit;
    }
    if (empty($request->Total)) {
      echo "<script>
              alert('Preencha a Total');
              javascript:history.back();
            </script>";
      exit;
    }
    if (empty($request->Datarecebimento)) {
      echo "<script>
              alert('Preencha a Data do recebimento');
              javascript:history.back();
            </script>";
      exit;
    }
    if (empty($request->CodEmpresa)) {
      echo "<script>
              alert('Preencha a Descrição');
              javascript:history.back();
            </script>";
      exit;
    } else {
      ContasaPagar::create([
        'Barras' => $request->Barras,
        'Descricao' => $request->Descricao,
        'CodFornecedor' => Str::substr($request->CodFornecedor, 0, 1),
        'Total' => Str_replace(",", ".", $request->Total),
        'TotalDesconto' => isset($request->TotalDesconto) ? Str_replace(",", ".", $request->TotalDesconto) : 10,
        'TotalAcréscimo' => isset($request->TotalAcréscimo) ? Str_replace(",", ".", $request->TotalAcrescimo) : 0,
        'Vencimento' => $request->Vencimento,
        'CodGrupo' => Str::substr($request->CodGrupo, 0, 1),
        'CodSubGrupo' => Str::substr($request->SubGrupo, 0, 1),
        'Parcelas' => $request->Parcelas,
        'Dataemissao' => $request->Dataemissao,
        'Datarecebimento' => $request->Datarecebimento,
        'Boleta' => $request->boleta,
        'NotaFiscal' => $request->NotaFiscal,
        'Serie' => $request->Serie,
        'CodEmpresa' => Str::substr($request->CodEmpresa, 0, 1),
        'status' => isset($request->status) ? false : false,
      ]);

      return
        "<script>
                alert('Salvo com sucesso!');
                location = '/ContasaPagar/Todos';
              </script>";
    }
  }

  public function show($id)
  {
     $ObterDados = new ObterDados();

    $ContasaPagar = ContasaPagar::findOrFail($id);
    return view('/ContasaPagar.Ver', ['ContasaPagar' => $ContasaPagar, 'Empresas'
    =>  $ObterDados->ListaDeEmpresas(), 'Fornecedor' =>  $ObterDados->ListaDeFornecedores()]);
  }

  public function Listartodos()
  {

    $ContasaPagar = DB::table('contasa_pagars')->join(
      'empresas',
      'contasa_pagars.CodEmpresa',
      '=',
      'empresas.id'
    )->join('fornecedors', 'contasa_pagars.CodFornecedor', '=', 'fornecedors.id')->select('contasa_pagars.*', 'empresas.Razao as Razaoe', 'fornecedors.Nome as Razaof')
      ->paginate(20);

    return view('/ContasaPagar.Todos', ['ContasaPagar' => $ContasaPagar]);
  }

  public function update(Request $request, $id)
  {
    $ContasaPagar = ContasaPagar::findOrFail($id);

    if (empty($request->Descricao)) {
      echo "<script>
              alert('Preencha a Descrição');
              javascript:history.back();
            </script>";
      exit;
    }
    if (empty($request->Vencimento)) {
      echo "<script>
              alert('Preencha o vencimento');
              javascript:history.back();
            </script>";
      exit;
    }
    if (empty($request->Dataemissao)) {
      echo "<script>
              alert('Preencha a Data da emissão');
              javascript:history.back();
            </script>";
      exit;
    }
    if (empty($request->Total)) {
      echo "<script>
              alert('Preencha a Total');
              javascript:history.back();
            </script>";
      exit;
    }
    if (empty($request->Datarecebimento)) {
      echo "<script>
              alert('Preencha a Data do recebimento');
              javascript:history.back();
            </script>";
      exit;
    }
    if (empty($request->CodEmpresa)) {
      echo "<script>
              alert('Preencha a Descrição');
              javascript:history.back();
            </script>";
      exit;
    } else {
      $ContasaPagar->Update([
        'Barras' => $request->Barras,
        'Descricao' => $request->Descricao,
        'CodFornecedor' => Str::substr($request->CodFornecedor, 0, 1),
        'Total' => Str_replace(",", ".", $request->Total),
        'TotalDesconto' => isset($request->TotalDesconto) ? Str_replace(",", ".", $request->TotalDesconto) : 10,
        'TotalAcréscimo' => isset($request->TotalAcréscimo) ? Str_replace(",", ".", $request->TotalAcrescimo) : 0,
        'Vencimento' => $request->Vencimento,
        'CodGrupo' => Str::substr($request->CodGrupo, 0, 1),
        'CodSubGrupo' => Str::substr($request->SubGrupo, 0, 1),
        'Parcelas' => $request->Parcelas,
        'Dataemissao' => $request->Dataemissao,
        'Datarecebimento' => $request->Datarecebimento,
        'Boleta' => $request->boleta,
        'NotaFiscal' => $request->NotaFiscal,
        'Serie' => $request->Serie,
        'CodEmpresa' => Str::substr($request->CodEmpresa, 0, 1),
        'status' => isset($request->status) ? false : false,
      ]);

      return
        "<script>
          alert('Salvo com Sucesso!');
          location = '/ContasaPagar/Todos';
      </script>";
    }
  }

  public function destroy($id)
  {
    $ContasaPagar = ContasaPagar::findOrFail($id);
    $ContasaPagar->delete();

    return "<script>alert('Deletado com sucesso.');location = '/ContasaPagar/Todos';</script>";
  }
}
