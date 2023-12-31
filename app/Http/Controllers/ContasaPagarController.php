<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContasaPagar;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Classes\ObterDados;
use App\Http\Controllers\ContasBancariasController;
use Carbon\Carbon;
use App\Http\Controllers\ExtratoController;
use App\Http\Controllers\ComprasController;

class ContasaPagarController extends Controller
{

    public function Quitar(Request $request)
    {
        $ContasaPagar = ContasaPagar::findOrFail($request->id);
        $Banco = new ContasBancariasController();

        $Juros = empty($request->Juros2) ? 0 : $request->Juros2;
        $Multa = empty($request->Multa2) ? 0 : $request->Multa2;
        $Cheque = empty($request->Cheque2) ? '' : $request->Cheque2;

        $Descricao = $ContasaPagar->Descricao;

        if ($Banco->Saque(Str::substr($request->conta, 0, 1), $request->Valor + $Multa + $Juros))
            $ContasaPagar->update([
                'status' => 1,
                'Juros' => $Juros,
                'Multa' => $Multa,
                'Cheque' => $Cheque,
                'Conta' => Str::substr($request->conta, 0, 1)
            ]);

        $Total = $request->Valor + $Multa + $Juros;
        $Extrato = new ExtratoController();
        $Extrato->InserirNoExtrato($Total, 'D', Str::substr($request->conta, 0, 1), 'Pagar', $request->CodEmpresa, $Descricao);

        return 'Quitado com sucesso!';
    }

    public function Estornar(Request $request)
    {
        $Juros = empty($request->Juros2) ? 0 : $request->Juros2;
        $Multa = empty($request->Multa2) ? 0 : $request->Multa2;

        $Banco = new ContasBancariasController();
        if ($Banco->Deposito(Str::substr($request->conta2, 0, 1), $request->Valor + $Multa + $Juros))
            $ContasaPagar = ContasaPagar::findOrFail($request->id);
        $Descricao = $ContasaPagar->Descricao;
        $ContasaPagar->update([
            'status' => 0,
            'Juros' => 0,
            'Multa' => 0,
            'Cheque' => 0,
            'Conta' => 0
        ]);

        $Total = $request->Valor + $Multa + $Juros;
        $Extrato = new ExtratoController();
        $Extrato->InserirNoExtrato($Total, 'C', $request->conta2, 'Pagar', $request->CodEmpresa, ($Descricao . '/ ESTORNADA'));

        return 'Estornado com sucesso!';
    }



