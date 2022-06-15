<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\EmpresaController;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\ClientesController;
use Illuminate\Support\Str;
use App\Models\ContasaReceber;

class ContasaReceberController extends Controller
{
    public function index()
    {
      $Empresa = new EmpresaController();
      $Cliente = new ClientesController();
  
      $DadosCliente = $Cliente->Listar();
      $Dados = $Empresa->Listar();
  
      return view('ContasaReceber.ContasaReceber', ['Empresas' => $Dados, 'Cliente' => $DadosCliente]);
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
        ContasaReceber::create([
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
          'CodEmpresa' => Str::substr($request->CodEmpresa, 0, 1)
        ]);
  
        return
          "<script>
                  alert('Salvo com sucesso!');
                  location = '/ContasaReceber/Todos';
                </script>";
      }
    }
  
    public function show($id)
    {
      $Empresa = new EmpresaController();
      $Cliente = new ClientesController();
  
      $DadosCliente = $Cliente->Listar();
      $Dados = $Empresa->Listar();
  
      $ContasaReceber = ContasaReceber::findOrFail($id);
      return view('/ContasaReceber.Ver', ['ContasaReceber' => $ContasaReceber, 'Empresas'
      => $Dados, 'Cliente' => $DadosCliente]);
    }
  
    public function Listartodos()
    {
  
      $ContasaReceber = DB::table('contasa_recebers')->join('empresas','contasa_recebers.CodEmpresa',
       '=','empresas.id')->join('clientes','contasa_recebers.CodCliente','=','clientes.id')->
        select('contasa_recebers.*','empresas.Razao as Razaoe','clientes.Nome as Razaof')
        ->paginate(20);
  
      return view('/ContasaReceber.Todos', ['ContasaReceber' => $ContasaReceber]);
    }
  
    public function update(Request $request, $id)
    {
      $ContasaReceber = ContasaReceber::findOrFail($id);
  
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
          'CodEmpresa' => Str::substr($request->CodEmpresa, 0, 1)
        ]);
  
        return
          "<script>
            alert('Salvo com Sucesso!');
            location = '/ContasaReceber/Todos';
        </script>";
      }
    }
  
    public function destroy($id)
    {
      $ContasaReceber = ContasaReceber::findOrFail($id);
      $ContasaReceber->delete();
  
      return "<script>alert('Deletado com sucesso.');location = '/ContasaReceber/Todos';</script>";
    }
  }
  