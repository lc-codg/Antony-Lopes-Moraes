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


    <h5 Style='margin-left:1%;' class="text-left">Editar Produto</h5>



    <body>

        <form method="get" action="/Produtos/Editar/{{ $produto->id }}">
            @csrf
            <div Style='margin-left:1%;' class='form-row'>

                <div class="form-group col-md-2">
                    <label for="">Código</label>
                    <input type="text" readonly class="form-control" value="{{ $produto->id }}" name="id" id=""
                        aria-describedby="helpId" placeholder="">
                </div>


                <div class="form-group col-md-2">

                    <label for="">Barras</label>
                    <input type="text" class="form-control" value="{{ $produto->Barras }}" name="Barras" id=""
                        aria-describedby="helpId" placeholder="">
                </div>

                <div class="form-group col-md-7">
                    <label for="">Descrição</label>
                    <input type="text" class="form-control" value="{{ $produto->Descricao }}" name="Descricao" id=""
                        aria-describedby="helpId" placeholder="">
                </div>

                <div class="form-group col-md-2">
                    <label for="">Valor Unitário</label>
                    <input type="text" class="form-control" value="{{ $produto->ValorUnitario }}"
                        name="ValorUnitario" id="" aria-describedby="helpId" placeholder="">
                </div>
                <div class="form-group col-md-2">
                    <label for="">Quantidade</label>
                    <input type="text" class="form-control" value="{{ $produto->Quantidade }}" name="Quantidade"
                        id="" aria-describedby="helpId" placeholder="">
                </div>

                <br>


            </div>
            <div class='form-row'>
                <div Style='margin-left:1%;' class="form-group ">
                    <input name="Salvar" id="Salvar" class="btn btn-dark" type="submit" value="Salvar">
                </div>
            </div>


        </form>




</div>


</div>
</body>
@include('footer')

</html>
