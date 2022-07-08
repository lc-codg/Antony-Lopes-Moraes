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

        <h5>Editar de Conta a Pagar</h5>
        <form method='get' action='/Receitas/Editar/{{$Receitas->id}}'>
            <div class='form-row'>

                @csrf
                <div class="form-group md col-6">
                    <label for="">Empresa</label>
                    <select class="form-control " name="CodEmpresa" id="">
                    <option selected>{{$Receitas->CodEmpresa}}</option>
                        @foreach ($Empresas as $row)
                          <option >{{$row->id}}- {{$row->Razao}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group md col-6">
                    <label for="">Cliente</label>
                    <select class="form-control" name="CodCliente" id="">
                        @foreach ($Cliente as $RowF)
                        <option selected>{{$RowF->id}}- {{$RowF->Nome}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group md col-12">
                    <label for="">Descrição</label>
                    <input autocomplete="off" type="text" value= '{{$Receitas->Descricao}}' class="form-control" name="Descricao" id="" aria-describedby="helpId" placeholder="">
                </div>

                <div class="form-group md col-12">
                    <label for="">Código da Boleta</label>
                    <input autocomplete="off" type="number" value= '{{$Receitas->Boleta}}' class="form-control" name="Barras" id="" aria-describedby="helpId" placeholder="">
                </div>

            </div>

            <div class='form-row'>

                <div class="form-group md col-8">
                    <label for="">Nota Fiscal</label>
                    <input autocomplete="off" type="number" value= '{{$Receitas->NotaFiscal}}' class="form-control" name="NotaFiscal" id="" aria-describedby="helpId" placeholder="">
                </div>

                <div class="form-group md col-4">
                    <label for="">Série</label>
                    <input autocomplete="off" type="number" value= '{{$Receitas->Serie}}' class="form-control" name="Serie" id="" aria-describedby="helpId" placeholder="">
                </div>

                <div class="form-group md col-2">
                    <label for="">Vencimento</label>
                    <input type="date" value= '{{$Receitas->Vencimento}}' class="form-control" name="Vencimento" id="" aria-describedby="helpId" placeholder="">
                </div>

                <div class="form-group md col-2">
                    <label for="">Data Recebimento</label>
                    <input type="date" class="form-control" value= '{{$Receitas->DataDaEntrada}}'  name="Recebimento" id="" aria-describedby="helpId" placeholder="">
                </div>


            </div>

            <br>

            <div class='form-row'>

                <div class="form-group md col-2">
                    <label for="">Total</label>
                    <input type="number" value= '{{$Receitas->Total}}' pattern="[0-9]+([,\.][0-9]+)?" min="0" step="any" class="form-control" name="Total" id="" aria-describedby="helpId" placeholder="">
                </div>

                <div class="form-group md col-2">
                    <label for="">Total Desconto</label>
                    <input type="number" value= '{{$Receitas->TotalDesconto}}' pattern="[0-9]+([,\.][0-9]+)?" min="0" step="any" class="form-control" name="TotalDesconto" id="" aria-describedby="helpId" placeholder="">
                </div>

                <div class="form-group md col-2">
                    <label for="">Total Acréscimo</label>
                    <input type="number" value= '{{$Receitas->TotalAcréscimo}}' pattern="[0-9]+([,\.][0-9]+)?" min="0" step="any" class="form-control" name="TotalAcrescimo" id="" aria-describedby="helpId" placeholder="">
                </div>

                <div class="form-group md col-2">
                    <label for="">Total Final</label>
                    <input type="number" pattern="[0-9]+([,\.][0-9]+)?" min="0" step="any" class="form-control" name="TotalFinal" id="" aria-describedby="helpId" placeholder="">
                </div>

                <div class="form-group md col-2">
                    <label for="">Parcelas</label>
                    <input type="number" value= '{{$Receitas->Parcelas}}' class="form-control" name="Parcelas" id="" aria-describedby="helpId" placeholder="">
                </div>

                <div class="form-group md col-2">
                    <label for="">Quantidade de boletas</label>
                    <input type="number" value= '{{$Receitas->Boleta}}' class="form-control" name="boleta" id="" aria-describedby="helpId" placeholder="">
                </div>

            </div>


            <input name="Salvar" id="" class="btn btn-dark" type="submit" value="Salvar">


        </form>

    </div>

    </div>

</body>
@include('footer')

</html>