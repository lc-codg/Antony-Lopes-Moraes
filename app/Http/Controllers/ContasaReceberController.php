<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\ContasaReceber;
use App\Classes\ObterDados;
use App\Http\Controllers\ContasBancariasController;
use App\Http\Controllers\ExtratoController;


class ContasaReceberController extends Controller
{
    public function PagarParcial($Dados)
    {
        $Banco = new ContasBancariasController();
        if ($Banco->Deposito(Str::substr($Dados->conta, 0, 1),  $Dados->ValorParcial))
            $ContasaReceber = ContasaReceber::findOrFail($Dados->id);

        $ContasaReceber->update([
            'status' => 0,
            'Total' => (($Dados->Valor) - ($Dados->ValorParcial)),
            'conta' => ''
        ]);
        $Extrato = new ExtratoController();
        $Extrato->ExtratoCredito($Dados, 'Parcial');
    }

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
            'TotalDesconto' => $TotalDesconto,
            'TotalAcréscimo' => $TotalAcrescimo,
            'Vencimento' => $Datarecebimento,
            'CodGrupo' => $CodGrupo,
            'CodSubGrupo' => $SubGrupo,
            'Parcelas' => $Parcelas,
            'Dataemissao' => $Datarecebimento,
            'Datarecebimento' => $Datarecebimento,
            'Boleta' => $boleta,
            'NotaFiscal' => $NotaFiscal,
            'Serie' => $Serie,
            'CodEmpresa' => $CodEmpresa,
            'status' => $status,
            'conta' => '',

        ]);
    }
    public function create(Request $request)
    {
        $Cliente =  explode("-",$request->CodCliente);
        if ($this->Verificar($request->Descricao, $request->Vencimento, $request->Dataemissao, $request->Total, $request->Datarecebimento, $request->CodEmpresa))

            $this->Salvar(
                $request->Barras,
                $request->Descricao,
                $Cliente[0],
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
                0,

            );

        return
            "<script>
                  alert('Salvo com sucesso!');
                  location = '/ContasaReceber/Novo';
                </script>";
    }

    public function Validar(Request $request)
    {
        if (($request->ValorParcial >= $request->Valor) or (($request->ValorParcial == ''))) {

            $this->Quitar($request);

            return 'Quitada com sucesso!';

        } else {
            $this->PagarParcial($request);
            $resto = 'Parcialmente Quitada, resta: ' . ($request->Valor - $request->ValorParcial);
            return  $resto;
        }
    }

    public function Quitar($Dados)
    {
        $Banco = new ContasBancariasController();
        if ($Banco->Deposito(Str::substr($Dados->conta, 0, 1),  $Dados->Valor))
            $ContasaReceber = ContasaReceber::findOrFail($Dados->id);
        $ContasaReceber->update([
            'status' => 1,
            'conta' => Str::substr($Dados->conta, 0, 1),
        ]);

        $Extrato = new ExtratoController();
        $Extrato->InserirNoExtrato($Dados->Valor, 'C', $Dados->conta, 'Receber', $Dados->CodEmpresa,($ContasaReceber->Descricao.' Nº: '.$Dados->id));

    }

    public function Estornar(Request $request)
    {
        $Banco = new ContasBancariasController();
        if ($Banco->Saque($request->conta2, $request->Valor))
            $ContasaReceber = ContasaReceber::findOrFail($request->id);
        $ContasaReceber->update([
            'status' => 0,
            'conta' => ''
        ]);
        $Extrato = new ExtratoController();
        $Extrato->InserirNoExtrato($request->Valor, 'D', $request->conta2, 'Receber', $request->CodEmpresa,($ContasaReceber->Descricao.' Cancelada nº '.$request->id));

        return "Estornado com sucesso!";
    }
    public function EParcial(Request $request)
    {
        $Banco = new ContasBancariasController();

        if ($Banco->Saque($request->conta, $request->valor))
            $ContasaReceber = ContasaReceber::findOrFail($request->id_original);
        $ContasaReceber->update([
            'status' => 0,
            'Total' => $ContasaReceber->Total + $request->valor,
            'conta' => ''
        ]);
        $Extrato = new ExtratoController();
        $Extrato->CancelarParcial($request->id);
        return "<script>alert('Estorno de parcial efetuado com sucesso!');location='/ContasaReceber/Todos'</script>";
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
        $Utilidades = new ObterDados;
        $Empresas = $Utilidades->ListaDeEmpresas();
        $ContasaReceber = DB::table('contasa_recebers')->join(
            'empresas',
            'contasa_recebers.CodEmpresa',
            '=',
            'empresas.id'
        )->join('clientes', 'contasa_recebers.CodCliente', '=', 'clientes.id')->select('contasa_recebers.*', 'empresas.Razao as Razaoe', 'clientes.Nome as Razaof')->where('contasa_recebers.CodEmpresa', '=', $request->Empresa)->whereBetween('contasa_recebers.vencimento', [$request->DataIni, $request->DataFim])->paginate(2000);

        return view('/ContasaReceber.Todos', ['Empresas' => $Empresas, 'ContasaReceber' => $ContasaReceber, 'Contas' => $Banco]);
    }

    public function update(Request $request, $id)
    {
        $ContasaReceber = ContasaReceber::findOrFail($id);

        if ($this->Verificar($request->Descricao, $request->Vencimento, $request->Dataemissao, $request->Total, $request->Datarecebimento, $request->CodEmpresa))
        $Cliente =  explode("-",$request->CodCliente);
            $ContasaReceber->Update([
                'Barras' => $request->Barras,
                'Descricao' => $request->Descricao,
                'CodCliente' => $Cliente[0],
                'Total' => Str_replace(",", ".", $request->Total),
                'TotalDesconto' => Str_replace(",", ".", $request->TotalDesconto),
                'TotalAcréscimo' => Str_replace(",", ".", $request->TotalAcrescimo),
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
                'conta' => '',
                'status' => 0,
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

    public function ListarAtrasadas()
    {
        $ContasaReceber = DB::table('contasa_recebers')->join(
            'empresas',
            'contasa_recebers.CodEmpresa',
            '=',
            'empresas.id'
        )->join('fornecedors', 'contasa_recebers.CodFornecedor', '=', 'fornecedors.id')->select('contasa_recebers.*', 'empresas.Razao as Razaoe', 'fornecedors.Nome as Razaof')->Where('status', '=', '0')->WhereDate('contasa_recebers.vencimento', '>', 'CURRENT_DATE()')->get();

        return $ContasaReceber;
    }
}
