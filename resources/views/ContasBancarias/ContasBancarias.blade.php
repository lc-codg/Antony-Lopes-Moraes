<!DOCTYPE html>
<html lang="en">
<link href="{{ URL::asset('css/app.css') }}" rel="stylesheet" type="text/css">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('Header')
</head>

<body>

    <div id='container' class='.container - fluid'>
        <h5>Cadastro de contas Bancárias</h5>

        <div id='container' class='.container - fluid'>



            <form method='post' action='/ContasBancarias/Salvar'>
                @csrf
                <div class='form-row'>

                    <div class="form-group col md-4">
                      <label for="">Banco</label>
                      <select class="form-control" name="Banco" id="">
                        <option>Caixa Econômica Federal</option>
                        <option>Itaú</option>
                        <option>Bradesco</option>
                        <option>Inter</option>
                        <option>Nubanck</option>
                        <option>Santander</option>
                        <option>Next</option>
                        <option>Stone</option>
                        <option>Banco do Brasil</option>
                        <option>Neon</option>
                      </select>
                    </div>

                    <div class="form-group col md-4">
                        <label for="">Agência</label>
                        <input type="number" class="form-control" name="Agencia" id="" aria-describedby="helpId" placeholder="">
                    </div>

                    <div class="form-group col md-4">
                        <label for="">Conta</label>
                        <input type="number" class="form-control" name="Conta" id="" aria-describedby="helpId" placeholder="">
                    </div>

                    <div class="form-group col md-4">
                        <label for="">Operação</label>
                        <input type="number" class="form-control" name="Operacao" id="" aria-describedby="helpId" placeholder="">
                    </div>

                    <div class="form-group col md-4">
                        <label for="">Tipo</label>
                        <input type="number" class="form-control" name="Tipo" id="" aria-describedby="helpId" placeholder="">
                    </div>

                    <div class="form-group col md-4">
                        <label for="">Saldo</label>
                        <input type="number" pattern="[0-9]+([,\.][0-9]+)?" min="0" step="any" class="form-control" name="Saldo" id="valor" aria-describedby="helpId" placeholder="">
                    </div>
                </div>

                <div class='form-row'>

                    <div class="form-group col md-4">
                        <label for="">Descrição</label>
                        <input type="text" class="form-control" name="Descricao" id="" aria-describedby="helpId" placeholder="">
                    </div>

                    <div class="form-group col md-4">
                        <label for="">Codigo Empresa</label>
                        <select selected class="form-control" name="CodEmpresa" id="">
                            @foreach ($Empresas as $row)
                            <option>{{$row->id}}</option>
                            @endforeach
                        </select>
                    </div>

                    </div>

                    <input name="Salvar" id="" class="btn btn-primary" type="submit" value="Salvar">
            </form>


       

    </div>
    </div>
</body>

</html>