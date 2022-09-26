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
    <div id='c2' class='.container-fluid'>
        <h5>Arrecadação</h5>

        <form method='get' action='/Arrecadacao/Todos'>

            <div class='form-row'>

                <div class="form-group col-md-2">
                    <label for="">Data Inicial</label>
                    <input type="date" class="form-control" name="DataIni" id="" value="{{Date('Y-m-d')}}" aria-describedby="helpId" placeholder="">
                </div>

                <div class="form-group col-md-2">
                    <label for="">Data Final</label>
                    <input type="date" class="form-control" name="DataFim" value="{{Date('Y-m-d')}}" id="" aria-describedby="helpId" placeholder="">
                </div>

                <div class="form-group col-md-4">
                    <input class="btn btn-primary" name="" id='Bot' type="submit" Value='Pesquisar' aria-describedby="helpId" placeholder="">
                </div>

            </div>
        </form>

        <table id="tabelaPedidos" class="table table-bordered table-condensed " style="font-size: 15px; width:100%;">
            <thead class="thead-dark">
                <tr>

                    <th scope="col">Cod.Arrecadação</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Empresa</th>
                    <th scope="col">Total</th>
                    <th scope='col'>Data</th>
                    <th scope='col'>Identificação</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <tr>



                    @foreach ($Arrecada as $row)

                    <td>{{ $row->id }}</td>
                    <td>{{ $row->Descricao }}</td>
                    <td>{{ $row->Razaoe}}</td>
                    <td>{{ $row->Valor}}</td>
                    <td>{{ $row->DataRecebimento}}</td>
                    <td>{{ $row->Numero}}</td>


                    <td>

                        <form action="/Arrecadacao/Editar/{{ $row->id }}" method="get">
                            <input class="btn btn-dark" name="" type="submit" Value='Editar'>
                        </form>

                    </td>

                    <td>
                        <form action="/Arrecadacao/Deletar/{{ $row->id }}" method="get">
                            <input class="btn btn-danger" name="" type="submit" Value='Excluir'>
                        </form>
                    </td>




                </tr>
                @endforeach
                <script></script>



</body>
{{ $Arrecada->links() }}

@include('footer')

</html>