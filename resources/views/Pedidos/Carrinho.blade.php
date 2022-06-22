@include('Header')
<?php if (session_status() !== PHP_SESSION_ACTIVE) {

    session_start();
    $cache_limiter = session_cache_limiter();
    $cache_expire = session_cache_expire();
} ?>

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
                <input type="text" class="form-control" name="" id="" aria-describedby="helpId" placeholder="">
            </div>

            <div class="form-group col-md-2">
                <label for="">CNPJ</label>
                <input type="text" class="form-control" name="" id="" aria-describedby="helpId" placeholder="">
            </div>

            <div style='margin-top:2.5%;' class="form-group col-md-2">
                <button onclick="location.href = '/Clientes/Todos';" id="" class="btn btn-primary">Pesquisar</button>
            </div>

        </div>

    </div>


    <div class="form-group col-md-6">
        <label>
            <span>Buscar Produtos</span>
        </label>
        <input autofocus id='Limpar'autocomplete="off" type="text" class="form-control col-md-10" name="buscar" id="buscar" aria-describedby="helpId" placeholder="">
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
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <div id='content_retorno'>

                    @foreach ($Cart as $row)
                    <tr>
                        <td>{{ $row['Barras']}}</td>
                        <td>{{ $row['Descricao'] }}</td>
                        <td>{{$row['Valor']}}</td>
                        <td>{{$row['Quantidade']}}</td>
                        <td>{{$row['Quantidade'] * $row['Valor']}}</td>



                        <td>
                            <form action="/Pedidos/Excluir/{id}" method="get">
                                <input class="btn btn-danger" name="" type="submit" Value='Excluir'>
                            </form>
                        </td>
                    </tr>
                    @endforeach
        </table>
        <div>
    <button onclick="location.href = '/Pedidos/LimparCarrinho';" id="" class="btn btn-warning">Limpar Carrinho</button>
    </div>
    </div>





    </div>
    <div>

    </div>

</body>

</html>

@include("Footer")