<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('Header')
</head>

<body>
    <div class='. container-fluid'>
        <br>
        <h4 class="card-title">Relatório de Despesas</h4>
        <div class='form-row'>
            <div class="form-group md col-2">
                <label for="">Data inicial</label>
                <input type="date" class="form-control" value="{{ Date('Y-m-d') }}" name="DataIni" id="DataIni"
                    aria-describedby="helpId" placeholder="">
            </div>

            <div class="form-group md col-2">
                <label for="">Data final</label>
                <input type="date" class="form-control" value="{{ Date('Y-m-d') }}" name="DataFim" id="DataFim"
                    aria-describedby="helpId" placeholder="">
            </div>

            <div class="form-group col-md-3">
                <input class="btn btn-primary" style='margin-top: 30px;'name="" id='Bot' type="button" onclick="DespesaCategoria();" Value='Pesquisar' aria-describedby="helpId" placeholder="">
            </div>

        </div>


        <table id="tabelaPedidos" class="table table-bordered table-condensed " style="font-size: 12px; width:100%;">

            <thead class="thead-dark">
                <tr>
                    <th>Código</th>
                    <th>Descrição</th>
                    <th>Data</th>

                </tr>
            </thead>
            <tbody id='Despesas'>


        </table>

    </div>

</body>
@include('footer')
<script src="{{ asset('js/Despesa.js') }}"></script>

</html>
