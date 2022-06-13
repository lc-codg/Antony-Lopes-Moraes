<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('Header')
</head>

<body>
    <div id='container' class='.container-fluid'>

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
                    <td>{{ $row->CodEmpresa}}</td>

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