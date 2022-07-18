<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classes\ObterDados;

class ArrecadacaoController extends Controller
{
    public function index()
    {
        $Obterdados = new ObterDados();
        return view('Arrecadacao.Novo',['Empresa'=>$Obterdados->ListaDeEmpresas()]);
    }
}
