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
    <div id='c2' class='.container-fluid'>

        <h5>Despesas</h5>

        <form method='get' action='/Despesas/Todos'>

            <div class='form-row'>

                <div class="form-group col-md-2">
                    <label for="">Data Inicial</label>
                    <input type="date" class="form-control" name="DataIni" id="" value="{{Date('Y-m-d')}}" aria-describedby="helpId" placeholder="">
                </div>

                <div class="form-group col-md-2">
                    <label for="">Data Final</label>
                    <input type="date" class="form-control" name="DataFim" value="{{Date('Y-m-d')}}" id="" aria-describedby="helpId" placeholder="">
                </div>

                <div class="form-group col-md-3">
                    <input class="btn btn-primary" name="" id='Bot' type="submit" Value='Pesquisar' aria-describedby="helpId" placeholder="">
                </div>

                <div class="form-group col-md-3">
                    <input class="btn btn-primary" name="" id='Bot' type="submit" Value='Imprimir' aria-describedby="helpId" placeholder="">
                </div>

            </div>
        </form>
        <table id="tabelaPedidos" class="table table-bordered table-condensed " style="font-size: 15px; width:100%;">
            <thead class="thead-dark">
                <tr>

                    <th scope="col">Cod.Despesa</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Empresa</th>
                    <th scope="col">Fornecedor</th>
                    <th scope="col">Total</th>
                    <th scope="col">Data</th>

                    <th scope="col"></th>
                    <th scope="col"></th>
                
                </tr>
            </thead>
            <tbody>
                <tr>



                    @foreach ($Despesas as $row)

                    <td>{{ $row->id }}</td>

                    <td>{{ $row->Descricao }}</td>
                 
                    <td>{{ $row->Razaoe}}</td>
                    <td>{{ $row->Razaof}}</td>
                    <td>{{ $row->Total}}</td>
                    <td>{{ $row->Datarecebimento}}</td>

    


                    <td>

                        <form action="/Despesas/Ver/{{ $row->id }}" method="get">
                            <input class="btn btn-dark" name="" type="submit" Value='Editar'>
                        </form>

                    </td>
                    <td>
                        <form action="/Despesas/Delete/{{ $row->id }}" method="get">
                            <input class="btn btn-danger" name="" type="submit" Value='Excluir'>
                        </form>
                    </td>




                </tr>
                @endforeach
                <script></script>



</body>

{{ $Despesas->links() }}

@include('footer')

</html>