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

        <h5>Outros Lançamentos</h5>

        <form method='post' action='/Outros/Salvar'>

            <div class='form-row'>

                @csrf

                <div class="form-group md col-6">
                    <label for="">Empresa</label>
                    <select class="form-control " name="CodEmpresa" id="">
                        @foreach ($Empresas as $row)
                        <option selected>{{$row->id}}- {{$row->Razao}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group md col-6">
                    <label for="">Conta Bancária</label>
                    <select class="form-control" name="Conta" id="">
                        @foreach ($Contas as $C)
                        <option selected>{{$C->id}}- {{$C->Descricao}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group md col-12">
                    <label for="">Descrição</label>
                    <input type="text" autocomplete=off class="form-control" name="Descricao" id="" aria-describedby="helpId" placeholder="">
                </div>

            </div>


            <div class='form-row'>


                <div class="form-group md col-2">
                    <label for="">Total</label>
                    <input type="number" pattern="[0-9]+([,\.][0-9]+)?" min="0" step="any" class="form-control" name="Total" id="" aria-describedby="helpId" placeholder="">
                </div>


                <div class="form-group md col-4">
                    <label for="">Tipo</label>
                    <select class="form-control" name="Tipo" id="">
                        <option>Débito</option>
                        <option selected>Crédito</option>
                    </select>
                </div>

                <div class="form-group md col-12">
                    <label for="">Identificação</label>
                    <input type="text" autocomplete=off class="form-control" name="boleta" id="" aria-describedby="helpId" placeholder="">
                </div>

                <div class="form-group md col-2">
                    <label for="">Data Recebimento</label>
                    <input type="date" class="form-control" value="{{date('Y-m-d')}}" name="Datarecebimento" id="" aria-describedby="helpId" placeholder="">
                </div>

            </div>

            <br>

            <input name="Salvar" id="" class="btn btn-dark" type="submit" value="Salvar">



    </div>





    </form>

    </div>

    </div>

</body>
@include('footer')

</html>