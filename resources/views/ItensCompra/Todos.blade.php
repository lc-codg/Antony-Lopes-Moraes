<link href="/css/app.css" rel="stylesheet">

<!DOCTYPE html>
<html lang="en">
@include('Header')


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <div class='.container-fluid ' id='c2'>
<h5>Itens da Compra</h5>
</head>

<body>
    <br>

    <table id="tabelaPedidos" class="table table-bordered table-condensed " style="font-size: 15px; width:100%;">
        <thead class="thead-DARK">
            <tr>

                <th scope="col">Código</th>
                <th scope="col">Barras</th>
                <th scope="col">Descrição</th>
                <th scope="col">Valor</th>
                <th scope="col">Quantidade</th>
                <th scope='col'>Subtotal</th>


            </tr>
        </thead>
        <tbody>
            <tr>



                @foreach($itensCompra as $row)


                <td>{{ $row->id }}</td>

                <td>{{ $row->Barras }}</td>
                <td>{{ $row->Descricao }}</td>

                <td>R$ <span class="price">{{ number_format($row->ValorUnitario, 2, '.', '') }}</span></td>
                <td>{{ $row->Quantidade }}</td>
                <td>R$ <span class="price">{{ number_format(($row->ValorUnitario * $row->Quantidade), 2, '.', '') }}</span></td>

            </tr>
            @endforeach
    </table>
    <form action="/Compras/Todos" method="get">

        <input class="btn btn-dark" name="" type="submit" Value='Voltar'>
    </form>


</body>

@include('footer')
{{ $itensCompra->links() }}

</html>
