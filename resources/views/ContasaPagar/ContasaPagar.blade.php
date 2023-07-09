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

        @if ($Tipo === "prazo")
        <h5>Lançar compras a Prazo</h5>
        @elseif($Tipo === "vista")
        <h5>Lançar compras a Vista</h5>
        @elseif($Tipo === "transferencia")
        <h5>Lançar Transferências</h5>
        @else
        <h5>Cadastro de Contas a Pagar</h5>
        @endif
        <form method='post' action='/ContasaPagar/Salvar' id='Form'>
            <div class='form-row'>
                @csrf

                <div class="form-group md col-4">
                    <label for="">Empresa</label>
                    <select class="form-control " name="CodEmpresa" id="Empresa">
                        <option selected>Selecione...</option>
                        @foreach ($Empresas as $row)
                        <option>{{ $row->id }}- {{ $row->Razao }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group md col-4">
                    <label for="">Fornecedor</label>
                    <select class="form-control" name="CodFornecedor" id="Fornecedor">
                        <option selected>Selecione...</option>
                        @foreach ($Fornecedor as $RowF)
                        <option>{{ $RowF->id }}- {{ $RowF->Nome }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group md col-4">
                    <label for="">Descrição</label>
                    <input type="text" class="form-control" name="Descricao" id="Descricao" aria-describedby="helpId" placeholder="">
                </div>

                <div class="form-group md col-4">
                    <label for="">Código da Boleta</label>
                    <input type="number" class="form-control" name="Barras" id="" aria-describedby="helpId" placeholder="">
                </div>
                <div class="form-group md col-4">
                    <label for="">Nota Fiscal</label>
                    <input @if($Tipo=='prazo' ) required @endif type="number" class="form-control" name="NotaFiscal" id="" aria-describedby="helpId" placeholder="">
                </div>

                <div class="form-group md col-4">
                    <label for="">Série</label>
                    <input type="number" class="form-control" name="Serie" id="" aria-describedby="helpId" placeholder="">
                </div>

            </div>

            <div class='form-row'>




                <div class="form-group md col-2">
                    <label for="">Data</label>
                    <input type="date" class="form-control" value="{{ date('Y-m-d') }}" name="Datarecebimento" id="" aria-describedby="helpId" placeholder="">
                </div>


                @if ($Tipo === "conta")
                <div class="form-group md col-3">
                    <label for="">Grupo</label>
                    <select class="form-control" name="CodGrupo" id="Grupo">
                        <option selected>Selecione...</option>
                        @foreach($Categoria as $Cat)
                        <option>{{$Cat->id}}-{{$Cat->descricao}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group md col-3">
                    <label for="">Sub.Grupo</label>
                    <select class="form-control" name="SubGrupo" id="SubGrupo">
                        <option selected>Selecione...</option>
                        @foreach($SubCategoria as $Sub)
                        <option>{{$Sub->id}}-{{$Sub->descricao}}</option>
                        @endforeach
                    </select>
                </div>
                @endif

            </div>

            <div class='form-row'>
                <label @if($Tipo<>'conta')  hidden @endif style='margin-left:2%' class="form-check-label">

                    <input @if($Tipo=='prazo' ) checked hidden  @elseif ($Tipo=='vista' ) readonly unchecked hidden @endif onclick='Prazo();' type="checkbox" class="form-check-input" name="Tipo" id="Tipo" value="V" unchecked>
                    A Prazo
                </label>

                <label @if($Tipo=='conta' ) hidden unchecked @endif @if($Tipo<>'conta' ) hidden checked @endif style='margin-left:3%' class="form-check-label">
                    <input @if($Tipo=='conta' ) hidden unchecked @endif @if($Tipo<>'conta' ) hidden  @endif type="checkbox" class="form-check-input" name="Compra" id="Tipo" value="S" checked>
                    Compra
                </label>
            </div>
            <br>

            <div class='form-row'>

                <div class="form-group md col-2">
                    <label for="">Total</label>
                    <input type="number" pattern="[0-9]+([,\.][0-9]+)?" min="0" step="any" class="form-control" onkeyup='Conta();' name="TotalFinal" id="Total" aria-describedby="helpId" placeholder="">
                </div>

                <div class="form-group md col-2">
                    <label for="">Total Desconto</label>
                    <input type="number" pattern="[0-9]+([,\.][0-9]+)?" min="0" step="any" class="form-control" onkeyup='Conta();' name="TotalDesconto" id="Desconto" aria-describedby="helpId" placeholder="" value=''>
                </div>

                <div class="form-group md col-2">
                    <label for="">Total Acréscimo</label>
                    <input type="number" pattern="[0-9]+([,\.][0-9]+)?" min="0" step="any" class="form-control" onkeyup='Conta();' name="TotalAcrescimo" id="Acrescimo" aria-describedby="helpId" placeholder="" value=''>
                </div>

                <div class="form-group md col-2">
                    <label for="">Total Final</label>
                    <input type="number" pattern="[0-9]+([,\.][0-9]+)?" min="0" step="any" class="form-control" name="Total" readOnly id="Final" aria-describedby="helpId" placeholder="">
                </div>

                <div class="form-group md col-2">
                    <label for="">Parcelas</label>
                    <input type="number" class="form-control" name="Parcelas" id="Parcela" aria-describedby="helpId" value='1' readOnly placeholder="">
                </div>

                <div class="form-group md col-2">
                    <label for="">Quantidade de boletas</label>
                    <input type="number" class="form-control" readOnly name="boleta" id="Boleta" aria-describedby="helpId" value='1' placeholder="">
                </div>

            </div>


            <input hidden id='' value='{{$Tipo}}' name='TipoDeCompra'></input>

            <input name="Salvar" id="button" onclick='ValidarContasAPagar();' class="btn btn-dark" type="button" value="Salvar">


        </form>

    </div>

    </div>



</body>
<script src="{{ asset('js/app.js') }}"></script>
<br><br><br>
@include('footer')

</html>
