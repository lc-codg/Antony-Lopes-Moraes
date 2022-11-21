<!DOCTYPE html>
<html lang="en">

<head>
    <link href="{{ URL::asset('css/app.css') }}" rel="stylesheet" type="text/css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include ('Header')
</head>

<body>
    <div id='container' class='.container-fluid'>
        <p>
  
            <h5 class="card-title">Cadastro de Categorias</h5>
            <?php if(!Isset($Descricao)){ ?>
            <form id='Form' method='Post'action="/Categorias/Salvar">
                <?php }else{ ?>
                    <form id='Form' method='Post'action="/Categorias/Editar">
                        <?php } ?>
                @csrf
                <?php if (!Isset($Id)){

                }else{ ?>
                <div class="form-group">
                    <label for=""></label>
                    <input readOnly value='<?php echo $Id; ?>'type="text" class="form-control" name="Id" id="Id" aria-describedby="helpId"
                        placeholder="">
               
                </div>

                <?php } ?>
                <div class="form-group">
                    <label for="">Descrição</label>
                    <input type="text" class="form-control" <?php if(!Isset($Descricao)){

                    }else{
                        ?> value='<?php echo $Descricao; ?>'
                        <?php  } ?> name="Descricao" id="Descricao" aria-describedby="helpId" placeholder="">
                </div>

                <div class="form-group">
                    <label for="">Tipo</label>
                    <select class="form-control" name="Tipo" id="Tipo">

                        <?php if(!Isset($Tipo)){ ?>
                            <option selected>Selecione...</option>
                       
                        <?php }else{
        ?>
                        <option selected><?php echo $Tipo; ?></option>
                        <?php } ?>


                        <option>Categoria</option>
                        <option>Sub-Categoria</option>
                    </select>
                </div>

                <input name="Salvar" onclick='Validar();' id="Btn" class="btn btn-dark" type="button"
                    value="Salvar">

            </form>

     
</body>

<script src="{{ asset('js/Categoria.js') }}"></script>

@include ('footer')

</html>