    public function index($Tipo)
    {
        $ObterDados = new ObterDados();

        return view('ContasaPagar.ContasaPagar', [
            'Empresas' => $ObterDados->ListaDeEmpresas(),
            'Fornecedor' => $ObterDados->ListaDeFornecedores(),
            'Tipo' => $Tipo,
            'Categoria' => $ObterDados->ListarCategorias(),
            'SubCategoria' => $ObterDados->ListarSubCategorias()
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
            if ($request->TipoDeCompra == 'prazo') {
                $Forn =  explode("-", $request->CodFornecedor);
                ContasaPagar::create([
                    'Barras' => $request->Barras,
                    'Descricao' => $request->Descricao,
                    'CodFornecedor' => $Forn[0],
                    'Total' => Str_replace(",", ".", $request->Total),
                    'TotalDesconto' => isset($request->TotalDesconto) ? Str_replace(",", ".", $request->TotalDesconto) : 10,
                    'TotalAcréscimo' => isset($request->TotalAcrescimo) ? Str_replace(",", ".", $request->TotalAcrescimo) : 0,
                    'Vencimento' => $request->Datarecebimento,
                    //'CodGrupo' => Str::substr($request->CodGrupo, 0, 1),
                    //'CodSubGrupo' => Str::substr($request->SubGrupo, 0, 1),
                    'Parcelas' => $request->Parcelas,
                    'Dataemissao' => $request->Datarecebimento,
                    'Datarecebimento' => $request->Datarecebimento,
                    'Boleta' => $request->boleta,
                    'NotaFiscal' => $request->NotaFiscal,
                    'Serie' => $request->Serie,
                    'CodEmpresa' => Str::substr($request->CodEmpresa, 0, 1),
                    'status' => 0,
                    'Juros' => 0,
                    'Multa' => 0,
                    'Cheque' => 0
                ]);
            }
            if ($request->TipoDeCompra <> 'conta') {
                $Compras = new ComprasController();
                $Compras->SalvarComprasSimples($request);
            }

            return
                "<script>
                alert('Salvo com sucesso!');
                location = '/ContasaPagar/Novo/$request->TipoDeCompra';
              </script>";
        }
    }

    public function show($id)
    {
        $ObterDados = new ObterDados();

        $ContasaPagar = ContasaPagar::findOrFail($id);
        return view('/ContasaPagar.Ver', [
            'ContasaPagar' => $ContasaPagar, 'Empresas'
            =>  $ObterDados->ListaDeEmpresas(), 'Fornecedor' =>  $ObterDados->ListaDeFornecedores(),      'Catgoria' => $ObterDados->ListarCategorias(),
            'SubCategoria' => $ObterDados->ListarSubCategorias()
        ]);
    }


    public function Listartodos(Request $request)
    {
        $Obter = new ObterDados();
        $ContasBancarias = $Obter->ListarContasBancarias();
        $Empresas = $Obter->ListaDeEmpresas();
        $CodContaPagar = Str::substr($request->Empresa, 0, 1);
        if ($CodContaPagar <> '*'){
            $ContasaPagar = DB::table('contasa_pagars')->join(
                'empresas',
                'contasa_pagars.CodEmpresa',
                '=',
                'empresas.id'
            )->join('fornecedors', 'contasa_pagars.CodFornecedor', '=', 'fornecedors.id')->select('contasa_pagars.*', 'empresas.Razao as Razaoe', 'fornecedors.Nome as Razaof')->where('contasa_pagars.CodEmpresa', '=', Str::substr($request->Empresa, 0, 1))->whereBetween('contasa_pagars.vencimento', [$request->DataIni, $request->DataFim])->paginate(2000);
        }if ($CodContaPagar == '*'){
            $ContasaPagar = DB::table('contasa_pagars')->join(
                'empresas',
                'contasa_pagars.CodEmpresa',
                '=',
                'empresas.id'
            )->join('fornecedors', 'contasa_pagars.CodFornecedor', '=', 'fornecedors.id')->select('contasa_pagars.*', 'empresas.Razao as Razaoe', 'fornecedors.Nome as Razaof')->whereBetween('contasa_pagars.vencimento', [$request->DataIni, $request->DataFim])->paginate(2000);
        }
    
        return view('/ContasaPagar/Todos', ['ContasaPagar' => $ContasaPagar, 'Contas' => $ContasBancarias, 'Empresas' => $Empresas]);
    }

    public function ListarAtrasadas()
    {
        $ContasaPagar = DB::table('contasa_pagars')->join(
            'empresas',
            'contasa_pagars.CodEmpresa',
            '=',
            'empresas.id'
        )->join('fornecedors', 'contasa_pagars.CodFornecedor', '=', 'fornecedors.id')->select('contasa_pagars.*', 'empresas.Razao as Razaoe', 'fornecedors.Nome as Razaof')->Where('status', '=', '0')->WhereDate('contasa_pagars.vencimento', '>', 'CURRENT_DATE()')->get();

        return $ContasaPagar;
    }
    public function ListarAVencer()
    {
        $ContasaPagar = DB::table('contasa_pagars')->join(
            'empresas',
            'contasa_pagars.CodEmpresa',
            '=',
            'empresas.id'
        )->join('fornecedors', 'contasa_pagars.CodFornecedor', '=', 'fornecedors.id')->select('contasa_pagars.*', 'empresas.Razao as Razaoe', 'fornecedors.Nome as Razaof')->Where('status', '=', '0')->WhereDate('contasa_pagars.vencimento', '<=', 'CURRENT_DATE()')->get();

        return $ContasaPagar;
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
            $Forn =  explode("-", $request->CodFornecedor);
            $ContasaPagar->Update([
                'Barras' => $request->Barras,
                'Descricao' => $request->Descricao,
                'CodFornecedor' => $Forn[0],
                'Total' => Str_replace(",", ".", $request->Total),
                'TotalDesconto' => isset($request->TotalDesconto) ? Str_replace(",", ".", $request->TotalDesconto) : 10,
                'TotalAcréscimo' => isset($request->TotalAcrescimo) ? Str_replace(",", ".", $request->TotalAcrescimo) : 0,
                'Vencimento' => $request->Datarecebimento,
                'CodGrupo' => Str::substr($request->CodGrupo, 0, 1),
                'CodSubGrupo' => Str::substr($request->SubGrupo, 0, 1),
                'Parcelas' => $request->Parcelas,
                'Dataemissao' => $request->Datarecebimento,
                'Datarecebimento' => $request->Datarecebimento,
                'Boleta' => $request->boleta,
                'NotaFiscal' => $request->NotaFiscal,
                'Serie' => $request->Serie,
                'CodEmpresa' => Str::substr($request->CodEmpresa, 0, 1),
                'status' => isset($request->status) ? false : false,
                'Juros' => 0,
                'Multa' => 0,
                'Cheque' => 0
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

    public function Fechamento(Request $request)
    {
        $ContasaPagar = DB::table('contasa_pagars')->join(
            'empresas',
            'contasa_pagars.CodEmpresa',
            '=',
            'empresas.id'
        )->join('fornecedors', 'contasa_pagars.CodFornecedor', '=', 'fornecedors.id')->select('contasa_pagars.*', 'empresas.Razao as Razaoe', 'fornecedors.Nome as Razaof')
            ->where('contasa_pagars.CodEmpresa', '=', $request->Empresa)->Where('contasa_pagars.status', '=', 1)
            ->whereBetween('contasa_pagars.vencimento', [$request->DataIni, $request->DataFim])->get();

        return response()->json($ContasaPagar);
    }
}
