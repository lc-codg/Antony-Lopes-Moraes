<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('Header')

    <link href="/css/app.css" rel="stylesheet">
    @php        $ContaDados = count($ContasaPagar); @endphp

</head>

<body>
    <div class='.container-fluid ' id='c2'>
        <h5>Contas a Pagar</h5>
        <form method='get' action='/ContasaPagar/Todos'>

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
            <button id='h7' type="button" class="btn btn-ligth btn-xs">



        </div>

        <button id='h8' type="button" class='btn btn-dark btn-xs'>
            <select id='ContaBancaria' onchange="SelecionaContaBancaria({{ $ContaDados }});" class="form-control"
                name="conta" id="">
                <option selected>Selecione</option>
                @foreach ($Contas as $C)
                    <option>{{ $C->id }} - {{ $C->Descricao }}</option>
                @endforeach
            </select>
        </button>

        <table id="tabelaPedidos" class="table table-bordered table-condensed " style="font-size: 12px; width:100%;">
            <thead class="thead-dark">
                <tr>

                    <th scope="col">Cod.Contas a Pagar</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Barras</th>
                    <th scope="col">Empresa</th>
                    <th scope="col">Fornecedor</th>
                    <th scope="col">Total</th>
                    <th scope='col'>Vencimento</th>
                    <th scope='col'>N° Parcela</th>
                    <th scope='col'>N° Boleta</th>

                    <th scope='col'>Juros</th>
                    <th scope='col'>Multas</th>
                    <th scope='col'>Cheque</th>

                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>


                </tr>
            </thead>
            <tbody>
                <tr>

                    @php
                        $IdDados = 0;

                    @endphp

                    @foreach ($ContasaPagar as $row)
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
                            <td class='price2'>R${{ $row->Total + $row->Juros + $row->Multa }}</td>
                        @else
                            <td class='price'>R${{ $row->Total + $row->Juros + $row->Multa }}</td>
                        @endif

                        <td>{{ $row->Vencimento }}</td>
                        <td>{{ $row->Parcelas }}</td>
                        <td>{{ $row->Boleta }}</td>


                        <td>
                            <input @if ($row->status === 1) readonly  value='{{ $row->Juros }}' @endif
                                style='font-size: 12px;width:70px;'type="number" pattern="[0-9]+([,\.][0-9]+)?"
                                min="0" step="any" class="form-control"
                                onkeyup='Juros({{ $IdDados }});' name="Juros" id="Juros{{ $IdDados }}"
                                aria-describedby="helpId" placeholder="">
                        </td>
                        <td>
                            <input
                                @if ($row->status === 1) readonly
                            value='{{ $row->Multa }}' @endif
                                style='font-size: 12px;width:70px;' type="number" pattern="[0-9]+([,\.][0-9]+)?"
                                min="0" step="any" class="form-control"
                                onkeyup='Multa({{ $IdDados }});'name="Multa" id="Multa{{ $IdDados }}"
                                aria-describedby="helpId" placeholder="">
                        </td>

                        <td>
                            <input
                                @if ($row->status === 1) readonly
                            value='{{ $row->Cheque }}' @endif
                                style='font-size: 12px;width:70px;' type="text" step="any"
                                class="form-control" name="Cheque"
                                onkeyup='Cheque({{ $IdDados }});'id="Cheque{{ $IdDados }}"
                                aria-describedby="helpId" placeholder="">
                        </td>

                        <td>

                            <form action="/ContasaPagar/Ver/{{ $row->id }}" method="get">
                                <input style='width:65px;font-size: 12px;'class="btn btn-dark"
                                   id="btned{{ $IdDados }}" type="submit" Value='Editar'>
                            </form>

                        </td>
                        <td>
                            <form action="/ContasaPagar/Delete/{{ $row->id }}" method="get">
                                <input style='width:65px;font-size: 12px;' class="btn btn-danger"
                                  id="btnec{{ $IdDados }}" type="submit" Value='Excluir'>
                            </form>
                        </td>
                        @if ($row->status === 0)
                            <td>
                                <form id='FrmQuitar'action="/ContasaPagar/Quitar" method="get">

                                    <input name='id' hidden value='{{ $row->id }}'>
                                    <input name='tipo' hidden value='Pagar'>
                                    <input hidden name='Valor' hidden value='{{ $row->Total }}'>
                                    <input hidden name='Juros2'value='' id='Juros2{{ $IdDados }}'>
                                    <input hidden name='Multa2' value='' id='Multa2{{ $IdDados }}'>
                                    <input hidden name='Cheque2' value='' id='Cheque2{{ $IdDados }}'>
                                    <input hidden name='conta' hidden value=''
                                        id='conta{{ $IdDados }}'>
                                    <input style='width:65px;font-size: 12px;'
                                        onclick='QuitarContasAPagar({{ $row->Total }},{{ $row->id }},{{ $IdDados }});
                                        'class="btn btn-primary"
                                       id="btnq{{ $IdDados }}" type="button" Value='Quitar'>

                            </td>

                            </form>
                        @else
                            <td>
                                <form action="/ContasaPagar/Estornar" method="get">

                                    <input name='id' hidden value='{{ $row->id }}'>
                                    <input name='tipo' hidden value='Pagar'>
                                    <input name='Valor' hidden value='{{ $row->Total }}'>
                                    <input hidden name='Juros2'value='{{ $row->Juros }}' id='Juros2{{ $IdDados }}'>
                                    <input hidden name='Multa2' value='{{ $row->Multa }}' id='Multa2{{ $IdDados }}'>
                                    <input hidden name='Cheque2' value='{{ $row->Cheque }}' id='Cheque2{{ $IdDados }}'>
                                    <input  hidden name='conta' value='{{$row->Conta }}'
                                    id='conta{{ $IdDados }}'>

                                    <input style='width:65px;font-size: 12px;' class="btn btn-warning"
                                        id="btne{{ $IdDados }}"
                                        onclick='EstornarContasAPagar({{ $row->Total }},{{ $row->id }},{{ $IdDados }});'  type="button" Value='Estornar'>

                            </td>


                            </form>
                        @endif

                </tr>
                @endforeach
        </table>
        </tbody>



    </div>

    <script src="{{ asset('js/Contas.js') }}"></script>

</body>
{{ $ContasaPagar->links() }}

@include('footer')

</html>
