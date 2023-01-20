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
                <input autocomplete="off" autofocus type="text" class="form-control" name="Nome" id=""
                    aria-describedby="helpId" placeholder="">
                <small id="helpId" class="form-text text-muted">Localizar por Emitente ou Destinatário</small>
            </div>

            <div class="form-group col-md-2">
                <label for="">Data Inicial</label>
                <input type="date" class="form-control" name="Dataini" id="" value="{{ Date('Y-m-d') }}"
                    aria-describedby="helpId" placeholder="">
            </div>

            <div class="form-group col-md-2">
                <label for="">Data Final</label>
                <input type="date" class="form-control" name="Datafim" value="{{ Date('Y-m-d') }}" id=""
                    aria-describedby="helpId" placeholder="">
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
                <input class="btn btn-primary" name="" id='Bot' type="submit" Value='Pesquisar'
                    aria-describedby="helpId" placeholder="">

            </div>


    </form>

    <table id="tabelaPedidos" class="table table-bordered table-condensed " style="font-size: 15px; width:100%;">
        <thead class="thead-Dark">
            <tr>

                <th scope="col">Código</th>
                <th scope="col">Emitente</th>
                <th scope="col">Cliente</th>
                <th scope="col">Total</th>
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
                    <td>R$ <span class="price">{{ number_format($row->Total, 2, '.', '') }}</span></td>

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
                        <form target="_blank" action="/Compras/ImprimirA4/{{ $row->id }}/{{ 'Limpo' }}"
                            method="get">

                            <input class="btn btn-success" name="" type="submit" Value='Imprimir'>
                        </form>
                    </td>




            </tr>
            @endforeach
            {{ $Compras->links() }}




</body>

@include('footer')

</html>
