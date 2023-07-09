<link href="/css/app.css" rel="stylesheet">

<!DOCTYPE html>
<html lang="en">
@include('Header')


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <div class='.container-fluid ' id='c2'>
        <br>
        <h5>Compras</h5>
</head>

<body>

    <form method='get' action='/Compras/Todos'>

        <div class='form-row'>

            <div class="form-group col-md-2">
                <label for="">Localizar</label>
                <input autocomplete="off" autofocus type="text" class="form-control" name="Nome" id="" aria-describedby="helpId" placeholder="">
                <small id="helpId" class="form-text text-muted">Localizar por Emitente ou Destinatário</small>
            </div>

            <div class="form-group col-md-2">
                <label for="">Data Inicial</label>
                <input type="date" class="form-control" name="Dataini" id="" value="{{ Date('Y-m-d') }}" aria-describedby="helpId" placeholder="">
            </div>

            <div class="form-group col-md-2">
                <label for="">Data Final</label>
                <input type="date" class="form-control" name="Datafim" value="{{ Date('Y-m-d') }}" id="" aria-describedby="helpId" placeholder="">
            </div>

            <div class="form-group md col-3">
                <label for="">Empresa</label>
                <select class="form-control" name="Empresa" id="Empresa">
                    <option selected>Selecione...</option>
                    @foreach ($Empresa as $item)
                    <option>{{ $item->id . '-' . $item->Razao }}</option>
                    @endforeach


                </select>
            </div>

            <div class="form-group col-md-3">
                <input class="btn btn-primary" name="" id='Bot' type="submit" Value='Pesquisar' aria-describedby="helpId" placeholder="">

            </div>


    </form>
    <div class="btn-group">
        <button type="button" id="vista" class="btn btn-success btn-xs">A Vista</button>
        <button type="button" id="prazo" class="btn btn-warning btn-xs">A Prazo</button>
        <button type="button" id="transferencia" class="btn btn-danger btn-xs">Transfrências</button>
        <button type="button" class="btn btn-dark btn-xs">Todos</button>
        <button id='h5' type="button" class="btn btn-success btn-xs"></button>
        <button id='h6' type="button" class="btn btn-warning  btn-xs"></button>
        <button id='h7' type="button" class="btn btn-danger btn-xs">
            <button id='h8' type="button" class="btn btn-ligth btn-xs">



    </div>
    <table id="tabelaPedidos" class="table table-bordered table-condensed " style="font-size: 15px; width:100%;">
        <thead class="thead-Dark">
            <tr>

                <th scope="col">Código</th>
                <th scope="col">Emitente</th>
                <th scope="col">Cliente</th>
                <th scope="col">Total</th>
                <th scope="col">Tipo</th>
                <th scope="col">Data</th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <tr>



                @foreach ($Compras as $row)
                <td>{{ $row->id }}</td>
                <td>{{ $row->Razao }}</td>
                <td>{{ $row->Nome }}</td>
                @if($row->Tipo=='vista')
                <td>R$ <span class="price">{{ number_format($row->Total, 2, '.', '') }}</span></td>
                <td data-estado="vista">{{ $row->Tipo}}</td>
                @elseif($row->Tipo=='prazo')
                <td>R$ <span class="price2">{{ number_format($row->Total, 2, '.', '') }}</span></td>
                <td data-estado="prazo">{{ $row->Tipo}}</td>
                @elseif($row->Tipo=='transferencia')
                <td>R$ <span class="price3">{{ number_format($row->Total, 2, '.', '') }}</span></td>
                <td data-estado="transferencia">{{ $row->Tipo}}</td>
                @endif

                <td>{{ $row->DtPedido }}</td>




                <td>

                    <form action="/ItensCompra/Todos/{{ $row->id }}" method="get">
                        <input class="btn btn-primary" name="" type="submit" Value='Itens'>
                    </form>
                </td>

                <td>
                    <form action="/Compras/Delete/{{ $row->id }}" method="get">

                        <input class="btn btn-Danger" name="" type="submit" Value='Excluir'>
                    </form>
                </td>

                <td>
                    <form target="_blank" action="/Compras/ImprimirA4/{{ $row->id }}/{{ 'Limpo' }}" method="get">

                        <input class="btn btn-success" name="" type="submit" Value='Imprimir'>
                    </form>
                </td>




            </tr>
            @endforeach
            {{ $Compras->links() }}

            <script>
                $(function() {


                    var totals = $('.price');
                    var totals2 = $('.price2');
                    var totals3 = $('.price3');

                    var sum = 0;
                    var sum2 = 0;
                    var sum3 =0;

                    for (var i = 0; i < totals.length; i++) {
                        //strip out Real signs and commas
                        var v = $(totals[i]).text().replace(/[^\d.]/g, '');

                        //convert string to integer
                        var ct = parseFloat(v);
                        sum += ct;


                    }

                    for (var i2 = 0; i2 < totals2.length; i2++) {
                        //strip out Real signs and commas
                        var v2 = $(totals2[i2]).text().replace(/[^\d.]/g, '');

                        //convert string to integer
                        var ct2 = parseFloat(v2);
                        sum2 += ct2;


                    }
                    for (var i3 = 0; i3 < totals3.length; i3++) {
                        //strip out Real signs and commas
                        var v3 = $(totals3[i3]).text().replace(/[^\d.]/g, '');

                        //convert string to integer
                        var ct3 = parseFloat(v3);
                        sum3 += ct3;


                    }





                    const formatado = sum.toLocaleString('pt-BR', {
                        style: 'currency',
                        currency: 'BRL'
                    });
                    const formatado2 = sum2.toLocaleString('pt-BR', {
                        style: 'currency',
                        currency: 'BRL'
                    });
                    const formatado3 = sum3.toLocaleString('pt-BR', {
                        style: 'currency',
                        currency: 'BRL'
                    });
                    var qtd = $('#tabelaPedidos tbody tr').length;


                    var myHeading = document.querySelector('#h5');
                    myHeading.textContent = "Total Avista: " + formatado;

                    var myHeading = document.querySelector('#h6');
                    myHeading.textContent = "Total Prazo: " + formatado2;

                    var myHeading = document.querySelector('#h7');
                    myHeading.textContent = "Total Transferências: " + formatado3;

                    var myHeading = document.querySelector('#h8');
                    myHeading.textContent = "N° de Contas: " + qtd;



                    //Filtragem por botôes

                    var tds = document.querySelectorAll('table td[data-estado]');
                    document.querySelector('.btn-group').addEventListener('click', function(e) {
                        var estado = e.target.id;
                        for (var i = 0; i < tds.length; i++) {
                            var tr = tds[i].closest('tr');
                            tr.style.display = estado == tds[i].dataset.estado || !estado ? '' : 'none';
                        }
                    });

                });
            </script>


</body>

@include('footer')

</html>
