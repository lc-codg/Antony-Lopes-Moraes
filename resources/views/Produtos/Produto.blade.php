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
    <h5 Style='margin-left:1%;' class="text-left">Cadastro de Produto</h5>

    <body>

        <form method="post" action="/Produtos/Salvar">
            @csrf
            <div Style='margin-left:1%;' class='form-row'>
                <div class="form-group col-md-2">
                    <label for="">Barras</label>
                    <input type="text" class="form-control" name="Barras" id="" aria-describedby="helpId"
                        placeholder="">
                </div>
                <div class="form-group col-md-9">
                    <label for="">Descrição</label>
                    <input type="text" class="form-control" name="Descricao" id="" aria-describedby="helpId"
                        placeholder="">
                </div>
                <div class="form-group col-md-2">
                    <label for="">Valor Unitário</label>
                    <input type="text" class="form-control" name="ValorUnitario" id="" aria-describedby="helpId"
                        placeholder="">
                </div>
                <div class="form-group col-md-2">
                    <label for="">Quantidade</label>
                    <input type="text" class="form-control" name="Quantidade" id="" aria-describedby="helpId"
                        placeholder="">
                </div>

                <br>


            </div>
            <div class="form-group col-md-4">
                <input name="Salvar" id="Salvar" class="btn btn-dark" type="submit" value="Salvar">
            </div>
</div>


</form>





</div>
</form>

</div>
</body>
@include('footer')

</html>
