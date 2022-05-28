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
<h5 Style='margin-left:1%;'class="text-left">Cadastro de clientes</h5>

<body>

    <form method="post" action="/Clientes/Salvar">
        @csrf

            <div class='form-row'>
                <div Style='margin-left:1%;'class="form-group col-md-4 ">
                    <label for="">Nome</label>
                    <input type="text" class="form-control" name="Nome" id="" aria-describedby="helpId" placeholder="">
                </div>
                <div class="form-group col-md-2">
                    <label for="">CPF</label>
                    <input type="text" class="form-control" name="CPF" id="" aria-describedby="helpId" placeholder="">
                </div>
                <div class="form-group col-md-2">
                    <label for="">RG</label>
                    <input type="text" class="form-control" name="RG" id="" aria-describedby="helpId" placeholder="">
                </div>

                <div class="form-group col-md-2">
                    <label for="">CNPJ</label>
                    <input type="text" class="form-control" name="CNPJ" id="" aria-describedby="helpId" placeholder="">
                </div>
                <div Style='margin-left:1%;'class="form-group col-md-4">
                    <label for="">Logadouro</label>
                    <input type="text" class="form-control" name="Endereco" id="" aria-describedby="helpId"
                        placeholder="">
                </div>
                <div Style='margin-left:1%;'class="form-group col-md-1">
                    <label for="">Número</label>
                    <input type="number" class="form-control" name="Numero" id="" aria-describedby="helpId"
                        placeholder="">
                </div>
                <div Style='margin-left:1%;'class="form-group col-md-4">
                    <label for="">Bairro</label>
                    <input type="text" class="form-control" name="Bairro" id="" aria-describedby="helpId"
                        placeholder="">
                </div>
                <div Style='margin-left:1%;'class="form-group col-md-4">
                    <label for="">Cidade</label>
                    <input type="text" class="form-control" name="Cidade" id="" aria-describedby="helpId"
                        placeholder="">
                </div>
                <div Style='margin-left:1%;' class="form-group col-md-1">
                    <label for="">UF</label>
                    <input type="text" class="form-control" name="UF" id="" aria-describedby="helpId" placeholder="">
                </div>
                <div Style='margin-left:1%;' class="form-group col-md-1">
                    <label for="">Email</label>
                    <input type="text" class="form-control" name="Email" id="" aria-describedby="helpId"
                        placeholder="">
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
