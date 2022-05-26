
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
<link rel="stylesheet" href="<?php echo asset('css/app.css')?>" type="text/css">

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pedidos</title>
</head>

<body>


<div class="container" id="c2">
    <h3 class="text-left">Cadastro de Produtos</h3>
    
  
 
<br>
<button onclick="location.href = 'relatoriodeCliente';" id="myButton" class="btn btn-primary" >Pesquisar cliente</button>
<br>
<br>
    <form method="post" action= "ClienteController">
    
    
<div class="form-group">
  <label for=""class="text-primary" >Nome do Cliente</label>
  <input type="text" style="whidth:90%;font-color:blue;"name='nome' class="form-control" name="nome" id="dados" aria-describedby="helpId" placeholder=""required>
 

</div>
<div class="form-row">

<div class="form-group">
  <label for="Ins-estadual"class="text-primary">IE/RG</label>
  <input type="text" class="form-control" name="ie" id="dados"  aria-describedby="helpId" placeholder=""require>

</div>


<div class="form-group">
  <label for=""class="text-primary"class="text-primary">CPF/CNPJ</label>
  <input type="text" class="form-control" name="cpf_cnpj" id="dados" aria-describedby="helpId" placeholder=""required>
  
</div>
<div class="form-group">
  <label for=""class="text-primary">Telefone</label>
  <input type="text" class="form-control" name="telefone" id="dados" aria-describedby="helpId" placeholder=""required>
  
</div>

<div class="form-group">
  <label for="">Email</label>
  <input type="text" class="form-control" name="email" id="dados" style="  width:80%; " aria-describedby="helpId" placeholder="">
  
</div>
</div>

<div class="form-group">
  <label for=""class="text-primary">Endereço</label>
  <input type="text" style="whidth:90%" class="form-control" name="endereco" id="dados" aria-describedby="helpId" placeholder=""require>
 
</div>

<div class="form-row" >



<div class="form-group">
  <label for=""class="text-primary">Numero</label>
  <input type="text" class="form-control" name="numero" id="dados" aria-describedby="helpId" placeholder=""require>
 
</div>

<div class="form-group">
  <label for="">Complemento</label>
  <input type="text" class="form-control" name="complemento" id="dados" aria-describedby="helpId" placeholder="">

</div>

<div class="form-group">
  <label for=""class="text-primary">Bairro</label>
  <input type="text" class="form-control" name="bairro" id="dados" aria-describedby="helpId" placeholder=""require>

</div>

<div class="form-group">
  <label for=""class="text-primary">Cidade</label>
  <input type="text" class="form-control" name="cidade" id="dados" aria-describedby="helpId" placeholder=""require>
 
</div>

<div class="form-group">
  <label for=""class="text-primary">CEP</label>
  <input type="text" class="form-control" name="cep" id="" aria-describedby="helpId" placeholder=""require>
 
</div>
<div class="form-group">
  <label for=""class="text-primary">UF</label>
  <input type="text" class="form-control" name="uf" id="dados" aria-describedby="helpId" placeholder=""require>
  
</div>


<div class="form-group">
  <label for="">Codigo de cidade</label>
  <input type="text" class="form-control" name="codcidade" id="dados" aria-describedby="helpId" placeholder="">
 
</div>



<div class="form-group">
  <label for="">Limite</label>
  <input type="text" class="form-control" name="Limite" id="dados" aria-describedby="helpId" placeholder="">

</div>



<div class="form-group">
  <label for="">Limite Atual</label>
  <input type="text" class="form-control" name="limitiatual" id="dados" aria-describedby="helpId" placeholder="">

</div>



<div class="form-group">
  <label for="">Cartão</label>
  <input type="text" class="form-control" name="cartao" id="" aria-describedby="helpId" placeholder="">

</div>

</div>

<div class="form-group">
<input name="Salvar" id="Editar" class="btn btn-success"type="submit" value="Salvar" >
</div>

</form>





</div>
</form>


</body>
</html>
