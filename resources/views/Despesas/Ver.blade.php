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
        <form method='get' action='/Despesas/Editar/{{$Despesas->id}}'>
            <div class='form-row'>

                @csrf
                <div class="form-group md col-6">
                    <label for="">Empresa</label>
                    <select class="form-control " name="CodEmpresa" id="">
                    <option selected>{{$Despesas->CodEmpresa}}</option>
                        @foreach ($Empresas as $row)
                          <option >{{$row->id}}- {{$row->Razao}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group md col-6">
                    <label for="">Fornecedor</label>
                    <select class="form-control" name="CodFornecedor" id="">
                      <option>{{$Despesas->CodFornecedor}}</option>
                        @foreach ($Fornecedor as $RowF)
                          <option >{{$RowF->id}}- {{$RowF->Nome}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group md col-12">
                    <label for="">Descrição</label>
                    <input type="text" value= '{{$Despesas->Descricao}}' class="form-control" name="Descricao" id="" aria-describedby="helpId" placeholder="">
                </div>


            </div>

            <div class='form-row'>

                <div class="form-group md col-8">
                    <label for="">Nota Fiscal</label>
                    <input type="number" value= '{{$Despesas->NotaFiscal}}' class="form-control" name="NotaFiscal" id="" aria-describedby="helpId" placeholder="">
                </div>


                <div class="form-group md col-2">
                    <label for="">Data Recebimento</label>
                    <input type="date" class="form-control" value= '{{$Despesas->Datarecebimento}}'  name="Datarecebimento" id="" aria-describedby="helpId" placeholder="">
                </div>

                <div class="form-group md col-2">
                    <label for="">Data emissão</label>
                    <input type="date" class="form-control" value= '{{$Despesas->Dataemissao}}'  name="Dataemissao" id="" aria-describedby="helpId" placeholder="">
                </div>

            </div>

            <br>

            <div class='form-row'>

                <div class="form-group md col-2">
                    <label for="">Total</label>
                    <input type="number" value= '{{$Despesas->Total}}' pattern="[0-9]+([,\.][0-9]+)?" min="0" step="any" class="form-control" name="Total" id="" aria-describedby="helpId" placeholder="">
                </div>

                <div class="form-group md col-2">
                    <label for="">Total Desconto</label>
                    <input type="number" value= '{{$Despesas->TotalDesconto}}' pattern="[0-9]+([,\.][0-9]+)?" min="0" step="any" class="form-control" name="TotalDesconto" id="" aria-describedby="helpId" placeholder="">
                </div>

                <div class="form-group md col-2">
                    <label for="">Total Acréscimo</label>
                    <input type="number" value= '{{$Despesas->TotalAcréscimo}}' pattern="[0-9]+([,\.][0-9]+)?" min="0" step="any" class="form-control" name="TotalAcrescimo" id="" aria-describedby="helpId" placeholder="">
                </div>

                <div class="form-group md col-2">
                    <label for="">Total Final</label>
                    <input type="number" pattern="[0-9]+([,\.][0-9]+)?" min="0" step="any" class="form-control" name="TotalFinal" id="" aria-describedby="helpId" placeholder="">
                </div>

              

            </div>

            <div class='form-row'>

                <div class="form-group md col-4">
                    <label for="">Grupo</label>
                    <select class="form-control" name="CodGrupo" id="">
                        <option selected>{{$Despesas->CodGrupo}}</option>
                        @foreach ($Categoria as $RowCat)
                        <option>{{$RowCat->id .' - '. $RowCat->descricao}}</option>
                        @endforeach
                           
                    </select>
                </div>

                <div class="form-group md col-4">
                    <label for="">Sub.Grupo</label>
                    <select class="form-control" name="SubGrupo" id="">
                        <option selected>{{$Despesas->CodSubGrupo}}</option>
                        @foreach ($Sub as $RowSub)
                        <option>{{$RowSub->id .' - '. $RowSub->descricao}}</option>
                        @endforeach
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