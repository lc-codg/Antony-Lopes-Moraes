<link href="/css/app.css" rel="stylesheet">

<!DOCTYPE html>
<html lang="en">
@include('Header')


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <div class='.container-fluid ' id='c2'>

</head>

<body>




    <style>
    </style>

    <table id="tabelaPedidos" class="table table-bordered table-condensed " style="font-size: 15px; width:100%;">
        <thead class="thead-Dark">
            <tr>

                <th scope="col">Código</th>
                <th scope="col">Cliente</th>
                <th scope="col">Total</th>
                <th scope="col">Data</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <tr>



                <?php foreach($Pedidos as $row){
?>

                <td>{{ $row->id }}</td>

                <td>{{ $row->Nome }}</td>
                <td>R$ <span class="price">{{ number_format($row->Total, 2, '.', '') }}</span></td>

                <td>{{ $row->DtPedido }}</td>




                <td>

                    <form action="/Itens/Todos" method="get">
                        <input class="btn btn-primary" name="" type="submit" Value='Itens'>
                    </form>
                </td>
                <td>
                    <form action="/Pedidos/Delete/{{$row->id}}" method="get">

                        <input class="btn btn-Danger" name="" type="submit" Value='Excluir'>
                    </form>
                </td>




            </tr>
            <?php }
            ?>
            {{$Pedidos->links()}}




</body>

@include('footer')

</html>
