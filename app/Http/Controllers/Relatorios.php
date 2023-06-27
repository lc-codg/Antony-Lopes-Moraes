<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classes\ObterDados;

class Relatorios extends Controller
{
    public function Show(){
        $Util = new ObterDados;
        $Empresa = $Util->ListaDeEmpresas();

        return view('Relatorios.Movimento',['Empresas'=>$Empresa]);
    }

    public function FechamentoGeral(){
        $Util = new ObterDados();
        $Empresa = $Util->ListaDeEmpresas();
        return view('Relatorios.FechamentoGeral',['Empresa'=>$Empresa]);
    }
  
}
