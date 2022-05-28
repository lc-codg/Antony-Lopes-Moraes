<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

</head>
@include('Header')
<br>
<div class='.container-fluid ' id='c3'>
    <h5 Style='margin-left:1%;' class="text-left">Editar clientes</h5>

    <body>

        <form method="get" action="/Clientes/Editar/{{ $cliente->id }}">
            @csrf

            <div class='form-row'>
                <div Style='margin-left:1%;' class="form-group col-md-2 ">
                    <label for="">Código</label>
                    <input type="text" class="form-control" readonly value="{{ $cliente->id }}" name="id" id=""
                        aria-describedby="helpId" placeholder="">
                </div>
                <div Style='margin-left:1%;' class="form-group col-md-4 ">
                    <label for="">Nome</label>
                    <input type="text" class="form-control" value="{{ $cliente->Nome }}" name="Nome" id=""
                        aria-describedby="helpId" placeholder="">
                </div>
                <div class="form-group col-md-2">
                    <label for="">CPF</label>
                    <input type="text" class="form-control" value="{{ $cliente->CPF }}" name="CPF" id=""
                        aria-describedby="helpId" placeholder="">
                </div>
                <div class="form-group col-md-2">
                    <label for="">RG</label>
                    <input type="text" class="form-control" value="{{ $cliente->RG }}" name="RG" id=""
                        aria-describedby="helpId" placeholder="">
                </div>

                <div Style='margin-left:1%;'class="form-group col-md-2">
                    <label for="">CNPJ</label>
                    <input type="text" class="form-control" value="{{ $cliente->CNPJ }}" name="CNPJ" id=""
                        aria-describedby="helpId" placeholder="">
                </div>
                <div Style='margin-left:1%;' class="form-group col-md-4">
                    <label for="">Logadouro</label>
                    <input type="text" class="form-control" value="{{ $cliente->Endereco }}" name="Endereco" id=""
                        aria-describedby="helpId" placeholder="">
                </div>
                <div Style='margin-left:1%;' class="form-group col-md-1">
                    <label for="">Número</label>
                    <input type="number" class="form-control" value="{{ $cliente->Numero }}" name="Numero" id=""
                        aria-describedby="helpId" placeholder="">
                </div>
                <div Style='margin-left:1%;' class="form-group col-md-4">
                    <label for="">Bairro</label>
                    <input type="text" class="form-control" value="{{ $cliente->Bairro }}" name="Bairro" id=""
                        aria-describedby="helpId" placeholder="">
                </div>
                <div Style='margin-left:1%;' class="form-group col-md-4">
                    <label for="">Cidade</label>
                    <input type="text" class="form-control" value="{{ $cliente->Cidade }}" name="Cidade" id=""
                        aria-describedby="helpId" placeholder="">
                </div>
                <div Style='margin-left:1%;' class="form-group col-md-1">
                    <label for="">UF</label>
                    <input type="text" class="form-control" value="{{ $cliente->UF }}" name="UF" id=""
                        aria-describedby="helpId" placeholder="">
                </div>
                <div Style='margin-left:1%;' class="form-group col-md-4">
                    <label for="">Email</label>
                    <input type="text" class="form-control" value="{{ $cliente->Email }}" name="Email" id=""
                        aria-describedby="helpId" placeholder="">
                </div>

            </div>



            <br>
            <div class="form-group col-md-4">
                <input name="Salvar" id="Salvar" class="btn btn-dark" type="submit" value="Salvar">
            </div>
</div>




</form>





</div>
</form>

</div>
</body>

</html>
