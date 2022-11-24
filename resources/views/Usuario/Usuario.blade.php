@extends('../Base')
@section('content')
    <br>
    <div id='c1'class='. container-fluid center'>
        <div class='box'>
            <form method="post" <?php if($Tipo =='Login') { ?> action='/Usuario/Logar'> <?php }else{ ?> action='/Usuario/Cadastro'> <?php } ?>
                <h5 id='h' class=' form-group md col-12 card-title'>{{ $Tipo }}</h5>
                <div class="form-group md col-12">
                    <label for="">Usuário</label>
                    <input type="text" class="form-control" name="Login" id="Login" aria-describedby="helpId"
                        placeholder="">
                </div>
                <div class="form-group md col-12">
                    <label for="">Senha</label>
                    <input type="text" class="form-control" name="Login" id="Login" aria-describedby="helpId"
                        placeholder="">
                </div>
                <div class="form-group md col-12">
                    <label for="">E-mail</label>
                    <input type="text" class="form-control" name="Login" id="Login" aria-describedby="helpId"
                        placeholder="">
                </div>
                <div class="form-group md col-5">
                    <input name="Enviar" id="Btn" class="btn btn-primary" type="button" value="Enviar">
                </div>
            </form>
        </div>
    </div>
    <style>
        #c1 {

            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
            background: #fff;
        }

        .box {
            width: 500px;
            height: 500px;
            background: #fff;
        }

        body {
            margin: 0px;
        }
        #h{
            justify-content: center;
            align-items: center;
        }
        #Btn{
            width: 478px;
        }
    </style>
@endsection
