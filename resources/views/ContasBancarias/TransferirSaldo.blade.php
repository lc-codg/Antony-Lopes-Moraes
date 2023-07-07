<!DOCTYPE html>
<html lang="en">
<link href="/css/app.css" rel="stylesheet">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('Header')
</head>

<body>

    <div id='container' class='.container - fluid'>
        <h5>Transferir Saldo Entre Contas</h5>

        <div id='container' class='.container - fluid'>



            <form id='Form' method='post' action='/ContasBancarias/Trasferencia'>
                @csrf
                <div class='form-row'>

                    <div class="form-group md col-4">
                        <label for="">Conta Bancária Origem</label>
                        <select class="form-control" name="Contao" id="Contao">
                            <option selected>Selecione...</option>
                            @foreach ($Contas as $C)
                            <option>{{$C->id}}- {{$C->Descricao}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group md col-4">
                        <label for="">Conta Bancária Destino</label>
                        <select class="form-control" name="Contad" id="Contad">
                            <option selected>Selecione...</option>
                            @foreach ($Contas as $C)
                            <option>{{$C->id}}- {{$C->Descricao}}</option>
                            @endforeach
                        </select>

                    </div>

                    <div class="form-group md col-4">
                        <label for="">Empresa</label>
                        <select class="form-control " name="CodEmpresa" id="Empresa">
                            <option selected>Selecione...</option>
                            @foreach ($Empresas as $row)
                            <option>{{$row->id}}- {{$row->Razao}}</option>
                            @endforeach
                        </select>
                    </div>



                </div>

                <div class='form-row'>

                    <div class="form-group md col-2">
                        <label for="">Total</label>
                        <input type="number" onkeyup="Totalizar();" pattern="[0-9]+([,\.][0-9]+)?" min="0" step="any" class="form-control" name="Valor" id="Valor" aria-describedby="helpId" placeholder="">
                    </div>
                    <div class="form-group col md-3">
                        <label for="">Motivo</label>
                        <input type="text" class="form-control" name="Descricao" id="Descricao" aria-describedby="helpId" placeholder="">
                    </div>



                </div>

                <input name="Salvar" id="" class="btn btn-dark" type="button" onclick="Verifica();" value="Salvar">
            </form>




        </div>
    </div>
    <script>
        function Verifica() {

            var cliente = document.getElementById("Contao");
            var empresa = document.getElementById("Contad");
            var descricao = document.getElementById("Descricao").value;
            var valor = document.getElementById("Valor").value;
            var f = document.getElementById("Empresa");
            var opcaoTextof = f.options[f.selectedIndex].text;
            var opcaoTexto = cliente.options[cliente.selectedIndex].text;
            var opcaoTextoe = empresa.options[empresa.selectedIndex].text;

            if (opcaoTexto == 'Selecione...') {
                alert('Selecione a origem');
            } else if (opcaoTextoe == 'Selecione...') {
                alert('Selecione a destino');
            } else if (opcaoTextof == 'Selecione...') {
                alert('Selecione a empresa');
            } else if (valor == '') {
                alert('Digite o Valor');
            } else if (descricao == '') {
                alert('Digite o Motivo');
            } else {
                document.getElementById("Form").submit();
            }

        }
    </script>
</body>
@include('footer')

</html>
