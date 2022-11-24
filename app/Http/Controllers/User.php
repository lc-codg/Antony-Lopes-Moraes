<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class User extends Controller
{
    public function index($Tipo)
    {
        return view('Usuario.Usuario',['Tipo'=>$Tipo]);
    }
}
