<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

</head>
@include('Header')
<br>

<h5 Style='margin-left:1%;margin-right:1%;'class="text-left">Cadastro de Empresa</h5>

<body>


    <ul class="nav-tabs nav">

        <li class="nav-item">
            <a href="#Dados Pessoais" data-toggle="tab" class="active nav-link">Dados Pessoais</a>
        </li>

        <li class="nav-item">
            <a href="#Dados Financeiros" data-toggle="tab" class="nav-link">Dados Financeiros</a>
        </li>
    </ul>

    <form method="get" action="/Empresa/Editar/{{$Empresas->id}}">
        @csrf
        <div class="tab-content">

            <div id="Dados Pessoais" class="tab-pane active .container-fluid">

                <div Style='margin-left:1%;margin-right:1%;' class='form-row'>

                    <div class="form-group col-md-4 ">
                        <label for="">Razão</label>
                        <input type="text" value="{{$Empresas->Razao}}"class="form-control" name="razao" id="" aria-describedby="helpId" placeholder="">
                    </div>

                    <div class="form-group col-md-2">
                        <label for="">Fantasia</label>
                        <input type="text" value="{{$Empresas->Fantasia}}"class="form-control" name="fantasia" id="" aria-describedby="helpId" placeholder="">
                    </div>

                    <div class="form-group col-md-2">
                        <label for="">CNPJ</label>
                        <input type="number" value="{{$Empresas->Cnpj}}"class="form-control" name="cnpj" id="" aria-describedby="helpId" placeholder="">
                    </div>

                    <div class="form-group col-md-2">
                        <label for="">Inscrição Estadual</label>
                        <input type="number" value="{{$Empresas->Ie}}"class="form-control" name="ie" id="" aria-describedby="helpId" placeholder="">
                    </div>


                    <div class="form-group col-md-4">
                        <label for="">Logadouro</label>
                        <input required value="{{$Empresas->Endereco}}"type="text" class="form-control" name="Endereco" id="" aria-describedby="helpId" placeholder="">
                    </div>

                    <div class="form-group col-md-1">
                        <label for="">Número</label>
                        <input required type="number" value="{{$Empresas->Numero}}"class="form-control" name="Numero" id="" aria-describedby="helpId" placeholder="">
                    </div>

                    <div class="form-group col-md-4">
                        <label for="">Bairro</label>
                        <input required type="text" value="{{$Empresas->Bairro}}"class="form-control" name="Bairro" id="" aria-describedby="helpId" placeholder="">
                    </div>

                    <div class="form-group col-md-4">
                        <label for="">Cidade</label>
                        <input required type="text" value="{{$Empresas->Cidade}}"class="form-control" name="Cidade" id="" aria-describedby="helpId" placeholder="">
                    </div>

                    <div class="form-group col-md-1">
                        <label for="">UF</label>
                        <input required type="text" value="{{$Empresas->UF}}"class="form-control" name="UF" id="" aria-describedby="helpId" placeholder="">
                    </div>

                    <div class="form-group col-md-1">
                        <label for="">Cep</label>
                        <input required type="number" value="{{$Empresas->Cep}}"class="form-control" name="cep" id="" aria-describedby="helpId" placeholder="">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="">Email</label>
                        <input type="text" class="form-control"value="{{$Empresas->Email}}" name="Email" id="" aria-describedby="helpId" placeholder="">
                    </div>

                    <div class="form-group col-md-4">
                        <label foFornecedorr="">Telefone</label>
                        <input type="text" class="form-control"value="{{$Empresas->Telefone}}" name="telefone" id="" aria-describedby="helpId" placeholder="">
                    </div>

                    <div class="form-group col-md-4">
                        <label for="">Contato</label>
                        <input type="text" class="form-control" value="{{$Empresas->Contato}}"name="contato" id="" aria-describedby="helpId" placeholder="">
                    </div>

                    <div class="form-group col-md-10">
                        <label for="">Observação</label>
                        <textarea class="form-control"name="observacao" id="" rows="3">{{$Empresas->Observacao}}</textarea>
                    </div>

                </div>

            </div>


            <div id="Dados Financeiros" class="tab-pane .container-fluid">

                <div Style='margin-left:1%;margin-right:1%;' class='form-row'>

                    <div class="form-group col-md-4">
                        <label for="">Prazo</label>
                        <input type="number"value="{{$Empresas->Prazo}}" class="form-control" name="prazo" id="" aria-describedby="helpId" placeholder="">
                    </div>

                    <div class="form-group col-md-4">
                        <label for="">Banco</label>
                        <input type="text" class="form-control" value="{{$Empresas->Tipo}}"name="tipo" id="" aria-describedby="helpId" placeholder="">
                    </div>

                    <div class="form-group col-md-3">
                        <label for="">Agência</label>
                        <input type="number"value="{{$Empresas->Agencia}}" class="form-control" name="agencia" id="" aria-describedby="helpId" placeholder="">
                    </div>

                    <div class="form-group col-md-3">
                        <label for="">Conta</label>
                        <input type="number"value="{{$Empresas->Conta}}" class="form-control" name="conta" id="" aria-describedby="helpId" placeholder="">
                    </div>

                </div>
            </div>




        </div>

        <br>
        <div class="form-group col-md-4">
            <input name="Salvar" id="Salvar" class="btn btn-dark" type="submit" value="Salvar">
        </div>






    </form>


</body>

</html>