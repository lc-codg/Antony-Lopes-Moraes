<!DOCTYPE html>
<html lang="en">

<head>
    <link href="/css/app.css" rel="stylesheet">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('Header')
</head>

<body>
    <div id='container' class='.container-fluid' id='c2'>
        <br>
<h5>Contas Bancárias</h5>
        <form method='get' action='/ContasBancarias/Todos/'>

            <div class='form-row'>

                <div class="form-group col-md-4">
                    <label for="">Pesquisar Por Empresa</label>
                    <input autofocus type="text" class="form-control" name="Nome" id="" aria-describedby="helpId" placeholder="">
                    <small id="helpId" class="form-text text-muted">Código, Nome ou Cnpj</small>
                </div>
                <div class="form-group col-md-3">
                    <input name="Localizar" id="Bot" class="btn btn-dark" type="submit" value="Pesquisar">
                </div>





        </form>


        <table id="tabelaPedidos" class="table table-bordered table-condensed " style="font-size: 15px; width:100%;">
            <thead class="thead-dark">
                <tr>

                    <th scope="col">Cod.Conta Bancária</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Banco</th>
                    <th scope="col">Agência</th>
                    <th scope="col">Operação</th>
                    <th scope="col">Tipo</th>
                    <th scope='col'>Empresa</th>
                    <th scope='col'>Saldo</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <tr>



                    @foreach ($ContasBancarias as $row)

                    <td>{{ $row->id }}</td>

                    <td>{{ $row->Descricao }}</td>
                    <td>{{ $row->Banco }}</td>
                    <td>{{ $row->Agencia}}</td>
                    <td>{{ $row->Operacao}}</td>
                    <td>{{ $row->Tipo}}</td>
                    <td>{{ $row->Razao}}</td>
                    <td class='price'>R${{ $row->Saldo}}</td>

                    <td>

                        <form action="/ContasBancarias/Ver/{{ $row->id }}" method="get">
                            <input class="btn btn-dark" name="" type="submit" Value='Editar'>
                        </form>

                    </td>
                    <td>
                        <form action="/ContasBancarias/Delete/{{ $row->id }}" method="get">
                            <input class="btn btn-danger" name="" type="submit" Value='Excluir'>
                        </form>
                    </td>




                </tr>
                @endforeach
                <script></script>



</body>
{{ $ContasBancarias->links() }}

@include('footer')

</html>
