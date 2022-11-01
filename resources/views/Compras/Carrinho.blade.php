@include('Header')


<link href="{{ URL::asset('css/app.css') }}" rel="stylesheet" type="text/css">
<script src="{{ asset('js/Compras.js') }}"></script>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>


    <div id='container' class='.container-fluid'>
        <h5>Entrada de Notas</h5>
        <br>

        <div class='form-row '>

            <div class="form-group col-md-2">
                <label for="">Destinatário</label>
                <select class="form-control " name="" id='Empresa'>
                    @foreach($Empresa as $RowEmpresa)
                    <option selected>{{$RowEmpresa->id}} - {{$RowEmpresa->Razao}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group col-md-4">
                <label for="">Pesquisa Emitente</label>
                <input autocomplete="off" type="text" class="form-control" name="PesquisaNome" id="PesquisaNome" aria-describedby="helpId" placeholder="">

            </div>

            <div class="form-group col-md-4">
                <label for="">Pesquisa Produto</label>
                <input autofocus autocomplete="off" type="text" class="form-control" name="PesquisaNome" id="buscar" aria-describedby="helpId" placeholder="">

            </div>


        </div>
        <div class="form-group col-md-6" id='resultado_Fornecedor'>

        </div>

        <div class="form-group col-md-6" id='resultado_busca'>



        </div>

    </div>









    <div id='container' class='.container-fluid'>
        @php
         if(($Fornecedor['Razao'] <>'')){
        @endphp
        <td> <button type="button" id="Fornecedor" class="btn btn-dark btn-xs">Fornecedor: {{$Fornecedor['Razao']}}</button></td>
        @php
        }
        @endphp
        <table id="tabelaPedidos" class="table table-bordered table-condensed " style="font-size: 15px; width:100%;">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Código</th>
                    <th scope="col">Produto</th>
                    <th scope="col">Valor Unitário</th>
                    <th scope="col">Quantidade</th>
                    <th scope="col">Peso</th>
                    <th scope="col">Subtotal</th>
                    <th scope="col"></th>

                </tr>
            </thead>
            <tbody>
                <div id='content_retorno'>
                    @php $Total =0; @endphp
                    @foreach ($CartCompras as $row)
                    <tr>
                        <td>{{ $row['Barras']}}</td>
                        <td>{{ $row['Descricao'] }}</td>
                        <td>{{'R$'.number_format($row['Valor'],2,',','.')}}</td>
                        <td>{{$row['Quantidade']}}</td>
                        <td>{{$row['Peso'] }}</td>
                        <td class='SubTotal'>{{'R$'.number_format($row['Peso'] * $row['Valor'],2,',','.')}}</td>
                        @php
                        $Total += ($row['Peso'] * $row['Valor']);
                        @endphp

                        <td>
                            <form action="/Pedidos/Excluir/{id}" method="get">
                                <input class="btn btn-danger" name="" type="submit" Value='Excluir'>
                            </form>
                        </td>
                    </tr>

                    @endforeach
                    <td> <button onclick="location.href = '/Compras/LimparCarrinho';" id="Limpar" class="btn btn-danger">Cancelar</button></td>
                    <td> <button onclick="location.href = '/Compras/Salvar';" id="Finalizar" class="btn btn-primary">Finalizar- F2</button></td>
                    <td></td>

                    <th class='Total' scope="col">Total</th>
                    <td id='Total'>{{'R$'.number_format($Total,2,',','.')}}</td>
                    <td></td>



        </table>


    </div>





    </div>
    <div>

    </div>

</body>

</html>

@include("Footer")
