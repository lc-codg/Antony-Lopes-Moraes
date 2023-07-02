<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Balanco;
use App\Classes\ObterDados;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class BalancoController extends Controller
{
    public function Listar()
    {
        $ObterDados = new ObterDados();
        return view('Balanco.Listar', [
            'Empresas' => $ObterDados->ListaDeEmpresas()
        ]);
    }
    public function Show()
    {
        $ObterDados = new ObterDados();
        return view('Balanco.Show', [
            'Empresas' => $ObterDados->ListaDeEmpresas()
        ]);
    }
    public function Localizar(request $request)
    {
        $Balanco = Balanco::wherebetween('Data', [$request->Dataini, $request->Datafim])
            ->where('CodEmpresa', Str::Substr($request->CodEmpresa, 0, 1))->get();
        return $Balanco;
    }
    public function Cadastrar(request $request)
    {
        if ($this->Validar($request)) {
            Balanco::create(
                [
                    'Valor' => $request->Valor,
                    'Data' => $request->Data,
                    'CodEmpresa' => Str::Substr($request->CodEmpresa, 0, 1),
                ]
            );
            return "<script>alert('Salvo com sucesso');location = '/Balanco/Show';</script>";
        }
    }
    public function Validar($Dados)
    {
        if (empty($Dados->Valor)) {
            echo "<script>alert('Digite O Valor');</script>";
            exit;
        }
        if (empty($Dados->Data)) {
            echo "<script>alert('Selecione a Data');</script>";
            exit;
        }
        if (empty($Dados->CodEmpresa)) {
            echo "<script>alert('Selecione a Empresa');</script>";
            exit;
        }
        return true;
    }

    public function ListarPorData(Request $request)
    {
        $Mes =  date('m');
        $Ano = date('Y');
        if (($Mes) == 01) {
            $Mes = 12;
            $Ano = $Ano - 1;
        } else {
            $Mes = $Mes - 1;
        }
        $data_incio = mktime(0, 0, 0, date('m'), 1, date('Y'));
        $data_fim = mktime(23, 59, 59, date('m'), date("t"), date('Y'));
        $Diaa = date('Y-m-d', $data_incio);
        $Dia2a =  date('Y-m-d', $data_fim);

        $data_incioa = mktime(0, 0, 0, $Mes, 1, $Ano);
        $data_fimm = mktime(23, 59, 59, $Mes, date("t"), $Ano);
        $Diaan = date('Y-m-d', $data_incioa);
        $Dia2an = date('Y-m-d', $data_fimm);

        $Estoque[0]= DB::table('balancos')->select(DB::raw('SUM(Valor) AS EstoqueAtual'))
            ->where('CodEmpresa', '=', Str::Substr($request->Empresa, 0, 1))->whereBetween('Data', [$Diaa, $Dia2a])->get();

        $Estoque[1]= DB::table('balancos')->select(DB::raw('SUM(Valor) AS EstoqueAnterior'))
            ->where('CodEmpresa', '=', Str::Substr($request->Empresa, 0, 1))->whereBetween('Data', [$Diaan, $Dia2an])->get();

            return response()->json(($Estoque));
    }
}
