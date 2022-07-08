<!DOCTYPE html>
<html lang="en">
<link href="/css/app.css" rel="stylesheet">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('Header')
</head>

<body>
    <div id='container' class='.container-fluid'>
        <form method='get' action='/ContasaReceber/Todos'>

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

                    <th scope="col">Cod.Contas a Receber</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Barras</th>
                    <th scope="col">Empresa</th>
                    <th scope="col">Cliente</th>
                    <th scope="col">Total</th>
                    <th scope='col'>Vencimento</th>
                    <th scope='col'>N° Parcela</th>
                    <th scope='col'>N° Boleta</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <tr>



                    @foreach ($ContasaReceber as $row)

                    <td>{{ $row->id }}</td>

                    <td>{{ $row->Descricao }}</td>
                    <td>{{ $row->Barras }}</td>
                    <td>{{ $row->Razaoe}}</td>
                    <td>{{ $row->Razaof}}</td>
                    <td>{{ $row->Total}}</td>
                    <td>{{ $row->Vencimento}}</td>
                    <td>{{ $row->Parcelas}}</td>
                    <td>{{ $row->Boleta}}</td>


                    <td>

                        <form action="/ContasaReceber/Ver/{{ $row->id }}" method="get">
                            <input class="btn btn-dark" name="" type="submit" Value='Editar'>
                        </form>

                    </td>
                    <td>
                        <form action="/ContasaReceber/Delete/{{ $row->id }}" method="get">
                            <input class="btn btn-danger" name="" type="submit" Value='Excluir'>
                        </form>
                    </td>

                    <td>
                        <form action="/ContasaReceber/Quitar/" method="get">
                            <input name='id' hidden value='{{$row->id}}'>
                            <input namer='tipo' hidden value='Receber'>
                            <input class="btn btn-primary" name="" type="submit" Value='Quitar'>
                        </form>
                    </td>

                 






                </tr>
                @endforeach
                <script></script>



</body>
{{ $ContasaReceber->links() }}

@include('footer')

</html>