<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ URL::asset('css/app.css') }}" rel="stylesheet" type="text/css">
    @include ('Header')
</head>

<body>
    <div id='container' class='.container-fluid'>
        <p>
     
                <h4 class="card-title">Lista de Categorias</h4>
                <div class='form-row'>
           

                    <div class="form-group md col-3">
                        <label for="">Tipo</label>
                        <select class="form-control" name="Tipo" id="Tipo">
                            <option selected>Selecione...</option>
                            <option>Categoria</option>
                            <option>Sub-Categoria</option>
                        </select>
                    </div>

                </div>
                <input name="Pesquisa" id="Btn" onclick='Localizar();' class="btn btn-dark" type="button"
                    value="Pesquisar">


            


            <table id="tabelaPedidos" class="table table-bordered table-condensed "
                style="font-size: 12px; width:100%;">
                <thead class="thead-dark">
                    <tr>
                        <th>Código</th>
                        <th>Descrição</th>
                        <th>Tipo</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody id='Categorias'>

            </table>
        </div>
   
</body>
<script src="{{ asset('js/Categoria.js') }}"></script>
@include('footer')

</html>
