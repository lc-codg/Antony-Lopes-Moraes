@include ('Header')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/css/app.css" rel="stylesheet">
</head>

<body>

    <div id='container' class='.container-fluid'>

        <h5>Informar arrecadação</h5>

        <form action='/Arrecadacao/Salvar' method='post'>
        @csrf
            <div class='form-row'>

                <div class="form-group md col-2">
                    <label for="">Empresa</label>
                    <select class="form-control" name="codempresa" id="">
                        @foreach($Empresa as $rowE)
                        <option>{{$rowE->id}}- {{$rowE->Razao}}</option>
                        @endforeach
                    </select>
                </div>


                <div class="form-group md col-10">
                    <label for="">Descrição</label>
                    <input type="text" class="form-control" name="Descricao" id="" aria-describedby="helpId" placeholder="">
                </div>
            </div>


            <div class='form-row'>
                <div class="form-group md col-2">
                    <label for="">Valor</label>
                    <input type="text" class="form-control" name="Valor" id="" aria-describedby="helpId" placeholder="">
                </div>

                <div class="form-group md col-2">
                    <label for="">Data</label>
                    <input type="date" class="form-control" name="Data" id="" aria-describedby="helpId" placeholder="">
                </div>
                <div class="form-group md col-8">
                    <label for="">Indenfificação</label>
                    <input type="text" class="form-control" name="Numero" id="" aria-describedby="helpId" placeholder="">
                </div>

                <input name="Salvar" id="Bot" class="btn btn-dark" type="submit" value="Salvar">

            </div>



        </form>

    </div>


</body>

</html>