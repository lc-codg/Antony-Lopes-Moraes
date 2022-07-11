<link href="/css/app.css" rel="stylesheet">

<!DOCTYPE html>
<html lang="en">
@include('Header')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <div class='.container-fluid ' id='c2'>
<h5>Clientes</h5>
</head>

<body>
    <form method='get' action='/Clientes/Todos'>

        <div class='form-row'>

            <div class="form-group col-md-8">
                <label for="">Pesquisa Cliente</label>
                <input autocomplete="off" autofocus type="text" class="form-control" name="Nome" id="" aria-describedby="helpId" placeholder="">
                <small id="helpId" class="form-text text-muted">Aperte a tecla ENTER para realizar a pesquisa por Cnpj,Cpf,Nome ou Razão Social</small>
            </div>

            <div class="form-group col-md-4">
                <input name="Localizar" id="Bot" class="btn btn-dark" type="submit" value="Pesquisar">
            </div>
        </div>

    </form>

    <table id="tabelaPedidos" class="table table-bordered table-condensed " style="font-size: 15px; width:100%;">
        <thead class="thead-dARK">
            <tr>

                <th scope="col">Cod.Cliente</th>
                <th scope="col">Nome</th>
                <th scope="col">CPF</th>
                <th scope="col">RG</th>
                <th scope="col">CNPJ</th>
                <th scope="col">Endereço</th>
                <th scope="col">Número</th>
                <th scope="col">Bairro</th>
                <th scope="col">Cidade</th>
                <th scope="col">UF</th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <tr>



                @foreach ($clientes as $row)

                <td>{{ $row->id }}</td>

                <td>{{ $row->Nome }}</td>
                <td>{{ $row->Cpf }}</td>


                <td>{{ $row->Rg}}</td>
                <td>{{ $row->Cnpj }}</td>
                <td>{{ $row->Endereco }}</td>
                <td>{{ $row->Numero }}</td>
                <td>{{ $row->Bairro }}</td>
                <td>{{ $row->Cidade }}</td>
                <td>{{ $row->UF }}</td>
                <td>

                    <form action="/Clientes/Ver/{{ $row->id }}" method="get">
                        <input class="btn btn-dark" name="" type="submit" Value='Editar'>
                    </form>

                </td>
                <td>
                    <form action="/Clientes/Delete/{{ $row->id }}" method="get">
                        <input class="btn btn-Danger" name="" type="submit" Value='Excluir'>
                    </form>
                </td>
                <td>
                    <form action="/Clientes/Inserir" method="post">

                    </form>
                </td>




            </tr>
            @endforeach
            <script></script>



</body>
{{ $clientes->links() }}

@include('footer')

</html>