<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Resources\views\Cliente\Cliente;

class ClientesController extends Controller
{
    public function Cadastrar(){
        return view('Clientes.Cliente');
    }
}
