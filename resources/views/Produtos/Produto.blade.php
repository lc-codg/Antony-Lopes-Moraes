<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
<link rel="stylesheet" href="<?php echo asset('css/app.css') ?>" type="text/css">

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Pedidos</title>
</head>
<h3 class="text-left">Cadastro de Produtos</h3>

<body>

  <form method="post" action="/Produtos/Salvar">
  @csrf
    <div class="form-group col-md-4">
      <label for="">Barras</label>
      <input type="text" class="form-control" name="Barras" id="" aria-describedby="helpId" placeholder="">
    </div>
    <div class="form-group col-md-4">
      <label for="">Descrição</label>
      <input type="text" class="form-control" name="Descricao" id="" aria-describedby="helpId" placeholder="">
    </div>
    <div class="form-group col-md-4">
      <label for="">Valor Unitário</label>
      <input type="text" class="form-control" name="ValorUnitario" id="" aria-describedby="helpId" placeholder="">
    </div>
    <div class="form-group col-md-4">
      <label for="">Quantidade</label>
      <input type="text" class="form-control" name="Quantidade" id="" aria-describedby="helpId" placeholder="">
    </div>
    </div>



    <br>
    <div class="form-group">
      <input name="Salvar" id="Salvar" class="btn btn-success" type="submit" value="Salvar">
    </div>

  </form>





  </div>
  </form>


</body>

</html>