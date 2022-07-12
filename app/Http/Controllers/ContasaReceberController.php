<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\ContasaReceber;
use App\Classes\ObterDados;
use App\Http\Controllers\ContasBancariasController;


class ContasaReceberController extends Controller
{

  public function index()
  {
    $ObterDados = new ObterDados;

    return view('ContasaReceber.ContasaReceber', [
      'Empresas' => $ObterDados->ListaDeEmpresas(), 'Cliente' => $ObterDados->ListaDeClientes()
    ]);
  }
  public function Verificar($Descricao, $Vencimento, $Dataemissao, $Total, $Datarecebimento, $CodEmpresa)
  {
    if (empty($Descricao)) {
      echo "<script>
                alert('Preencha a Descrição');
                javascript:history.back();
              </script>";
      exit;
    }
    if (empty($Vencimento)) {
      echo "<script>
                alert('Preencha o vencimento');
                javascript:history.back();
              </script>";
      exit;
    }
    if (empty($Dataemissao)) {
      echo "<script>
                alert('Preencha a Data da emissão');
                javascript:history.back();
              </script>";
      exit;
    }
    if (empty($Total)) {
      echo "<script>
                alert('Preencha o Total');
                javascript:history.back();
              </script>";
      exit;
    }
    if (empty($Datarecebimento)) {
      echo "<script>
                alert('Preencha a Data do recebimento');
                javascript:history.back();
              </script>";
      exit;
    }
    if (empty($CodEmpresa)) {
      echo "<script>
                alert('Preencha a Descrição');
                javascript:history.back();
              </script>";
      exit;
    } else {
      return true;
    }
  }

  public function Salvar(
    $Barras,
    $Descricao,
    $CodCliente,
    $Total,
    $TotalDesconto,
    $TotalAcrescimo,
    $Vencimento,
    $CodGrupo,
    $SubGrupo,
    $Parcelas,
    $Dataemissao,
    $Datarecebimento,
    $boleta,
    $NotaFiscal,
    $Serie,
    $CodEmpresa,
    $status,
  ) {
    ContasaReceber::create([
      'Barras' => $Barras,
      'Descricao' => $Descricao,
      'CodCliente' => $CodCliente,
      'Total' => $Total,
      'TotalDesconto' =>$TotalDesconto,
      'TotalAcréscimo' => $TotalAcrescimo,
      'Vencimento' => $Vencimento,
      'CodGrupo' => $CodGrupo,
      'CodSubGrupo' => $SubGrupo,
      'Parcelas' => $Parcelas,
      'Dataemissao' => $Dataemissao,
      'Datarecebimento' => $Datarecebimento,
      'Boleta' => $boleta,
      'NotaFiscal' => $NotaFiscal,
      'Serie' => $Serie,
      'CodEmpresa' => $CodEmpresa,
      'status' => $status,
    ]);
  }
  public function create(Request $request)
  {

    if ($this->Verificar($request->Descricao, $request->Vencimento, $request->Dataemissao, $request->Total, $request->Datarecebimento, $request->CodEmpresa))

      $this->Salvar(
        $request->Barras,
        $request->Descricao,
        Str::substr($request->CodCliente, 0, 1),
        Str_replace(",", ".", $request->Total),
        Str_replace(",", ".", $request->TotalDesconto),
        Str_replace(",", ".", $request->TotalAcrescimo),
        $request->Vencimento,
        Str::substr($request->CodGrupo, 0, 1),
        Str::substr($request->SubGrupo, 0, 1),
        $request->Parcelas,
        $request->Dataemissao,
        $request->Datarecebimento,
        $request->boleta,
        $request->NotaFiscal,
        $request->Serie,
        Str::substr($request->CodEmpresa, 0, 1),
        isset($request->status) ? false : false,
      );

    return
      "<script>
                  alert('Salvo com sucesso!');
                  location = '/ContasaReceber/Novo';
                </script>";
  }



  public function Quitar(Request $request)
  {
    $Banco = new ContasBancariasController();
    if ($Banco->Deposito($request->conta, $request->Valor))
      $ContasaReceber = ContasaReceber::findOrFail($request->id);
    $ContasaReceber->update([
      'status' => 1,
    ]);

    return   "<script>
    alert('Quitado com sucesso!');
    location = '/ContasaReceber/Todos';
  </script>";
  }

  public function Estornar(Request $request)
  {
    $Banco = new ContasBancariasController();
    if ($Banco->Saque($request->conta, $request->Valor))
      $ContasaReceber = ContasaReceber::findOrFail($request->id);
    $ContasaReceber->update([
      'status' => 0,
    ]);

    return "<script>
    alert('Estornado com sucesso!');
    location = '/ContasaReceber/Todos';
  </script>";
  }

  public function show($id)
  {
    $ObterDados = new ObterDados();

    $ContasaReceber = ContasaReceber::findOrFail($id);
    return view('/ContasaReceber.Ver', [
      'ContasaReceber' => $ContasaReceber, 'Empresas'
      => $ObterDados->ListaDeEmpresas(),
      'Cliente' => $ObterDados->ListaDeClientes(),
    ]);
  }

  public function Listartodos(Request $request)
  {
    $Contas = new ContasBancariasController();
    $Banco = $Contas->Listar();
    $ContasaReceber = DB::table('contasa_recebers')->join(
      'empresas',
      'contasa_recebers.CodEmpresa',
      '=',
      'empresas.id'
    )->join('clientes', 'contasa_recebers.CodCliente', '=', 'clientes.id')->select('contasa_recebers.*', 'empresas.Razao as Razaoe', 'clientes.Nome as Razaof')->whereBetween('contasa_recebers.vencimento', [$request->DataIni, $request->DataFim])->paginate(20);

    return view('/ContasaReceber.Todos', ['ContasaReceber' => $ContasaReceber, 'Contas' => $Banco]);
  }

  public function update(Request $request, $id)
  {
    $ContasaReceber = ContasaReceber::findOrFail($id);

    if ($this->Verificar($request->Descricao, $request->Vencimento, $request->Dataemissao, $request->Total, $request->Datarecebimento, $request->CodEmpresa))

      $ContasaReceber->Update([
        'Barras' => $request->Barras,
        'Descricao' => $request->Descricao,
        'CodCliente' => Str::substr($request->CodCliente, 0, 1),
        'Total' => Str_replace(",", ".", $request->Total),
        'TotalDesconto' => Str_replace(",", ".", $request->TotalDesconto),
        'TotalAcréscimo' => Str_replace(",", ".", $request->TotalAcrescimo),
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
            location = '/ContasaReceber/Todos';
        </script>";
  }


  public function destroy($id)
  {
    $ContasaReceber = ContasaReceber::findOrFail($id);
    $ContasaReceber->delete();

    return "<script>alert('Deletado com sucesso.');location = '/ContasaReceber/Todos';</script>";
  }
}
