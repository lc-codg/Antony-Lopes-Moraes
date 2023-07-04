<!DOCTYPE html>
<html lang="en">

<head>
    <link href="/css/app.css" rel="stylesheet">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('Header')
</head>

<body>
    <div id='c2' class='.container-fluid'>
        <h5>Arrecadação</h5>

        <form method='get' action='/Arrecadacao/Todos'>

            <div class='form-row'>

                <div class="form-group col-md-2">
                    <label for="">Data Inicial</label>
                    <input type="date" class="form-control" name="DataIni" id="" value="{{Date('Y-m-d')}}" aria-describedby="helpId" placeholder="">
                </div>

                <div class="form-group col-md-2">
                    <label for="">Data Final</label>
                    <input type="date" class="form-control" name="DataFim" value="{{Date('Y-m-d')}}" id="" aria-describedby="helpId" placeholder="">
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
                        <input class="btn btn-primary" name="BtnPesquisa" id='Bot' type="submit" Value='Pesquisar' aria-describedby="helpId" placeholder="">
                    </div>
             


        </form>

        <div class="btn-group">

            <button id='h5' type="button" class="btn btn-primary btn-xs"></button>
            <button id='h7' type="button" class="btn btn-ligth btn-xs">
            <button type="button" id="Pago"  onclick='Imprimir()'class="btn btn-danger btn-xs">Imprimir</button>



        </div>
        <table id="tabelaPedidos" class="table table-bordered table-condensed " style="font-size: 15px; width:100%;">
            <thead class="thead-dark">
                <tr>

                    <th scope="col">Cod.Arrecadação</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Empresa</th>
                    <th scope="col">Total</th>
                    <th scope='col'>Data</th>
                    <th scope='col'>Identificação</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <tr>



                    @foreach ($Arrecada as $row)

                    <td>{{ $row->id }}</td>
                    <td>{{ $row->Descricao }}</td>
                    <td>{{ $row->Razaoe}}</td>
                    <td class='price'>{{ $row->Valor}}</td>
                    <td>{{ $row->DataRecebimento}}</td>
                    <td>{{ $row->Numero}}</td>


                    <td>

                        <form action="/Arrecadacao/Editar/{{ $row->id }}" method="get">
                            <input class="btn btn-dark" name="" type="submit" Value='Editar'>
                        </form>

                    </td>

                    <td>
                        <form action="/Arrecadacao/Deletar/{{ $row->id }}" method="get">
                            <input class="btn btn-danger" name="" type="submit" Value='Excluir'>
                        </form>
                    </td>




                </tr>
                @endforeach
                <script>
                    $(function() {


                        var totals = $('.price');
                        var totals2 = $('.price2');

                        var sum = 0;
                        var sum2 = 0;

                        for (var i = 0; i < totals.length; i++) {
                            //strip out Real signs and commas
                            var v = $(totals[i]).text().replace(/[^\d.]/g, '');

                            //convert string to integer
                            var ct = parseFloat(v);
                            sum += ct;


                        }





                        const formatado = sum.toLocaleString('pt-BR', {
                            style: 'currency',
                            currency: 'BRL'
                        });

                        var qtd = $('#tabelaPedidos tbody tr').length;


                        var myHeading = document.querySelector('#h5');
                        myHeading.textContent = "Total Quitado: " + formatado;


                        var myHeading = document.querySelector('#h7');
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

                    function Imprimir() {

                        $('#BtnPesquisa').hide();
                        $('#BtnImprimir').hide();
                        window.print();
                        $('#Bot').show();
                        $('#BtnImprimir').show();




                    }
                </script>



</body>
{{ $Arrecada->links() }}

@include('footer')

</html>