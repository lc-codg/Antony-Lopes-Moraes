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

        <h5>Cadastro de Contas a Receber</h5>
        <form method='post' action='/ContasaReceber/Salvar' id='Form'>
            <div class='form-row'>

                @csrf
                <div class="form-group md col-4">
                    <label for="">Empresa</label>
                    <select class="form-control " name="CodEmpresa" id="CodEmpresa">
                        <option selected>Selecione...</option>
                        @foreach ($Empresas as $row)
                            <option>{{ $row->id }}- {{ $row->Razao }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group md col-4">
                    <label for="">Cliente</label>
                    <select class="form-control" name="CodCliente" id="Cliente">
                        <option selected>Selecione...</option>
                        @foreach ($Cliente as $RowF)
                            <option>{{ $RowF->id }}- {{ $RowF->Nome }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group md col-4">
                    <label for="">Descrição</label>
                    <input type="text" class="form-control" name="Descricao" id="" aria-describedby="helpId"
                        placeholder="">
                </div>

                <div class="form-group md col-4">
                    <label for="">Código da Boleta</label>
                    <input type="number" class="form-control" name="Barras" id="" aria-describedby="helpId"
                        placeholder="">
                </div>

                <div class="form-group md col-4">
                    <label for="">Nota Fiscal</label>
                    <input type="number" class="form-control" name="NotaFiscal" id=""
                        aria-describedby="helpId" placeholder="">
                </div>

                <div class="form-group md col-4">
                    <label for="">Série</label>
                    <input type="number" class="form-control" name="Serie" id="" aria-describedby="helpId"
                        placeholder="">
                </div>

            </div>

            <div class='form-row'>



           

                <div class="form-group md col-2">
                    <label for="">Data</label>
                    <input type="date" class="form-control" value="{{ date('Y-m-d') }}" name="Datarecebimento"
                        id="" aria-describedby="helpId" placeholder="">
                </div>

           
                <div class="form-group md col-3">
                    <label for="">Grupo</label>
                    <select class="form-control" name="CodGrupo" id="Grupo">
                        <option selected>Selecione...</option>
                        <option>1- Contas Fixas</option>
                        <option>2- Contas Avulsas</option>
                    </select>
                </div>

                <div class="form-group md col-3">
                    <label for="">Sub.Grupo</label>
                    <select class="form-control" name="SubGrupo" id="SubGrupo">
                        <option selected>Selecione...</option>
                        <option>1- Contas</option>
                        <option>2- Despesas</option>
                    </select>
                </div>

            </div>

            <div class="form-check col md-6">
                <label class="form-check-label">
                    <input onclick='Prazo();' type="checkbox" class="form-check-input" name="Tipo" id="Tipo"
                        value="V" unchecked>
                    A Prazo
                </label>
            </div>
            <P>

            <div class='form-row'>

                <div class="form-group md col-2">
                    <label for="">Total</label>
                    <input type="number" pattern="[0-9]+([,\.][0-9]+)?" min="0" step="any"
                        class="form-control" onkeyup='Conta();' name="TotalFinal" id="Total"
                        aria-describedby="helpId" placeholder="">
                </div>

                <div class="form-group md col-2">
                    <label for="">Total Desconto</label>
                    <input type="number" pattern="[0-9]+([,\.][0-9]+)?" min="0" step="any"
                        class="form-control" onkeyup='Conta();' name="TotalDesconto" id="Desconto"
                        aria-describedby="helpId" placeholder="">
                </div>

                <div class="form-group md col-2">
                    <label for="">Total Acréscimo</label>
                    <input type="number" pattern="[0-9]+([,\.][0-9]+)?" min="0" step="any"
                        class="form-control" onkeyup='Conta();' name="TotalAcrescimo" id="Acrescimo"
                        aria-describedby="helpId" placeholder="">
                </div>

                <div class="form-group md col-2">
                    <label for="">Total Final</label>
                    <input type="number" pattern="[0-9]+([,\.][0-9]+)?" min="0" step="any"
                        class="form-control" readOnly name="Total" id="Final" aria-describedby="helpId"
                        placeholder="">
                </div>

                <div class="form-group md col-2">
                    <label for="">Parcelas</label>
                    <input type="number" value='1'class="form-control" name="Parcelas" id="Parcela"
                        aria-describedby="helpId" readOnly placeholder="">
                </div>

                <div class="form-group md col-2">
                    <label for="">Quantidade de boletas</label>
                    <input type="number" class="form-control" name="boleta" id="Boleta"
                        aria-describedby="helpId" value='1' readOnly placeholder="">
                </div>

            </div>

            <div class='form-row'>




            </div>


            <input name="Salvar" onclick='ValidarContasAReceber();' id="button" class="btn btn-dark"
                type="button" value="Salvar">


        </form>

    </div>

    </div>

</body>
<script src={{ asset('js/app.js') }}></script>
@include('footer')

</html>
