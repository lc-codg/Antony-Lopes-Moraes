@extends('../Base')
@section('content')
    <br>
    <div id='c1'class='. container-fluid center'>
        <div class='box'>
            <form id='Form'method="post" <?php if($Tipo =='Login') { ?> action='/Usuario/Logar' <?php }else{ ?> action='/Usuario/Registrar'
                <?php } ?>>
                <h5 id='h' class=' form-group md col-12 card-title'>{{ $Tipo }}</h5>
                @csrf
                <div class="form-group md col-12">
                    <label for="">Usuário</label>
                    <input type="text" class="form-control" name="Nome" id="Nome" aria-describedby="helpId"
                        placeholder="">
                </div>
                <div class="form-group md col-12">
                    <label for="">Senha</label>
                    <input type="text" class="form-control" name="Senha" id="Senha" aria-describedby="helpId"
                        placeholder="">
                </div>
                <?php if($Tipo <> 'Login') {?>
                <div class="form-group md col-12">
                    <label for="">E-mail</label>
                    <input type="text" class="form-control" name="Email" id="Email" aria-describedby="helpId"
                        placeholder="">
                </div>
                <?php } ?>
                <div class="form-group md col-5">
                    <input name="Enviar" id="Btn" class="btn btn-primary" onclick='Validar();'type="button" value="Enviar">
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

        #h {
            justify-content: center;
            align-items: center;
        }

        #Btn {
            width: 478px;
        }
    </style>
    <script>
        function Validar() {
            document.getElementById('Nome').value =='' ? alert('Por Favor Preencha o nome.') : document.forms['Form'].submit();
            document.getElementById('Senha').value =='' ? alert('Por Favor Preencha a Senha.') : document.forms['Form'].submit();
            <?php if($Tipo <> 'Login'){ ?>
            document.getElementById('Email').value =='' ? alert('Por Favor Preencha o E-Mail.') : document.forms['Form'].submit();
            <?php } ?>
        }
    </script>
@endsection
