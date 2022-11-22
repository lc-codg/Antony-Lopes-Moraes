<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('Header')
</head>

<body>
    <p></p>
    <div class='. container-fluid'>
        <h5 class='card-title'>Cálcula Abate</h5>
        <form method='post' action='Abate/Salvar'>
            <div class='form-row'>

                <div class="form-group md col-2">
                    <label for="">Peso</label>
                    <input type="number" pattern="[0-9]+([,\.][0-9]+)?" min="0" step="any"
                        class="form-control" name="" value='230' readOnly id="230"
                        aria-describedby="helpId" placeholder="">
                </div>
                <div class="form-group md col-2">
                    <label for="">Valor</label>
                    <input type="number" pattern="[0-9]+([,\.][0-9]+)?" min="0" step="any"
                        class="form-control"name="" id="230v" aria-describedby="helpId" placeholder="">
                </div>
                <div class="form-group md col-2">
                    <label for="">Peso</label>
                    <input type="number" pattern="[0-9]+([,\.][0-9]+)?" min="0" step="any"
                        class="form-control" value='220' readOnly name="" id="220"
                        aria-describedby="helpId" placeholder="">
                </div>
                <div class="form-group md col-2">
                    <label for="">Valor</label>
                    <input type="number" pattern="[0-9]+([,\.][0-9]+)?" min="0" step="any"
                        class="form-control"name="" id="220v" aria-describedby="helpId" placeholder="">
                </div>
                <div class="form-group md col-2">
                    <label for="">Peso</label>
                    <input type="number" pattern="[0-9]+([,\.][0-9]+)?" min="210" step="any"
                        class="form-control"value='210' readOnly name="" id=""
                        aria-describedby="helpId" placeholder="">
                </div>
                <div class="form-group md col-2">
                    <label for="">Valor</label>
                    <input type="number" pattern="[0-9]+([,\.][0-9]+)?" min="0" step="any"
                        class="form-control"name="" id="210v" aria-describedby="helpId" placeholder="">
                </div>
                <div class="form-group md col-2">
                    <label for="">Peso</label>
                    <input type="number" pattern="[0-9]+([,\.][0-9]+)?" min="0" step="any"
                        class="form-control" value='200' readOnly name="" id="200"
                        aria-describedby="helpId" placeholder="">
                </div>
                <div class="form-group md col-2">
                    <label for="">Valor</label>
                    <input type="number" pattern="[0-9]+([,\.][0-9]+)?" min="0" step="any"
                        class="form-control"name="" id="200v" aria-describedby="helpId" placeholder="">
                </div>
                <div class="form-group md col-2">
                    <label for="">Peso</label>
                    <input type="number" pattern="[0-9]+([,\.][0-9]+)?" min="0" step="any"
                        class="form-control" value='190' readOnly name="" id="190"
                        aria-describedby="helpId" placeholder="">
                </div>
                <div class="form-group md col-2">
                    <label for="">Valor</label>
                    <input type="number" pattern="[0-9]+([,\.][0-9]+)?" min="0" step="any"
                        class="form-control"name="" id="190v" aria-describedby="helpId" placeholder="">
                </div>
                <div class="form-group md col-2">
                    <label for="">Peso</label>
                    <input type="number" pattern="[0-9]+([,\.][0-9]+)?" min="0" step="any"
                        class="form-control" value='180' readOnly name="" id="180"
                        aria-describedby="helpId" placeholder="">
                </div>
                <div class="form-group md col-2">
                    <label for="">Valor</label>
                    <input type="number" pattern="[0-9]+([,\.][0-9]+)?" min="0" step="any"
                        class="form-control"name="" id="180v" aria-describedby="helpId" placeholder="">
                </div>
                <div class="form-group md col-2">
                    <label for="">Peso</label>
                    <input type="number" pattern="[0-9]+([,\.][0-9]+)?" min="0" step="any"
                        class="form-control" value='170' readOnly name="" id="170"
                        aria-describedby="helpId" placeholder="">
                </div>
                <div class="form-group md col-2">
                    <label for="">Valor</label>
                    <input type="number" pattern="[0-9]+([,\.][0-9]+)?" min="0" step="any"
                        class="form-control"name="" id="170v" aria-describedby="helpId" placeholder="">
                </div>
                <div class="form-group md col-2">
                    <label for="">Peso</label>
                    <input type="number" pattern="[0-9]+([,\.][0-9]+)?" min="0" step="any"
                        class="form-control" value='160' readOnly name="" id="170"
                        aria-describedby="helpId" placeholder="">
                </div>
                <div class="form-group md col-2">
                    <label for="">Valor</label>
                    <input type="number" pattern="[0-9]+([,\.][0-9]+)?" min="0" step="any"
                        class="form-control"name="" id="160v" aria-describedby="helpId" placeholder="">
                </div>

            </div>
            <input name="" id="" onclick ='Apurar();'class="btn btn-dark" type="button" value="Apurar">

            <p></p>
            <table id="tabelaPedidos" class="table table-bordered table-condensed "
                style="font-size: 12px; width:100%;">
                <thead class="thead-dark">
                    <tr>
                        <th>Faixa</th>
                        <th>Peso</th>
                        <th>Quantidade</th>
                        <th>Valor</th>

                    </tr>
                    <tr>
                        <td>
                            <input type="text" class="form-control" name="" id="faixa"
                                aria-describedby="helpId" placeholder="">
                        </td>

                        <td>
                            <input type="text" class="form-control" name="" id="peso"
                                aria-describedby="helpId" placeholder="">
                        </td>

                        <td>
                            <input type="text" class="form-control" name="" id="quantidade"
                                aria-describedby="helpId" placeholder="">
                        </td>

                        <td>
                            <input type="text" class="form-control" name="" id="valor"
                                aria-describedby="helpId" placeholder="">
                        </td>


                    </tr>
                    <tr>
                        <td>
                            <input type="text" class="form-control" name="" id="faixa2"
                                aria-describedby="helpId" placeholder="">
                        </td>

                        <td>
                            <input type="text" class="form-control" name="" id="peso2"
                                aria-describedby="helpId" placeholder="">
                        </td>

                        <td>
                            <input type="text" class="form-control" name="" id="quantidade2"
                                aria-describedby="helpId" placeholder="">
                        </td>

                        <td>
                            <input type="text" class="form-control" name="" id="valor2"
                                aria-describedby="helpId" placeholder="">
                        </td>


                    </tr>
                    <tr>
                        <td>
                            <input type="text" class="form-control" name="" id="faixa3"
                                aria-describedby="helpId" placeholder="">
                        </td>

                        <td>
                            <input type="text" class="form-control" name="" id="peso3"
                                aria-describedby="helpId" placeholder="">
                        </td>

                        <td>
                            <input type="text" class="form-control" name="" id="quantidade3"
                                aria-describedby="helpId" placeholder="">
                        </td>

                        <td>
                            <input type="text" class="form-control" name="" id="valor3"
                                aria-describedby="helpId" placeholder="">
                        </td>


                    </tr>
                    <tr>
                        <td>
                            <input type="text" class="form-control" name="" id="faixa4"
                                aria-describedby="helpId" placeholder="">
                        </td>

                        <td>
                            <input type="text" class="form-control" name="" id="peso4"
                                aria-describedby="helpId" placeholder="">
                        </td>

                        <td>
                            <input type="text" class="form-control" name="" id="quantidade4"
                                aria-describedby="helpId" placeholder="">
                        </td>

                        <td>
                            <input type="text" class="form-control" name="" id="valor4"
                                aria-describedby="helpId" placeholder="">
                        </td>


                    </tr>
                    <tr>
                        <td>
                            <input type="text" class="form-control" name="" id="faixa5"
                                aria-describedby="helpId" placeholder="">
                        </td>

                        <td>
                            <input type="text" class="form-control" name="" id="peso5"
                                aria-describedby="helpId" placeholder="">
                        </td>

                        <td>
                            <input type="text" class="form-control" name="" id="quantidade5"
                                aria-describedby="helpId" placeholder="">
                        </td>

                        <td>
                            <input type="text" class="form-control" name="" id="valor5"
                                aria-describedby="helpId" placeholder="">
                        </td>


                    </tr>
                    <tr>
                        <td>
                            <input type="text" class="form-control" name="" id="faixa6"
                                aria-describedby="helpId" placeholder="">
                        </td>

                        <td>
                            <input type="text" class="form-control" name="" id="peso6"
                                aria-describedby="helpId" placeholder="">
                        </td>

                        <td>
                            <input type="text" class="form-control" name="" id="quantidade6"
                                aria-describedby="helpId" placeholder="">
                        </td>

                        <td>
                            <input type="text" class="form-control" name="" id="valor6"
                                aria-describedby="helpId" placeholder="">
                        </td>


                    </tr>
                    <tr>
                        <td>
                            <input type="text" class="form-control" name="" id="faixa7"
                                aria-describedby="helpId" placeholder="">
                        </td>

                        <td>
                            <input type="text" class="form-control" name="" id="peso7"
                                aria-describedby="helpId" placeholder="">
                        </td>

                        <td>
                            <input type="text" class="form-control" name="" id="quantidade7"
                                aria-describedby="helpId" placeholder="">
                        </td>

                        <td>
                            <input type="text" class="form-control" name="" id="valor7"
                                aria-describedby="helpId" placeholder="">
                        </td>


                    </tr>
                    <tr>
                        <td>
                            <input type="text" class="form-control" name="" id="faixa8"
                                aria-describedby="helpId" placeholder="">
                        </td>

                        <td>
                            <input type="text" class="form-control" name="" id="peso8"
                                aria-describedby="helpId" placeholder="">
                        </td>

                        <td>
                            <input type="text" class="form-control" name="" id="quantidade8"
                                aria-describedby="helpId" placeholder="">
                        </td>

                        <td>
                            <input type="text" class="form-control" name="" id="valor8"
                                aria-describedby="helpId" placeholder="">
                        </td>


                    </tr>

                </thead>
                <tbody id='Categorias'>

            </table>
        </form>

    </div>
    <p></p>
    <br>
</body>
<script src="{{ asset('js/Abate.js') }}"></script>
@include('footer')

</html>
