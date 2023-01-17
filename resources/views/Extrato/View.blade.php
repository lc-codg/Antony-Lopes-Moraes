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

    <div class='form-row'>

        <div class="form-group col-md-2">
            <label for="">Data Inicial</label>
            <input type="date" class="form-control" name="DataIni" id="DataIni" value="{{ Date('Y-m-d') }}"
                aria-describedby="helpId" placeholder="">
        </div>

        <div class="form-group col-md-2">
            <label for="">Data Final</label>
            <input type="date" class="form-control" name="DataFim" id='DataFim' value="{{ Date('Y-m-d') }}"
                aria-describedby="helpId" placeholder="">
        </div>


        <div class="form-group col-md-4">
            <label for="">Conta Bancária</label>
            <select class="form-control" name="Conta" id="Conta">
                @foreach ($Contas as $C)
                    <option selected>{{ $C->id }}- {{ $C->Descricao }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group col-md-3">
            <input class="btn btn-primary" name="" id='Bot' type="button" onclick="Extrato();"
                Value='Pesquisar' aria-describedby="helpId" placeholder="">
        </div>

    </div>
    <div id='Totais'>
    </div>


    <table id="tabelaPedidos" class="table table-bordered table-condensed " style="font-size: 15px; width:100%;">
        <thead class="thead-DARK">
            <tr>
                <th scope="col">Código Crédito</th>
                <th scope="col">Descrição</th>
                <th scope="col">Valor</th>
                <th scope="col">Data</th>
                <th scope="col">Conta Original</th>
                <th scope="col">Conta</th>
                <th scope="col">Tipo</th>
                <th scope="col">Usuário</th>
                <th scope="col">Empresa</th>
            </tr>
        </thead>
        <tbody id='Creditos'>

    </table>

</body>
<table id="tabelaPedidos" class="table table-bordered table-condensed " style="font-size: 15px; width:100%;">
    <thead class="thead-DARK">
        <tr>
            <th scope="col">Código Débito</th>
            <th scope="col">Descrição</th>
            <th scope="col">Valor</th>
            <th scope="col">Data</th>
            <th scope="col">Conta Original</th>
            <th scope="col">Conta</th>
            <th scope="col">Tipo</th>
            <th scope="col">Usuário</th>
            <th scope="col">Empresa</th>
        </tr>
    </thead>
    <tbody id='Debitos'>

</table>

</body>


@include('footer')


<script src="{{ asset('js/Extrato.js') }}"></script>

</html>
