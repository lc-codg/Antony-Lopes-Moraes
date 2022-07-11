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

        <h5>Cadastro de Receitas</h5>
        <form method='post' action='/Receitas/Salvar'>
            <div class='form-row'>

                @csrf
                <div class="form-group md col-4">
                    <label for="">Empresa</label>
                    <select class="form-control " name="CodEmpresa" id="">
                        @foreach ($Empresas as $row)
                        <option selected>{{$row->id}}- {{$row->Razao}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group md col-4">
                    <label for="">Cliente</label>
                    <select class="form-control" name="CodCliente" id="">
                        @foreach ($Cliente as $RowF)
                        <option selected>{{$RowF->id}}- {{$RowF->Nome}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group md col-4">
                    <label for="">Conta Bancária</label>
                    <select class="form-control" name="Conta" id="">
                        @foreach ($Contas as $C)
                        <option selected>{{$C->id}}- {{$C->Descricao}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group md col-12">
                    <label for="">Descrição</label>
                    <input autocomplete="off" type="text" class="form-control" name="Descricao" id="" aria-describedby="helpId" placeholder="">
                </div>

                <div class="form-group md col-12">
                    <label for="">Código da Boleta</label>
                    <input autocomplete="off" type="number" class="form-control" name="Barras" id="" aria-describedby="helpId" placeholder="">
                </div>

            </div>

            <div class='form-row'>

                <div class="form-group md col-8">
                    <label for="">Nota Fiscal</label>
                    <input type="number" class="form-control" name="NotaFiscal" id="" aria-describedby="helpId" placeholder="">
                </div>

                <div class="form-group md col-4">
                    <label for="">Série</label>
                    <input type="number" class="form-control" name="Serie" id="" aria-describedby="helpId" placeholder="">
                </div>

                <div class="form-group md col-2">
                    <label for="">Vencimento</label>
                    <input type="date" class="form-control" value="{{date('Y-m-d')}}" name="Vencimento" id="" aria-describedby="helpId" placeholder="">
                </div>

                <div class="form-group md col-2">
                    <label for="">Data da Entrada</label>
                    <input type="date" class="form-control" value="{{date('Y-m-d')}}" name="Recebimento" id="" aria-describedby="helpId" placeholder="">
                </div>


            </div>

            <br>

            <div class='form-row'>

                <div class="form-group md col-2">
                    <label for="">Total</label>
                    <input type="number" pattern="[0-9]+([,\.][0-9]+)?" min="0" step="any" class="form-control" name="Total" id="" aria-describedby="helpId" placeholder="">
                </div>

                <div class="form-group md col-2">
                    <label for="">Total Desconto</label>
                    <input type="number" pattern="[0-9]+([,\.][0-9]+)?" min="0" step="any" class="form-control" name="TotalDesconto" id="" aria-describedby="helpId" placeholder="">
                </div>

                <div class="form-group md col-2">
                    <label for="">Total Acréscimo</label>
                    <input type="number" pattern="[0-9]+([,\.][0-9]+)?" min="0" step="any" class="form-control" name="TotalAcrescimo" id="" aria-describedby="helpId" placeholder="">
                </div>

                <div class="form-group md col-2">
                    <label for="">Total Final</label>
                    <input type="number" pattern="[0-9]+([,\.][0-9]+)?" min="0" step="any" class="form-control" name="TotalFinal" id="" aria-describedby="helpId" placeholder="">
                </div>

                <div class="form-group md col-2">
                    <label for="">Parcelas</label>
                    <input type="number" class="form-control" name="Parcelas" id="" aria-describedby="helpId" placeholder="">
                </div>

                <div class="form-group md col-2">
                    <label for="">Quantidade de boletas</label>
                    <input type="number" class="form-control" name="boleta" id="" aria-describedby="helpId" placeholder="">
                </div>

            </div>

            <input name="Salvar" id="" class="btn btn-dark" type="submit" value="Salvar">


        </form>

    </div>

    </div>

</body>
@include('footer')

</html>