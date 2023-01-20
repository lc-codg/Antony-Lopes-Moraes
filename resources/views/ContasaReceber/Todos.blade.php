<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('Header')
</head>
<link href="/css/app.css" rel="stylesheet">

<script src="{{ asset('js/Contas.js') }}"></script>
@php        $ContaDados = count($ContasaReceber); @endphp

<body>
    <div id='container' class='.container-fluid'>
        <h5>Contas a Receber</h5>
        <form method='get' action='/ContasaReceber/Todos'>

            <div class='form-row'>

                <div class="form-group col-md-2">
                    <label for="">Data Inicial</label>
                    <input type="date" class="form-control" name="DataIni" id="" value="{{ Date('Y-m-d') }}"
                        aria-describedby="helpId" placeholder="">
                </div>

                <div class="form-group col-md-2">
                    <label for="">Data Final</label>
                    <input type="date" class="form-control" name="DataFim" value="{{ Date('Y-m-d') }}" id=""
                        aria-describedby="helpId" placeholder="">
                </div>

                <div class="form-group md col-3">
                    <label for="">Empresa</label>
                    <select class="form-control" name="Empresa" id="Empresa">
                        <option selected>Selecione...</option>
                        @foreach ($Empresas as $item)
                            <option>{{ $item->id . '-' . $item->Razao }}</option>
                        @endforeach


                    </select>
                </div>

                <div class="form-group col-md-3">
                    <input class="btn btn-primary" name="" id='Bot' type="submit" Value='Pesquisar'
                        aria-describedby="helpId" placeholder="">
                </div>

            </div>
        </form>
        <div class="btn-group">
            <button type="button" id="Pago" class="btn btn-success btn-xs">Pago</button>
            <button type="button" id="Pagar" class="btn btn-warning btn-xs">Em Aberto</button>
            <button type="button" class="btn btn-dark btn-xs">Todos</button>
            <button id='h5' type="button" class="btn btn-primary btn-xs"></button>
            <button id='h6' type="button" class="btn btn-danger  btn-xs"></button>
            <button id='h7' type="button" class="btn btn-ligth btn-xs"></button>
        </div>
        <button id='h8' type="button" class='btn btn-dark btn-xs'>
            <select id='ContaBancaria' onchange="SelecionaContaBancaria({{ $ContaDados }});" class="form-control"
                name="contab" id="">
                <option selected>Selecione</option>
                @foreach ($Contas as $C)
                    <option>{{ $C->id }} - {{ $C->Descricao }}</option>
                @endforeach
            </select>
        </button>


        <table id="tabelaPedidos" class="table table-bordered table-condensed " style="font-size: 15px; width:100%;">
            <thead class="thead-dark">
                <tr>

                    <th scope="col">Código</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Barras</th>
                    <th scope="col">Empresa</th>
                    <th scope="col">Cliente</th>
                    <th scope="col">Total</th>
                    <th scope='col'>Vencimento</th>
                    <th scope='col'>Parcela</th>
                    <th scope='col'>Boleta</th>
                    <th scope='col'>Parcial</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>

                </tr>
            </thead>
            <tbody>
                <tr>

                    @php
                        $IdDados = 0;
                        use App\Http\Controllers\ExtratoController;
                        $VerificaExtrato = new ExtratoController();

                    @endphp


                    @foreach ($ContasaReceber as $row)
                        @php $IdDados++; @endphp

                        <td>{{ $row->id }}</td>

                        @if ($row->status === 0)
                            <td data-estado="Pago" class='DescA'>{{ $row->Descricao }}</td>
                        @else
                            <td data-estado="Pagar" class='DescP'>{{ $row->Descricao }}</td>
                        @endif

                        <td>{{ $row->Barras }}</td>
                        <td>{{ $row->Razaoe }}</td>
                        <td>{{ $row->Razaof }}</td>


                        @if ($row->status === 0)
                            <td class='price2'>R${{ $row->Total }}</td>
                        @else
                            <td class='price'>R${{ $row->Total }}</td>
                        @endif
                        <td>{{ $row->Vencimento }}</td>
                        <td>{{ $row->Parcelas }}</td>
                        <td>{{ $row->Boleta }}</td>


                        <td>
                            <input @if ($row->status === 1) readonly  value='' @endif
                                style='font-size: 12px;width:70px;'type="number" pattern="[0-9]+([,\.][0-9]+)?"
                                min="0" step="any" class="form-control"
                                onkeyup='Parcial({{ $IdDados }});'name="Parcial"
                                id="Parcial{{ $IdDados }}" aria-describedby="helpId" placeholder="">
                        </td>

                        @if ($VerificaExtrato->ConstaNoExtrato($row->id) == false)
                            <td>

                                <form action="/ContasaReceber/Ver/{{ $row->id }}" method="get">
                                    <input class="btn btn-dark" id='btned{{ $IdDados }}'name=""
                                        type="submit" Value='Editar'>
                                </form>

                            </td>


                            <td>
                                <form action="/ContasaReceber/Delete/{{ $row->id }}" method="get">
                                    <input class="btn btn-danger" id='btnd{{ $IdDados }}'name=""
                                        type="submit" Value='Cancelar'>
                                </form>
                            </td>
                        @endif
                        @if ($row->status === 0)
                            <td>
                                <form id='FrmQuitar'action="/ContasaReceber/Validar/" method="get">
                                    <input name='id' hidden value='{{ $row->id }}'>
                                    <input name='tipo' hidden value='Receber'>
                                    <input name='ValorParcial' id='ValorParcial{{ $IdDados }}' hidden
                                        value=''>
                                    <input name='Valor' hidden value='{{ $row->Total }}'>
                                    <input hidden name='conta' value='' id="conta{{ $IdDados }}">
                                    <input
                                        onclick='QuitarContasAReceber({{ $row->id }},{{ $IdDados }},
                                    {{ $row->Total }},{{ $row->CodEmpresa }});'class="btn btn-primary"
                                        name="" id='btnq{{ $IdDados }}' type="button" Value='Receber'>

                            </td>






                            </form>
                        @else
                            <td>
                                <form action="/ContasaReceber/Estornar/" method="get">
                                    <input name='id' hidden value='{{ $row->id }}'>
                                    <input name='tipo' hidden value='Receber'>
                                    <input hidden name='conta2' value='{{ $row->conta }}'
                                        id='conta{{ $IdDados }}'>

                                    <input name='Valor' hidden value='{{ $row->Total }}'>

                                    <input
                                        onclick='EstornarContasAReceber({{ $row->id }},{{ $IdDados }},
                                    {{ $row->Total }});'class="btn btn-warning"
                                        name="" id='btne{{ $IdDados }}'class="btn btn-warning"
                                        name="" type="button" Value='Estornar'>
                            </td>

                            </form>
                        @endif

                        @if ($VerificaExtrato->ConstaNoExtrato($row->id) == true)
                            <td>
                                <form action="/Extrato/Todos/{{ $row->id }}" method="get">
                                    <input class="btn btn-success" id='btnp{{ $IdDados }}'name=""
                                        type="submit" Value='Parciais'>

                                </form>
                            </td>
                        @endif







                </tr>
                @endforeach
                <script></script>



</body>
{{ $ContasaReceber->links() }}

@include('footer')

</html>
