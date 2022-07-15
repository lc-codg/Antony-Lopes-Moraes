<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.4.1/jspdf.debug.js" integrity="sha384-THVO/sM0mFD9h7dfSndI6TS0PgAGavwKvB5hAxRRvc0o9cPLohB0wb/PTA7LdUHs" crossorigin="anonymous"></script>
<html lang="pt-br">

<link href="{{ URL::asset('css/app.css') }}" rel="stylesheet" type="text/css">
<script src="{{ asset('js/app.js') }}"></script>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<div calss='.container-fluid' id='c2'>
    <br>

    <div class='card'>
        @if ($Estado == 'C')
        <h4>Cópia de Nota Fiscal</h4>
        @else
        <h4>Espelho de Compra</h4>
        @endif

    </div>

    <body>

        @foreach($Venda as $row)

        <div class='card'>
            @if ($Estado == 'C')
            <H6>Dados Do Emitente</H6>
            @else
            <H6>Dados Do Comprador</H6>
            @endif
        </div>

        <div class='card'>
            <h6>N° da Nota: {{$row->Id}}</h6>
            @if ($Estado == 'C')
            <h6>Emitente: {{$row->RazaoEmpresa}}</h6>
            @else
            <h6>Comprador: {{$row->RazaoEmpresa}}</h6>
            @endif
            <h6>Data: {{$row->DtPedido}}</h6>

        </div>

        <div class='card'>
            @if ($Estado == 'C')
            <H6>Dados Do Destinatário</H6>
            @else
            <H6>Dados Do Fornecedor</H6>
            @endif
        </div>

        <div class='card'>

            <div class='form-row'>
                <h6 class='form-group col-md-3'>Nome: {{$row->Nomecliente}}</h6>
                <h6 class='form-group col-md-3'>Endereço: {{$row->endereco}}</h6>
                <h6 class='form-group col-md-1'>N°: {{$row->numero}}</h6>
                <h6 class='form-group col-md-2'>Bairro: {{$row->bairro}}</h6>
                <h6 class='form-group col-md-2'>Cep: {{$row->cep}}</h6>
                <h6 class='form-group col-md-3'>Telefone: {{$row->telefone}}</h6>
            </div>

        </div>

        @endforeach






        <table id="tabelaPedidos" class="table table-bordered table-condensed " style="font-size: 15px; width:100%;">
            <thead class="thead-dark">
                <tr>
                    <th>Quantidade</th>
                    <th>Peso</th>
                    <th>Und</th>
                    <th>Descrição da Mercadoria</th>
                    <th>Valor Unitário</th>
                    <th>Subtotal</th>

                </tr>
            </thead>
            <tbody>
                <tr>
                    @foreach($Itens as $row)


                    <td>{{ $row->id }}</td>

                    <td>{{ $row->Barras }}</td>
                    <td>{{ $row->Descricao }}</td>

                    <td> <span class="">R${{ number_format($row->ValorUnitario, 2, '.', '') }}</span></td>
                    <td>{{ $row->Quantidade }}</td>
                    <td><span class="">R${{ number_format(($row->ValorUnitario * $row->Quantidade), 2, '.', '') }}</span></td>

                </tr>
                @endforeach


            </tbody>
        </table>
        <div class='card'>
            @foreach($Venda as $row)
            <H4>Total: {{$row ->Total}}</H4>
            @endforeach
        </div>

        <div class='card'>
            <h5>Recebimento</h5>

        </div>
        <div class='card'>
            <br>
            <br>
            Recebido em ____/____/________ Conferente: ___________________ Documento: ____________________________________
        </div>
        <br>

        <a name="" onClick="window.print()" id="" class="btn btn-primary" href="#" role="button">Imprimir</a>

        @if($Estado == 'C')

          @if ($Tipo == 'Limpo')
             <a name="" onClick="window.close();" id="" class="btn btn-danger" href="" role="button">Fechar</a>
          @else
             <a name="" id="" class="btn btn-danger" href="/Pedidos/Carrinho" role="button">Fechar</a>
           @endif

        @else

          @if ($Tipo == 'Limpo')
              <a name="" onClick="window.close();" id="" class="btn btn-danger" href="" role="button">Fechar</a>
           @else
             <a name="" id="" class="btn btn-danger" href="/Compras/Carrinho" role="button">Fechar</a>
            @endif

            @endif

</div>



</body>

</html>