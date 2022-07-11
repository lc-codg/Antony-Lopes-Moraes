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

<body>
    <div id='container' class='.container-fluid'>
        <h5>Contas a Receber</h5>
        <form method='get' action='/ContasaReceber/Todos'>

            <div class='form-row'>

                <div class="form-group col-md-2">
                    <label for="">Data Inicial</label>
                    <input type="date" class="form-control" name="DataIni" id="" value="{{Date('Y-m-d')}}" aria-describedby="helpId" placeholder="">
                </div>

                <div class="form-group col-md-2">
                    <label for="">Data Final</label>
                    <input type="date" class="form-control" name="DataFim" value="{{Date('Y-m-d')}}" id="" aria-describedby="helpId" placeholder="">
                </div>

                <div class="form-group col-md-4">
                    <input class="btn btn-primary" name="" id='Bot' type="submit" Value='Pesquisar' aria-describedby="helpId" placeholder="">
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
        <table id="tabelaPedidos" class="table table-bordered table-condensed " style="font-size: 15px; width:100%;">
            <thead class="thead-dark">
                <tr>

                    <th scope="col">Cod.Contas a Receber</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Barras</th>
                    <th scope="col">Empresa</th>
                    <th scope="col">Cliente</th>
                    <th scope="col">Total</th>
                    <th scope='col'>Vencimento</th>
                    <th scope='col'>N° Parcela</th>
                    <th scope='col'>N° Boleta</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col">Conta Bancária</th>

                </tr>
            </thead>
            <tbody>
                <tr>



                    @foreach ($ContasaReceber as $row)

                    <td>{{ $row->id }}</td>

                    @if ($row->status === 0)
                    <td data-estado="Pago" class='DescA'>{{ $row->Descricao }}</td>
                    @else
                    <td data-estado="Pagar" class='DescP'>{{ $row->Descricao }}</td>
                    @endif

                    <td>{{ $row->Barras }}</td>
                    <td>{{ $row->Razaoe}}</td>
                    <td>{{ $row->Razaof}}</td>

                    @if ($row->status === 0)
                    <td class='price2'>R${{ $row->Total}}</td>
                    @else
                    <td class='price'>R${{ $row->Total}}</td>
                    @endif
                    <td>{{ $row->Vencimento}}</td>
                    <td>{{ $row->Parcelas}}</td>
                    <td>{{ $row->Boleta}}</td>


                    <td>

                        <form action="/ContasaReceber/Ver/{{ $row->id }}" method="get">
                            <input class="btn btn-dark" name="" type="submit" Value='Editar'>
                        </form>

                    </td>
                    <td>
                        <form action="/ContasaReceber/Delete/{{ $row->id }}" method="get">
                            <input class="btn btn-danger" name="" type="submit" Value='Excluir'>
                        </form>
                    </td>
                    @if ($row->status === 0)
                    <td>
                        <form action="/ContasaReceber/Quitar/" method="get">
                            <input name='id' hidden value='{{$row->id}}'>
                            <input name='tipo' hidden value='Receber'>
                            <input name='Valor' hidden value='{{$row->Total}}'>
                            <input class="btn btn-primary" name="" type="submit" Value='Receber'>

                    </td>
                    <td>
                        <select class="form-control" name="conta" id="">
                            @foreach($Contas as $C)
                            <option selected>{{$C->id}} - {{$C->Descricao}}</option>
                            @endforeach
                        </select>
                    </td>
                    </form>
                    @else

                    <td>
                        <form action="/ContasaReceber/Estornar/" method="get">
                            <input name='id' hidden value='{{$row->id}}'>
                            <input name='tipo' hidden value='Receber'>
                            <input name='Valor' hidden value='{{$row->Total}}'>
                            <input class="btn btn-warning" name="" type="submit" Value='Estornar'>
                    </td>
                    <td>
                        <select class="form-control" name="conta" id="">
                            @foreach($Contas as $C)
                            <option selected>{{$C->id}} - {{$C->Descricao}}</option>
                            @endforeach
                        </select>
                    </td>
                    </form>
                    @endif










                </tr>
                @endforeach
                <script></script>



</body>
{{ $ContasaReceber->links() }}

@include('footer')

</html>