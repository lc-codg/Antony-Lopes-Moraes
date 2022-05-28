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
        <thead class="thead-DARK">
            <tr>

                <th scope="col">Código</th>
                <th scope="col">Barras</th>
                <th scope="col">Nome</th>
                <th scope="col">Valor</th>
                <th scope="col">Estoque</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <tr>



                <?php foreach($produto as $row){
                $val = $row->ValorUnitario;?>

                <td>{{ $row->id }}</td>

                <td>{{ $row->Barras }}</td>
                <td>{{ $row->Descricao }}</td>

                <td>R$ <span class="price">{{ number_format($val, 2, '.', '') }}</span></td>
                <td>{{ $row->Quantidade }}</td>




                <td>

                    <form action="/Produtos/Ver/{{ $row->id }}" method="get">
                        <input class="btn btn-dark" name="" type="submit" Value='Editar'>
                    </form>
                </td>
                <td>
                    <form action="/Produtos/Delete/{{ $row->id}}" method="get">
                        <input class="btn btn-Danger" name="" type="submit" Value='Excluir'>
                    </form>
                </td>




            </tr>
            <?php } ?>
            <script></script>



</body>

@include('footer')

</html>
