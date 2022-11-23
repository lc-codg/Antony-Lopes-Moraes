<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="{{ URL::asset('css/app.css') }}" rel="stylesheet" type="text/css">

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
                    <input readOnly type="number" pattern="[0-9]+([,\.][0-9]+)?" min="0" step="any"
                        class="form-control" name="" value='230' readOnly id="0p"
                        aria-describedby="helpId" placeholder="">
                </div>
                <div class="form-group md col-2">
                    <label for="">Valor</label>
                    <input type="number" pattern="[0-9]+([,\.][0-9]+)?" min="0" step="any"
                        class="form-control"name="" value='0' id="0" aria-describedby="helpId"
                        placeholder="">
                </div>
                <div class="form-group md col-2">
                    <label for="">Peso</label>
                    <input readOnly type="number" pattern="[0-9]+([,\.][0-9]+)?" min="0" step="any"
                        class="form-control" value='220' readOnly name="" id="1p"
                        aria-describedby="helpId" placeholder="">
                </div>
                <div class="form-group md col-2">
                    <label for="">Valor</label>
                    <input type="number" pattern="[0-9]+([,\.][0-9]+)?" min="0" step="any"
                        class="form-control"name=""value='0' id="1" aria-describedby="helpId"
                        placeholder="">
                </div>
                <div class="form-group md col-2">
                    <label for="">Peso</label>
                    <input readOnly type="number" pattern="[0-9]+([,\.][0-9]+)?" min="2" step="any"
                        class="form-control"value='210' readOnly name="" id="2p"
                        aria-describedby="helpId" placeholder="">
                </div>
                <div class="form-group md col-2">
                    <label for="">Valor</label>
                    <input type="number" pattern="[0-9]+([,\.][0-9]+)?" min="0" step="any"
                        class="form-control"name="" value='0'id="2" aria-describedby="helpId"
                        placeholder="">
                </div>
                <div class="form-group md col-2">
                    <label for="">Peso</label>
                    <input readOnly type="number" pattern="[0-9]+([,\.][0-9]+)?" min="0" step="any"
                        class="form-control" value='200' readOnly name="" id="3p"
                        aria-describedby="helpId" placeholder="">
                </div>
                <div class="form-group md col-2">
                    <label for="">Valor</label>
                    <input type="number" pattern="[0-9]+([,\.][0-9]+)?" min="0" step="any"
                        class="form-control"name="" value='0'id="3" aria-describedby="helpId"
                        placeholder="">
                </div>
                <div class="form-group md col-2">
                    <label for="">Peso</label>
                    <input readOnly type="number" pattern="[0-9]+([,\.][0-9]+)?" min="0" step="any"
                        class="form-control" value='190' readOnly name="" id="4p"
                        aria-describedby="helpId" placeholder="">
                </div>
                <div class="form-group md col-2">
                    <label for="">Valor</label>
                    <input type="number" pattern="[0-9]+([,\.][0-9]+)?" min="0" step="any"
                        class="form-control"name="" value='0'id="4" aria-describedby="helpId"
                        placeholder="">
                </div>
                <div class="form-group md col-2">
                    <label for="">Peso</label>
                    <input readOnly type="number" pattern="[0-9]+([,\.][0-9]+)?" min="0" step="any"
                        class="form-control" value='180' readOnly name="" id="5p"
                        aria-describedby="helpId" placeholder="">
                </div>
                <div class="form-group md col-2">
                    <label for="">Valor</label>
                    <input type="number" pattern="[0-9]+([,\.][0-9]+)?" min="0" step="any"
                        class="form-control"name="" value='0'id="5" aria-describedby="helpId"
                        placeholder="">
                </div>
                <div class="form-group md col-2">
                    <label for="">Peso</label>
                    <input readOnly type="number" pattern="[0-9]+([,\.][0-9]+)?" min="0" step="any"
                        class="form-control" value='170' readOnly name="" id="6p"
                        aria-describedby="helpId" placeholder="">
                </div>
                <div class="form-group md col-2">
                    <label for="">Valor</label>
                    <input type="number" pattern="[0-9]+([,\.][0-9]+)?" min="0" step="any"
                        class="form-control"name="" value='0'id="6" aria-describedby="helpId"
                        placeholder="">
                </div>
                <div class="form-group md col-2">
                    <label for="">Peso</label>
                    <input readOnly type="number" pattern="[0-9]+([,\.][0-9]+)?" min="0" step="any"
                        class="form-control" value='160' readOnly name="" id="7p"
                        aria-describedby="helpId" placeholder="">
                </div>
                <div class="form-group md col-2">
                    <label for="">Valor</label>
                    <input type="number" pattern="[0-9]+([,\.][0-9]+)?" min="0" step="any"
                        class="form-control"name=""value='0' id="7" aria-describedby="helpId"
                        placeholder="">
                </div>

            </div>
            <label for="">Peso</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control md col-3" id='Pesado' placeholder=""
                    aria-label="Recipient's username" aria-describedby="button-addon1">
                <div class="input-group-append">

                    <input readOnly name=""id="" onclick='Inserir();' class="btn btn-danger "
                        type="button" value="Inserir">
                </div>

            </div>

            <input readOnly name=""id="" onClick="window.print()" class="btn btn-dark "
                type="button" value="Apurar">





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
                            <input readOnly type="text" class="form-control" name="" id="faixa0"
                                aria-describedby="helpId" placeholder="">
                        </td>

                        <td>
                            <input readOnly type="text" class="form-control" name="" id="peso0"
                                aria-describedby="helpId" placeholder="">
                        </td>

                        <td>
                            <input type="text" class="form-control" name="" id="quantidade0"
                                aria-describedby="helpId" placeholder="">
                        </td>

                        <td>
                            <input readOnly type="text" class="form-control" name="" id="valor0"
                                aria-describedby="helpId" placeholder="">
                        </td>


                    </tr>
                    <tr>
                        <td>
                            <input readOnly type="text" class="form-control" name="" id="faixa1"
                                aria-describedby="helpId" placeholder="">
                        </td>

                        <td>
                            <input readOnly type="text" class="form-control" name="" id="peso1"
                                aria-describedby="helpId" placeholder="">
                        </td>

                        <td>
                            <input type="text" class="form-control" name="" id="quantidade1"
                                aria-describedby="helpId" placeholder="">
                        </td>

                        <td>
                            <input readOnly type="text" class="form-control" name="" id="valor1"
                                aria-describedby="helpId" placeholder="">
                        </td>


                    </tr>
                    <tr>
                        <td>
                            <input readOnly type="text" class="form-control" name="" id="faixa2"
                                aria-describedby="helpId" placeholder="">
                        </td>

                        <td>
                            <input readOnly type="text" class="form-control" name="" id="peso2"
                                aria-describedby="helpId" placeholder="">
                        </td>

                        <td>
                            <input type="text" class="form-control" name="" id="quantidade2"
                                aria-describedby="helpId" placeholder="">
                        </td>

                        <td>
                            <input readOnly type="text" class="form-control" name="" id="valor2"
                                aria-describedby="helpId" placeholder="">
                        </td>


                    </tr>
                    <tr>
                        <td>
                            <input readOnly type="text" class="form-control" name="" id="faixa3"
                                aria-describedby="helpId" placeholder="">
                        </td>

                        <td>
                            <input readOnly type="text" class="form-control" name="" id="peso3"
                                aria-describedby="helpId" placeholder="">
                        </td>

                        <td>
                            <input type="text" class="form-control" name="" id="quantidade3"
                                aria-describedby="helpId" placeholder="">
                        </td>

                        <td>
                            <input readOnly type="text" class="form-control" name="" id="valor3"
                                aria-describedby="helpId" placeholder="">
                        </td>


                    </tr>
                    <tr>
                        <td>
                            <input readOnly type="text" class="form-control" name="" id="faixa4"
                                aria-describedby="helpId" placeholder="">
                        </td>

                        <td>
                            <input readOnly type="text" class="form-control" name="" id="peso4"
                                aria-describedby="helpId" placeholder="">
                        </td>

                        <td>
                            <input type="text" class="form-control" name="" id="quantidade4"
                                aria-describedby="helpId" placeholder="">
                        </td>

                        <td>
                            <input readOnly type="text" class="form-control" name="" id="valor4"
                                aria-describedby="helpId" placeholder="">
                        </td>


                    </tr>
                    <tr>
                        <td>
                            <input readOnly type="text" class="form-control" name="" id="faixa5"
                                aria-describedby="helpId" placeholder="">
                        </td>

                        <td>
                            <input readOnly type="text" class="form-control" name="" id="peso5"
                                aria-describedby="helpId" placeholder="">
                        </td>

                        <td>
                            <input type="text" class="form-control" name="" id="quantidade5"
                                aria-describedby="helpId" placeholder="">
                        </td>

                        <td>
                            <input readOnly type="text" class="form-control" name="" id="valor5"
                                aria-describedby="helpId" placeholder="">
                        </td>


                    </tr>
                    <tr>
                        <td>
                            <input readOnly type="text" class="form-control" name="" id="faixa6"
                                aria-describedby="helpId" placeholder="">
                        </td>

                        <td>
                            <input readOnly type="text" class="form-control" name="" id="peso6"
                                aria-describedby="helpId" placeholder="">
                        </td>

                        <td>
                            <input type="text" class="form-control" name="" id="quantidade6"
                                aria-describedby="helpId" placeholder="">
                        </td>

                        <td>
                            <input readOnly type="text" class="form-control" name="" id="valor6"
                                aria-describedby="helpId" placeholder="">
                        </td>


                    </tr>
                    <tr>
                        <td>
                            <input readOnly type="text" class="form-control" name="" id="faixa7"
                                aria-describedby="helpId" placeholder="">
                        </td>

                        <td>
                            <input readOnly type="text" class="form-control" name="" id="peso7"
                                aria-describedby="helpId" placeholder="">
                        </td>

                        <td>
                            <input type="text" class="form-control" name="" id="quantidade7"
                                aria-describedby="helpId" placeholder="">
                        </td>

                        <td>
                            <input readOnly type="text" class="form-control" name="" id="valor7"
                                aria-describedby="helpId" placeholder="">
                        </td>


                    </tr>

                </thead>
                <tbody id='Categorias'>

            </table>
    
            <div class="card">

                <div class="card-body">

                    <div class='form-row'>
                        <div class="form-group md col-10">
                            <label for="">Vendedor</label>
                            <input type="text" step="any" class="form-control" name="" value=''
                                id="" aria-describedby="helpId" placeholder="">
                        </div>
                        <div class="form-group md col-2">
                            <label for="">Data</label>
                            <input type="date" class="form-control" name=""
                                value='{{ Date('Y-m-d') }}'id="" aria-describedby="helpId" placeholder="">

                        </div>


                        <div class="form-group md col-2">
                            <label for="">Total Apurado</label>
                            <input readOnly type="number" pattern="[0-9]+([,\.][0-9]+)?" min="0" step="any"
                                class="form-control" name="" value='' readOnly id="Totala"
                                aria-describedby="helpId" placeholder="">
                        </div>


                        <div class="form-group md col-2">
                            <label for="">Quantidade Total</label>
                            <input readOnly type="number" pattern="[0-9]+([,\.][0-9]+)?" min="0" step="any"
                                class="form-control" name="" value='' readOnly id="Totalq"
                                aria-describedby="helpId" placeholder="">
                        </div>

                        <div class="form-group md col-2">
                            <label for="">Subtotal Total</label>
                            <input readOnly type="number" pattern="[0-9]+([,\.][0-9]+)?" min="0" step="any"
                                class="form-control" name="" value='' readOnly id="Totals"
                                aria-describedby="helpId" placeholder="">
                        </div>
                    </div>
                </div>
            </div>
            <br>    </form>

    </div>

    <p></p>
    <br>
</body>
<script src="{{ asset('js/Abate.js') }}"></script>
@include('footer')

</html>
