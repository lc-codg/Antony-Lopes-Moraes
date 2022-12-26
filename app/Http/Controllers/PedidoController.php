<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Pedidos;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Classes\ObterDados;
use App\Http\Controllers\ItensController;
use App\Http\Controllers\ContasaReceberController;
use Illuminate\Support\Str;
use Exception;

class PedidoController extends Controller
{
    public function Imprimir($id,$tipo)
    {
      $pedidos = DB::table('pedidos')->select('pedidos.Id',
      'clientes.Nome as Nomecliente',
      'clientes.Razao as RazaoCliente' ,
      'empresas.RAZAO as RazaoEmpresa' ,
      'pedidos.Total',
      'pedidos.DtPedido',
      'clientes.endereco','clientes.bairro',
      'clientes.cnpj','clientes.cep','clientes.telefone',
      'clientes.ie','clientes.numero')->
      join('clientes' ,'pedidos.CodigoDocliente', '=','clientes.id')-> 
      join('empresas', 'pedidos.CodEmpresa', '=', 'empresas.Id')->
      where('pedidos.id', '=', $id)->get();
      
      $itens = new ItensController();
      $Produtos = $itens->LocalizaItens($id);

      return view('Pedidos.ImpressaoA4',['Itens'=>$Produtos, 'Venda'=>$pedidos,'Tipo'=>$tipo, 'Estado'=>'C']);
    }
    public function Show()
    {
        if (session()->has('Cart'))
            $Carrinho = (Session::get('Cart'));
        else
            $Carrinho = session('Cart', []);

        if (session()->has('Cliente')) {
            $Cliente = Session::get('Cliente');
        } else {
            $Cliente = session('Cliente', ['Razao' => '', 'Cnpj' => '', 'Id' => '']);
        }
        $ObterDados = new ObterDados();
        $Empresa = $ObterDados->ListaDeEmpresas();

        return view('Pedidos.Carrinho', ['Cart' => $Carrinho, 'Cliente' => $Cliente, 'Empresa' => $Empresa]);
    }
    public function LimparCarrinho()
    {
        Session::flush('Cart');
        Session::flush('Cliente');
        return "<script>location='/Pedidos/Carrinho';</script>";
    }

    public function Delete($id)
    {
        $Pedidos = Pedidos::findOrfail($id);
        $Pedidos->delete();
        return "<script>alert('Deletado com sucesso!');location='/Pedidos/Todos';</script>";
    }

    public function ListarPorId($Id)
    {
        $Pedido = Pedidos::findOrfail($Id);
        return view('Pedidos.Ver', ['Pedidos' => $Pedido]);
    }
    public function ListarTodos(Request $request)
    {
        $Dados = new ObterDados;
        $Empresa = $Dados->ListaDeEmpresas();
        $Cliente = $Dados->ListaDeClientes();

        $Pedidos = DB::table('pedidos')->select(
            'pedidos.id',
            'pedidos.CodigoDoCliente',
            'pedidos.Total',
            'pedidos.TotalDesconto',
            'pedidos.TotalAcréscimo',
            'pedidos.DtPedido',
            'pedidos.CodEmpresa',
            'clientes.Nome',
            'empresas.Razao',

        )->
        join('clientes', 'pedidos.CodigoDoCliente', '=', 'clientes.id')->
        join('empresas', 'pedidos.CodEmpresa','=','empresas.id')->
        where('clientes.Nome','LIKE','%'.$request->Nome.'%')->
       // where('clientes.Razao','LIKE','%'.$request->Nome.'%')->
        where('pedidos.CodEmpresa','=',Str::Substr($request->Empresa,0,1))->
        where('empresas.Razao', 'LIKE', '%'.$request->Nome.'%')->
       
      
        whereBetween('DtPedido',array($request->Dataini,$request->Datafim))->
        paginate(20);

        return view('Pedidos.Todos', ['Pedidos' => $Pedidos,'Empresa'=>$Empresa,'Cliente'=>$Cliente]);
    }
    public function VerificaDados($Cliente, $Empresa, $Produtos)
    {
        if (empty($Cliente['Id'])) {
            echo "<script>alert('Preencha o Cliente.'),history.back()</script>";
            exit;
        }
        if (empty($Empresa['Id'])) {

            echo "<script>alert('Preencha o emitente.'),history.back()</script>";
            exit;
        }
        if ($Produtos == 0) {
            echo "<script>alert('Insira produtos ao pedido.'),history.back()</script>";
            exit;
        } else {

            return true;
        }
    }
    public function create(Request $request)
    {
        $Cliente = session::get('Cliente');
        $Empresa = session::get('Empresa');
        $Itens = new ItensController;
        $Total = 0;

        if ($request->session()->has('Cart')) {

            $Produtos = session::get('Cart');
            foreach ($Produtos as $row) {
                $Total += ($row['Valor'] *  $row['Quantidade']);
            }
        } else {
            $Produtos = 0;
        }

        if ($this->VerificaDados($Cliente, $Empresa, $Produtos)) {
            $Pedidos = Pedidos::create([
                'CodigoDoCliente' => $Cliente['Id'],
                'Total' => $Total,
                'TotaldosProdutos' => $Total,
                'DtPedido' => date('Y-m-d'),
                'Dataemissao' => date('Y-m-d'),
                'DataSaida' => date('Y-m-d'),
                'Finalidade' => 'Venda',
                'CodEmpresa' => $Empresa['Id']
            ]);


            $Id = $Pedidos->id;
            $ContasAReceber = new ContasaReceberController();
            $ContasAReceber->Salvar('0',
            'Emissão de nota',
            $Cliente['Id'],
            $Total,
            0,
            0,
            date('Y-m-d'),
            '0',
            '0',
            1,
            date('Y-m-d'),
            date('Y-m-d'),
            0,
            $Id,
            0,
            $Empresa['Id'],
            0);

            if ($Itens->Salvar($Produtos, $Id)) {
                $Tipo = 'Novo';
                echo "<script>
                alert('Pedido Salvo com sucesso.'),
               </script>";
               $this->LimparCarrinho();
               return $this->Imprimir($Id,$Tipo);
            } else {
                return "<script>alert(Erro ao Gravar.)</script>";
            }
        }
    }
}
