<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index($Tipo)
    {
        return view('Usuario.Usuario', ['Tipo' => $Tipo]);
    }
    public function Registrar(Request $request)
    {
        if ($this->Validar($request)) {

            User::create([
                'name' => $request->Nome,
                'email' => $request->Email,
                'password' => $request->Senha,
            ]);
            try {
                echo '<script>alert("Salvo com sucesso");location="/Usuario/Login"</script>';
            } catch (Exception $Erro) {

                echo 'Erro ao registrar usuário' + $Erro->getMessage();
            }
        }
    }
    function Validar($Dados)
    {
        if (empty($Dados->Nome)) {
            echo '<script>alert("Preencha o nome.");window.history.back();;</script>';
            exit;
        } elseif (empty($Dados->Senha)) {
            echo '<script>alert("Preencha o senha.");window.history.back();;</script>';
            exit;
        } elseif (empty($Dados->Email)) {
            echo '<script>alert("Preencha o e-mail.");window.history.back();;</script>';
            exit;
        } else {
            return true;
        }
    }
    function Logar(Request $request)
    {
        $Dados = $request->all();

        $Login = $Dados['Nome'];
        $Senha = $Dados['Senha'];

        $Usuario =
            User::where('name', $Login)->first();
        if (Auth::check() || ($Usuario && Hash::check($Senha, $Usuario->password))) {
            Auth::name($Usuario);
            return redirect(route('home'));
        } else {
            echo '<script>alert("Usuário não cadastrado.");</script>';
            return '<script>location="/"</script>';
        }
    }

    public function LogarOk(Request $request)
    {
        $Dados = $request->all();

        $Login = $Dados['Nome'];
        $Senha = $Dados['Senha'];

        $Usuario = DB::table('users')->where('name', '=', $Login)->first();
        if ($Usuario <> null) {
            if (($Senha == $Usuario->password) && ($Login == $Usuario->name)) {
                return '<script>location="/Home"</script>';
            } else {
                echo '<script>alert("Usuário ou Senha incorreto");</script>';
                return '<script>location="/"</script>';
            }
        } else {
            echo '<script>alert("Usuário não cadastrado.");</script>';
            return '<script>location="/"</script>';
        }
    }
}
