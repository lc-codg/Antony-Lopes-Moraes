<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link href="{{ URL::asset('css/app.css') }}" rel="stylesheet" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('Header')
</head>

<body>

    <div id='container' class='.container-fluid'>
        <div id='container' class='.container-fluid'>
            <p>
                <h4 class="card-title">Lançar Estoque Atual</h4>
                <form method='post' id='form'action='/Balanco/Cadastrar'>

                    <div class='form-row'>
                        @csrf
                        <div class="form-group md col-2">
                            <label for="">Data</label>
                            <input type="date" class="form-control" name="Data" value='{{ Date('Y-m-d') }}'
                                id="Data" aria-describedby="helpId" placeholder="">
                        </div>

                        <div class="form-group md col-2">
                            <label for="">Total</label>
                            <input type="number" pattern="[0-9]+([,\.][0-9]+)?" min="0" step="any"
                                class="form-control" name="Valor" id="Valor" aria-describedby="helpId"
                                placeholder="">
                        </div>

                        <div class="form-group md col-6">
                            <label for="">Empresa</label>
                            <select class="form-control " name="CodEmpresa" id="CodEmpresa">
                                <option selected> Selecione... </option>
                                @foreach ($Empresas as $row)
                                    <option>{{ $row->id }}- {{ $row->Razao }}</option>
                                @endforeach
                            </select>
                        </div>


                    </div>
                    <input name="Salvar" id="" class="btn btn-dark" type="button" onclick="Validar();"
                        value="Salvar">
                </form>
            </div>
        </div>
    </div>
    <h5></h5>



    <script src="{{ asset('js/Balanco.js') }}"></script>
</body>
@include('footer')

</html>
