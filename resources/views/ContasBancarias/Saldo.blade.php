

<head>
    <link href="/css/app.css" rel="stylesheet">
   
    @include('Header')
</head>


    <div id='container' class='.container-fluid'>


        <table id="tabelaPedidos" class="table table-bordered table-condensed " style="font-size: 15px; width:100%;">
            <thead class="thead-dark">
                <tr>

                    <th scope="col">Cod.Conta Bancária</th>
                    <th scope="col">Descrição</th>
                    <th scope='col'>Empresa</th>
                    <th scope='col'>Saldo</th>
      
                </tr>
            </thead>
            <tbody>
                <tr>



                    @foreach ($ContasBancarias as $row)

                    <td>{{ $row->id }}</td>

                    <td>{{ $row->Descricao }}</td>

                    <td>{{ $row->Razao}}</td>
                    <td style='font-size: 25px;'class='price'>R${{ $row->Saldo}}</td>

                   




                </tr>
                @endforeach
                <script></script>



</body>
{{ $ContasBancarias->links() }}

@include('footer')

</html>
