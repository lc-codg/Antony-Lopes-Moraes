<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ URL::asset('css/app.css') }}" rel="stylesheet" type="text/css">
    @include('Header')
</head>

<body>
    <div id='container' class='.container-fluid'>
        <p>


        <h5 class="card-title">Lista de Balanço</h5>

        <div class='form-row'>

            <div class="form-group md col-6">
                <label for="">Empresa</label>
                <select class="form-control " name="CodEmpresa" id="CodEmpresa">
                    <option selected> Selecione...</option>
                    @foreach ($Empresas as $row)
                        <option>{{ $row->id }}- {{ $row->Razao }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group md col-2">
                <label for="">Data Inicial</label>
                <input type="date" class="form-control" name="Datafim" value='{{ Date('Y-m-d') }}' id="Dataini"
                    aria-describedby="helpId" placeholder="">
            </div>

            <div class="form-group md col-2">
                <label for="">Data Final</label>
                <input type="date" class="form-control" name="Dataini" value='{{ Date('Y-m-d') }}' id="Datafim"
                    aria-describedby="helpId" placeholder="">
            </div>

        </div>

        <input name="" id="btn" onclick='Localizar();'class="btn btn-primary" type="button"
            value="Listar">



        <table id="tabelaPedidos" class="table table-bordered table-condensed " style="font-size: 12px; width:100%;">
            <thead class="thead-dark">
                <tr>
                    <th> Código </th>
                    <th> Data </th>
                    <th> Valor </th>
                    <th> Empresa </th>

                </tr>
            </thead>
            <tbody id="enderecos">

        </table>
    </div>
    </div>



</body>
<script src="{{ asset('js/Balanco.js') }}"></script>
@include('footer')

</html>
