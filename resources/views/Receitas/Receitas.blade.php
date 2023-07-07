<!DOCTYPE html>
<html lang="en">
<link href="{{ URL::asset('css/app.css') }}" rel="stylesheet" type="text/css">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include ('Header')
</head>

<body>

    <div id='container' class='.container-fluid'>

        <h5>Cadastro Tranferências</h5>
        <form id='Form'method='post' action='/Receitas/Salvar'>
            <div class='form-row'>

                @csrf
                <div class="form-group md col-4">
                    <label for="">Empresa</label>
                    <select class="form-control " name="CodEmpresa" id="Empresa">
                    <option selected>Selecione...</option>
                        @foreach ($Empresas as $row)
                        <option >{{$row->id}}- {{$row->Razao}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group md col-4">
                    <label for="">Cliente</label>
                    <select class="form-control" name="CodCliente" id="Cliente">
                    <option selected>Selecione...</option>
                        @foreach ($Cliente as $RowF)
                        <option >{{$RowF->id}}- {{$RowF->Nome}}</option>
                        @endforeach
                    </select>
                </div>



                <div class="form-group md col-12">
                    <label for="">Descrição</label>
                    <input autocomplete="off" type="text" class="form-control" name="Descricao" id="Descricao" aria-describedby="helpId" placeholder="">
                </div>



            </div>

            <div class='form-row'>




                <div class="form-group md col-2">
                    <label for="">Data</label>
                    <input type="date" class="form-control" value="{{date('Y-m-d')}}" name="Datarecebimento" id="" aria-describedby="helpId" placeholder="">
                </div>


            </div>

            <br>

            <div class='form-row'>

                <div class="form-group md col-2">
                    <label for="">Total</label>
                    <input type="number" onkeyup="Totalizar();" pattern="[0-9]+([,\.][0-9]+)?" min="0" step="any" class="form-control" name="Total" id="Total" aria-describedby="helpId" placeholder="">
                </div>

                <div class="form-group md col-2">
                    <label for="">Total Desconto</label>
                    <input type="number" onkeyup="Totalizar();" pattern="[0-9]+([,\.][0-9]+)?" min="0" step="any" class="form-control" name="TotalDesconto" id="Desconto" aria-describedby="helpId" placeholder="">
                </div>

                <div class="form-group md col-2">
                    <label for="">Total Acréscimo</label>
                    <input type="number" onkeyup="Totalizar();" pattern="[0-9]+([,\.][0-9]+)?" min="0" step="any" class="form-control" name="TotalAcrescimo" id="Acrescimo" aria-describedby="helpId" placeholder="">
                </div>

                <div class="form-group md col-2">
                    <label for="">Total Final</label>
                    <input type="number" pattern="[0-9]+([,\.][0-9]+)?" min="0" step="any" class="form-control" name="TotalFinal" id="Totalizado" aria-describedby="helpId" placeholder="">
                </div>



            </div>

            <input name="Salvar" id="" class="btn btn-dark" type="button" onclick="Verifica();" value="Salvar">


        </form>

    </div>

    </div>
    <script src="{{ asset('js/Receitas.js') }}"></script>
</body>
@include('footer')

</html>
