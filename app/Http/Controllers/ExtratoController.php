<?php

namespace App\Http\Controllers;

use App\Models\parcial;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ExtratoController extends Controller
{
    function ExtratoCredito($Dados,$Tipo){

        $Valor = ($Tipo =='Parcial' ? $Dados->ValorParcial : $Dados->Valor);

        parcial::create([
            'data' => now(),
            'valor' => $Valor,
            'usuario' => '',
            'id_original' => $Dados->id,
            'pessoa' => 'C',
            'conta' => Str::substr($Dados->conta, 0, 1),
        ]);
    }
    function ExtratoDebito($Dados,$Tipo){

        $Valor = ($Tipo =='Parcial' ? $Dados->ValorParcial : $Dados->Valor);

        parcial::create([
            'data' => now(),
            'valor' => $Valor,
            'usuario' => '',
            'id_original' => $Dados->id,
            'pessoa' => 'D',
            'conta' => Str::substr($Dados->conta, 0, 1),
        ]);
    }

    function ConstaNoExtrato($id){

        $Extrato = DB::table('parcials')->get();;
        $Total = Count($Extrato);
        return $Total > 0 ? true :false;
    }

    function ShowExtrato(){

        $Extrato = DB::table('parcials')->get()->paginate(20);

        while($Extrato){
            return $Extrato;
        }
    }
}
