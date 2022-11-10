<link href="/css/app.css" rel="stylesheet">


<!DOCTYPE html>
<html lang="en">
@include('Header')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <div class='.container-fluid ' id='c2'>
        <br>
        <h5>Extrato</h5>
</head>

<body>
    <form method='get' action='/Extrato/View'>

        <div class='form-row'>

            <div class="form-group col-md-2">
                <label for="">Data Inicial</label>
                <input type="date" class="form-control" name="DataIni" id="" value="{{ Date('Y-m-d') }}"
                    aria-describedby="helpId" placeholder="">
            </div>

            <div class="form-group col-md-2">
                <label for="">Data Final</label>
                <input type="date" class="form-control" name="DataFim" value="{{ Date('Y-m-d') }}" id=""
                    aria-describedby="helpId" placeholder="">
            </div>

            <div class="form-group col-md-3">
                <input class="btn btn-primary" name="" id='Bot' type="submit" Value='Pesquisar'
                    aria-describedby="helpId" placeholder="">
            </div>

        </div>

        <div class="btn-group">
            <button id='h7' type="button" class="btn btn-dark  btn-xs"></button>



        </div>

    <table id="tabelaPedidos" class="table table-bordered table-condensed " style="font-size: 15px; width:100%;">
        <thead class="thead-DARK">
            <tr>
                <th scope="col">Código</th>
                <th scope="col">Valor</th>
                <th scope="col">Data</th>
                <th scope="col">Conta Original</th>
                <th scope="col">Conta</th>
                <th scope="col">Tipo</th>
                <th scope="col">Usuário</th>
                <th scope="col" >Empresa</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                @foreach ($Extrato as $row)

                <td>{{ $row->id }}</td>
                <td class='price'>{{ $row->valor }}</td>
                <td>{{ $row->data }}</td>
                <td>{{ $row->id_original}}</td>
                <td>{{ $row->conta }}</td>
                <td>{{ $row->pessoa }}</td>
                <td>{{ $row->usuario }}</td>
                <td>{{$row->CodEmpresa}}</td>
    
              
            </tr>
            @endforeach
            <script></script>



</body>


@include('footer')
{{ $Extrato->links() }}

<script src="{{ asset('js/Extrato.js') }}"></script>
</html>