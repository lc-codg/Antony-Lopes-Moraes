<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Balanco;
use App\Classes\ObterDados;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class BalancoController extends Controller
{
    public function Listar(){
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
        ->where('CodEmpresa', Str::Substr($request->CodEmpresa,0,1))->get();
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

    public function ListarPorData(Request $request){
        $EstoqueAtual = DB::table('balanco')->select(DB::raw('SUM(Valor) as EstoqueAtual'))->where('Data','=',$request->Datafim)
        ->where('CodEmpresa','=',Str::Substr($request->CodEmpresa,0,1))->get();

        $EstoqueAnterior = DB::table('balanco')->select(DB::raw('SUM(Valor) as EstoqueAtual'))->where('Data','=',$request->Datafim)
        ->where('CodEmpresa','=',Str::Substr($request->CodEmpresa,0,1))->get();

        return (['EstoqueAtual'=>$EstoqueAtual,'EstoqueAnterior'=>$EstoqueAnterior]);
    }
}
