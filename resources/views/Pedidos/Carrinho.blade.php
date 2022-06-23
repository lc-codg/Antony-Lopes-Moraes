@include('Header')


<link href="{{ URL::asset('css/app.css') }}" rel="stylesheet" type="text/css">
<script src="{{ asset('js/app.js') }}"></script>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <br>
    <div id='container' class='.container-fluid'>

        <div class='form-row '>

            <div class="form-group col-md-6">
                <label for="">Nome Cliente</label>
                <input type="text" class="form-control" name="PesquisaNome" id="PesquisaNome" aria-describedby="helpId" placeholder="">
            </div>

            <div class="form-group col-md-2">
                <label for="">CNPJ</label>
                <input type="text" class="form-control" name="PesquisaCnpj" id="PesquisaCnpj" aria-describedby="helpId" placeholder="">
            </div>



        </div>
        <div class="form-group col-md-6" id='resultado_cliente'>



        </div>
   


    </div>


    <div class="form-group col-md-6">
        <label>
            <span>Buscar Produtos</span>
        </label>
        <input autofocus autocomplete="off" type="text" class="form-control col-md-10" name="buscar" id="buscar" aria-describedby="helpId" placeholder="">
    </div>



    <div class="form-group col-md-6" id='resultado_busca'>



    </div>


    <div id='container' class='.container-fluid'>

        <table id="tabelaPedidos" class="table table-bordered table-condensed " style="font-size: 15px; width:100%;">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Código</th>
                    <th scope="col">Produto</th>
                    <th scope="col">Valor Unitário</th>
                    <th scope="col">Quantidade</th>
                    <th scope="col">Subtotal</th>
                    <th scope="col"></th>

                </tr>
            </thead>
            <tbody>
                <div id='content_retorno'>
                    @php $Total =0; @endphp
                    @foreach ($Cart as $row)
                    <tr>
                        <td>{{ $row['Barras']}}</td>
                        <td>{{ $row['Descricao'] }}</td>
                        <td>{{'R$'.number_format($row['Valor'],2,',','.')}}</td>
                        <td>{{$row['Quantidade']}}</td>
                        <td class='SubTotal'>{{'R$'.number_format($row['Quantidade'] * $row['Valor'],2,',','.')}}</td>
                        @php
                        $Total += ($row['Quantidade'] * $row['Valor']);
                        @endphp

                        <td>
                            <form action="/Pedidos/Excluir/{id}" method="get">
                                <input class="btn btn-danger" name="" type="submit" Value='Excluir'>
                            </form>
                        </td>
                    </tr>

                    @endforeach

                    <th class='Total' scope="col">Total</th>
                    <td id='Total'>{{'R$'.number_format($Total,2,',','.')}}</td>
                    <th class='Cliente' scope="col">Cliente</th>
                    <td >{{$Cliente['Razao']}}  </td>

        </table>
        <div class='form-row'>


            <div class="form-group col-md-01">
                <button onclick="location.href = '/Pedidos/LimparCarrinho';" id="Limpar" class="btn btn-danger">Cancelar</button>
            </div>

            <div class='form-group col-md-01'>
                <button onclick="location.href = '/Pedidos/LimparCarrinho';" id="Finalizar" class="btn btn-primary">Finalizar- F2</button>
            </div>

        </div>

    </div>





    </div>
    <div>

    </div>

</body>

</html>

@include("Footer")