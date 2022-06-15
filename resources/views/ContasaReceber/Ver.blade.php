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
        <form method='get' action='/ContasaReceber/Editar/{{$ContasaReceber->id}}'>
            <div class='form-row'>

                @csrf
                <div class="form-group md col-6">
                    <label for="">Empresa</label>
                    <select class="form-control " name="CodEmpresa" id="">
                    <option selected>{{$ContasaReceber->CodEmpresa}}</option>
                        @foreach ($Empresas as $row)
                          <option >{{$row->id}}- {{$row->Razao}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group md col-6">
                    <label for="">Cliente</label>
                    <select class="form-control" name="CodCliente" id="">
                      <option>{{$ContasaReceber->CodCliente}}</option>
                        @foreach ($Cliente as $RowF)
                          <option >{{$RowF->id}}- {{$RowF->Nome}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group md col-12">
                    <label for="">Descrição</label>
                    <input type="text" value= '{{$ContasaReceber->Descricao}}' class="form-control" name="Descricao" id="" aria-describedby="helpId" placeholder="">
                </div>

                <div class="form-group md col-12">
                    <label for="">Código da Boleta</label>
                    <input type="number" value= '{{$ContasaReceber->Barras}}' class="form-control" name="Barras" id="" aria-describedby="helpId" placeholder="">
                </div>

            </div>

            <div class='form-row'>

                <div class="form-group md col-8">
                    <label for="">Nota Fiscal</label>
                    <input type="number" value= '{{$ContasaReceber->NotaFiscal}}' class="form-control" name="NotaFiscal" id="" aria-describedby="helpId" placeholder="">
                </div>

                <div class="form-group md col-4">
                    <label for="">Série</label>
                    <input type="number" value= '{{$ContasaReceber->Serie}}' class="form-control" name="Serie" id="" aria-describedby="helpId" placeholder="">
                </div>

                <div class="form-group md col-2">
                    <label for="">Vencimento</label>
                    <input type="date" value= '{{$ContasaReceber->Vencimento}}' class="form-control" name="Vencimento" id="" aria-describedby="helpId" placeholder="">
                </div>

                <div class="form-group md col-2">
                    <label for="">Data Recebimento</label>
                    <input type="date" class="form-control" value= '{{$ContasaReceber->Datarecebimento}}'  name="Datarecebimento" id="" aria-describedby="helpId" placeholder="">
                </div>

                <div class="form-group md col-2">
                    <label for="">Data emissão</label>
                    <input type="date" class="form-control" value= '{{$ContasaReceber->Dataemissao}}'  name="Dataemissao" id="" aria-describedby="helpId" placeholder="">
                </div>

            </div>

            <br>

            <div class='form-row'>

                <div class="form-group md col-2">
                    <label for="">Total</label>
                    <input type="number" value= '{{$ContasaReceber->Total}}' pattern="[0-9]+([,\.][0-9]+)?" min="0" step="any" class="form-control" name="Total" id="" aria-describedby="helpId" placeholder="">
                </div>

                <div class="form-group md col-2">
                    <label for="">Total Desconto</label>
                    <input type="number" value= '{{$ContasaReceber->TotalDesconto}}' pattern="[0-9]+([,\.][0-9]+)?" min="0" step="any" class="form-control" name="TotalDesconto" id="" aria-describedby="helpId" placeholder="">
                </div>

                <div class="form-group md col-2">
                    <label for="">Total Acréscimo</label>
                    <input type="number" value= '{{$ContasaReceber->TotalAcréscimo}}' pattern="[0-9]+([,\.][0-9]+)?" min="0" step="any" class="form-control" name="TotalAcrescimo" id="" aria-describedby="helpId" placeholder="">
                </div>

                <div class="form-group md col-2">
                    <label for="">Total Final</label>
                    <input type="number" pattern="[0-9]+([,\.][0-9]+)?" min="0" step="any" class="form-control" name="TotalFinal" id="" aria-describedby="helpId" placeholder="">
                </div>

                <div class="form-group md col-2">
                    <label for="">Parcelas</label>
                    <input type="number" value= '{{$ContasaReceber->Parcelas}}' class="form-control" name="Parcelas" id="" aria-describedby="helpId" placeholder="">
                </div>

                <div class="form-group md col-2">
                    <label for="">Quantidade de boletas</label>
                    <input type="number" value= '{{$ContasaReceber->Boleta}}' class="form-control" name="boleta" id="" aria-describedby="helpId" placeholder="">
                </div>

            </div>

            <div class='form-row'>

                <div class="form-group md col-4">
                    <label for="">Grupo</label>
                    <select class="form-control" name="CodGrupo" id="">
                        <option>{{$ContasaReceber->CodGrupo}}</option>
                        <option>1- Contas Fixas</option>
                        <option>2- Contas Avulsas</option>
                    </select>
                </div>

                <div class="form-group md col-4">
                    <label for="">Sub.Grupo</label>
                    <select class="form-control" name="SubGrupo" id="">
                        <option>{{$ContasaReceber->CodSubGrupo}}</option>
                        <option>1- Contas</option>
                        <option>2- Despesas</option>
                    </select>
                </div>


            </div>


            <input name="Salvar" id="" class="btn btn-dark" type="submit" value="Salvar">


        </form>

    </div>

    </div>

</body>
@include('footer')

</html>