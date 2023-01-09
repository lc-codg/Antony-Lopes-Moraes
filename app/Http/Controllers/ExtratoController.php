<?php

namespace App\Http\Controllers;

use App\Models\parcial;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ExtratoController extends Controller
{
    function InserirNoExtrato($Valor, $Tipo, $Conta, $Modelo, $Empresa,$Descricao)
    {

        parcial::create([
            'data' => now(),
            'valor' => $Valor,
            'usuario' => $Modelo,
            'pessoa' => $Tipo,
            'conta' => Str::substr($Conta, 0, 1),
            'CodEmpresa' => $Empresa,
            'descricao' =>$Descricao,
        ]);
    }
    function ExtratoCredito($Dados, $Tipo)
    {

        $Valor = ($Tipo == 'Parcial' ? $Dados->ValorParcial : $Dados->Valor);

        parcial::create([
            'data' => now(),
            'valor' => $Valor,
            'usuario' => 'Receber',
            'id_original' => $Dados->id,
            'pessoa' => 'C',
            'conta' => Str::substr($Dados->conta, 0, 1),
            'CodEmpresa' => $Dados->CodEmpresa,
        ]);
    }
    function ExtratoDebito($Dados, $Tipo)
    {

        $Valor = ($Tipo == 'Parcial' ? $Dados->ValorParcial : $Dados->Valor);

        parcial::create([
            'data' => now(),
            'valor' => $Valor,
            'usuario' => 'Receber',
            'id_original' => $Dados->id,
            'pessoa' => 'D',
            'conta' => Str::substr($Dados->conta, 0, 1),
            'CodEmpresa' => $Dados->CodEmpresa,
        ]);
    }

    function ConstaNoExtrato($Id)
    {

        $Extrato = DB::table('parcials')->where('id_original', '=', $Id)->where('usuario', '<>', 'Cancelado')->get();
        $Total = Count($Extrato);
        return $Total > 0 ? true : false;
    }

    function ShowExtrato($Id)
    {

        $Extrato = DB::table('parcials')->where('id_original', '=', $Id)->Where('usuario', '<>', 'Cancelado')->paginate(20);
        return view('/Extrato.Todos', ['Extrato' => $Extrato]);
    }
    function CancelarParcial($id)
    {
        $Extrato = parcial::findOrFail($id);
        $Extrato->update([
            'usuario' => 'Cancelado',
        ]);
    }
    function ExtratoGeral(Request $request)
    {
        $Dataini = (!Isset($request->DataIni) ? Date('Y-m-d') : $request->DataIni);
        $Datafim = (!Isset($request->DataFim) ?Date('Y-m-d') : $request->DataFim);
        $Extrato = parcial::whereBetween('parcials.data', [$Dataini, $Datafim])->paginate(100);


        return view('/Extrato/View', ['Extrato' => $Extrato]);
    }

}
