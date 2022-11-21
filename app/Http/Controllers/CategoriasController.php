<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorias;
use Exception;
use Illuminate\Support\Facades\DB;

class CategoriasController extends Controller
{
    public function Salvar(request $request)
    {
        if ($this->Validar($request)) {

            Categorias::create(
                [
                    'descricao' => $request->Descricao,
                    'tipo' => $request->Tipo,
                ]
            );
            try {
                echo "<script>alert('Salvo com sucesso!');location='/Categorias/Categorias'</script>";
            } catch (Exception $Erro) {
                echo 'Erro:', $Erro->getMessage(), "n";
            }
        }
    }
    public function Validar($Dados)
    {
        if (empty($Dados->Descricao)) {
            echo "<script>alert('Preencha a Descrição')</script>";
            exit;
        } else if (empty($Dados->Tipo)) {
            echo "<script>alert('Preencha o Tipo')</script>";
            exit;
        } else {
            return true;
        }
    }

    public function Editar(request $request)
    {
        if ($this->Validar($request)) {
            $Categorias =  Categorias::findOrFail($request->Id);
            $Categorias->update(
                [
                    'descricao' => $request->Descricao,
                    'tipo' => $request->Tipo,
                    'id' =>$request->Id
                ]
            );
            try {
                echo "<script>alert('Salvo com sucesso!');location='/Categorias/Todos'</script>";
            } catch (Exception $Erro) {
                echo 'Erro:', $Erro->getMessage(), "n";
            }
        }
    }
    public function Show(Request $request)
    {
        return view('Categorias.Categorias',['Descricao'=>$request->Descricao,'Tipo'=>$request->Tipo,'Id'=>$request->Id]);
    }
    public function Listar()
    {
        return view('Categorias.Todos');
    }
    public function Localizar(Request $request)
    {
        $Categoria = DB::table('categorias')->where('tipo','=',$request->Tipo)->get();
        return $Categoria;
    }
    public function Excluir(Request $request){
        $Categorias = Categorias::findOrfail($request->id);
        $Categorias->delete();
        return true;
    }
    public function ListaCategoria($Tipo){
        $Categoria = DB::table('categorias')->where('tipo','=',$Tipo)->get();
        return $Categoria;
    }
}
