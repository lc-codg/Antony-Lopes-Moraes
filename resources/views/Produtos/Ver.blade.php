<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

</head>
@include('Header')

<h5 Style='margin-left:1%;' class="text-left">Cadastro de Produto</h5>

<body>
    <ul class="nav-tabs nav">

        <li class="nav-item">
            <a href="#Dados" data-toggle="tab" class="active nav-link">Dados</a>
        </li>

        <li class="nav-item">
            <a href="#Tributacao" data-toggle="tab" class="nav-link">Tributação</a>
        </li>

        <li class="nav-item">
            <a href="#Outros" data-toggle="tab" class="nav-link">Outros</a>
        </li>

    </ul>

    <form method="get" action="/Produtos/Editar/{{$produto->id}}">
        @csrf
        <div class="tab-content">

            <div id="Dados" class="tab-pane active .container-fluid">

                <div Style='margin-left:1%;margin-right:1%;' class='form-row'>

                    <div class="form-group col-md-2">
                        <label for="">Barras</label>
                        <input required type="text" value="{{$produto->Barras}}"class="form-control" name="Barras" id="" aria-describedby="helpId" placeholder="">
                    </div>

                    <div class="form-group col-md-9">
                        <label for="">Descrição</label>
                        <input required  type="text" value="{{$produto->Descricao}}"class="form-control" name="Descricao" id="" aria-describedby="helpId" placeholder="">
                    </div>

                    <div class="form-group col-md-2">
                        <label for="">Quantidade</label>
                        <input  type="text" value="{{$produto->Quantidade}}"class="form-control" name="Quantidade" id="" aria-describedby="helpId" placeholder="">
                    </div>

                    <div class="form-group col-md-2">
                        <label for="">Peso</label>
                        <input  type="text" value="{{$produto->Peso}}"class="form-control" name="peso" id="" aria-describedby="helpId" placeholder="">
                    </div>

                    <div class="form-group col-md-2">
                        <label for="">Preço de Venda</label>
                        <input required  type="text" value="{{$produto->ValorUnitario}}"class="form-control" name="ValorUnitario" id="" aria-describedby="helpId" placeholder="">
                    </div>

                    <div class="form-group col-md-2">
                        <label for="">Preço Promoção</label>
                        <input  type="text" value="{{$produto->ValorPromocao}}"class="form-control" name="promocao" id="" aria-describedby="helpId" placeholder="">
                    </div>

                    <div class="form-group col-md-2">
                        <label for="">Preço a Prazo</label>
                        <input  type="text" value="{{$produto->ValorPrazo}}"class="form-control" name="prazo" id="" aria-describedby="helpId" placeholder="">
                    </div>

                    <div class="form-group col-md-2">
                        <label for="">Preço de Custo</label>
                        <input  type="text" value="{{$produto->Custo}}"class="form-control" name="custo" id="" aria-describedby="helpId" placeholder="">
                    </div>
                    
                    <div class="form-group col-md-4">
                      <label for="">Seção</label>
                      <select class="form-control" name="secao" id="">
                        <option></option>
                        <option></option>
                        <option></option>
                      </select>
                    </div>

                    <div class="form-group col-md-4">
                      <label for="">Sub.Seção</label>
                      <select class="form-control" name="secao"  id="">
                        <option></option>
                        <option></option>
                        <option></option>
                      </select>
                    </div>


                </div>

            </div>

            <div id="Tributacao" class="tab-pane .container-fluid">

                <div Style='margin-left:1%; margin-right:1%;' class='form-row'>

                    <div class="form-group col-md-2">
                        <label for="">Ncm</label>
                        <input  type="text" value="{{$produto->Ncm}}"class="form-control" name="ncm" id="" aria-describedby="helpId" placeholder="">
                    </div>

                    <div class="form-group col-md-2">
                        <label for="">Cest</label>
                        <input  type="text" value="{{$produto->Cest}}"class="form-control" name="cest" id="" aria-describedby="helpId" placeholder="">
                    </div>

                    <div class="form-group col-md-2">
                        <label for="">Origem</label>
                        <input  type="text" value="{{$produto->Origem}}"class="form-control" name="origem" id="" aria-describedby="helpId" placeholder="">
                    </div>

                    <div class="form-group col-md-2">
                        <label for="">Csosn/Cst</label>
                        <input type="number" value="{{$produto->Cst}}"class="form-control" name="cst" id="" aria-describedby="helpId" placeholder="">
                    </div>

                    <div class="form-group col-md-2">
                        <label for="">Cfop</label>
                        <input  type="Number" value="{{$produto->Cfop}}"class="form-control" name="cfop" id="" aria-describedby="helpId" placeholder="">
                    </div>

                    <div class="form-group col-md-2">
                        <label for="">Aliquota Icms</label>
                        <input  type="text" value="{{$produto->Icms}}"class="form-control" name="icms" id="" aria-describedby="helpId" placeholder="">
                    </div>

                    <div class="form-group col-md-2">
                        <label for="">Base Icms</label>
                        <input  type="text" value="{{$produto->BaseIcms}}"class="form-control" name="base" id="" aria-describedby="helpId" placeholder="">
                    </div>

                    <div class="form-group col-md-2">
                        <label for="">Redução</label>
                        <input  type="text" value="{{$produto->Reducao}}"class="form-control" name="reducao" id="" aria-describedby="helpId" placeholder="">
                    </div>

                    <div class="form-group col-md-2">
                        <label for="">Beneficio</label>
                        <input  type="text" value="{{$produto->Beneficio}}"class="form-control" name="beneficio" id="" aria-describedby="helpId" placeholder="">
                    </div>

                    <div class="form-group col-md-2">
                        <label for="">Aliquota St</label>
                        <input  type="text" value="{{$produto->St}}"class="form-control" name="st" id="" aria-describedby="helpId" placeholder="">
                    </div>

                    <div class="form-group col-md-2">
                        <label for="">Base St</label>
                        <input  type="text" value="{{$produto->BaseSt}}"class="form-control" name="basest" id="" aria-describedby="helpId" placeholder="">
                    </div>

                    <div class="form-group col-md-2">
                        <label for="">Mva</label>
                        <input  type="text" value="{{$produto->Mva}}"class="form-control" name="mva" id="" aria-describedby="helpId" placeholder="">
                    </div>

                </div>
                <br>
                <div Style='margin-left:1%;margin-right:1%;' class='form-row'>

                    <div class="form-group col-md-2">
                        <label for="">Codigo Pis</label>
                        <input  type="text" value="{{$produto->CodPis}}"class="form-control" name="codpis" id="" aria-describedby="helpId" placeholder="">
                    </div>

                    <div class="form-group col-md-2">
                        <label for="">Aliquota Pis</label>
                        <input  type="text" value="{{$produto->AlPis}}"class="form-control" name="alpis" id="" aria-describedby="helpId" placeholder="">
                    </div>

                    <div class="form-group col-md-2">
                        <label for="">Base Pis</label>
                        <input  type="text" value="{{$produto->BasePis}}"class="form-control" name="basepis" id="" aria-describedby="helpId" placeholder="">
                    </div>

                    <div class="form-group col-md-2">
                        <label for="">Codigo Cofins</label>
                        <input  type="text" value="{{$produto->CodCofins}}"class="form-control" name="codcofins" id="" aria-describedby="helpId" placeholder="">
                    </div>

                    <div class="form-group col-md-2">
                        <label for="">Aliquota Cofins</label>
                        <input  type="text" value="{{$produto->AlCofins}}"class="form-control" name="alcofins" id="" aria-describedby="helpId" placeholder="">
                    </div>

                    <div class="form-group col-md-2">
                        <label for="">Base Cofins</label>
                        <input  type="text" value="{{$produto->Basecofins}}"class="form-control" name="basecofins" id="" aria-describedby="helpId" placeholder="">
                    </div>

                    <div class="form-group col-md-2">
                        <label for="">Codigo Ipi</label>
                        <input  type="text" value="{{$produto->CodIpi}}"class="form-control" name="codipi" id="" aria-describedby="helpId" placeholder="">
                    </div>

                    <div class="form-group col-md-2">
                        <label for="">Aliquota Ipi</label>
                        <input  type="text" value="{{$produto->Alipi}}"class="form-control" name="alipi" id="" aria-describedby="helpId" placeholder="">
                    </div>

                    <div class="form-group col-md-2">
                        <label for="">Base Ipi</label>
                        <input  type="text" value="{{$produto->BaseIpi}}"class="form-control" name="baseipi" id="" aria-describedby="helpId" placeholder="">
                    </div>



                </div>

            </div>

            <div id="Outros" class="tab-pane .container-fluid">

                <div Style='margin-left:1%;margin-right:1%;' class='form-row'>

                    <div class="form-group col-md-2">
                        <label for="">Tamanho</label>
                        <input  type="text" value="{{$produto->Tamanho}}"class="form-control" name="tamanho" id="" aria-describedby="helpId" placeholder="">
                    </div>

                    <div class="form-group col-md-2">
                        <label for="">Cor</label>
                        <input  type="text" value="{{$produto->Cor}}"class="form-control" name="cor" id="" aria-describedby="helpId" placeholder="">
                    </div>

                    <div class="form-group col-md-2">
                        <label for="">Referência</label>
                        <input  type="text" value="{{$produto->Referencia}}"class="form-control" name="referencia" id="" aria-describedby="helpId" placeholder="">
                    </div>

                    <div class="form-group col-md-2">
                        <label for="">Fator</label>
                        <input  type="text" value="{{$produto->Fator}}"class="form-control" name="fator" id="" aria-describedby="helpId" placeholder="">
                    </div>

                    <div class="form-group col-md-2">
                        <label for="">Modelo</label>
                        <input  type="text" value="{{$produto->Modelo}}"class="form-control" name="modelo" id="" aria-describedby="helpId" placeholder="">
                    </div>

                    <div class="form-group col-md-2">
                        <label for="">Série</label>
                        <input  type="text" value="{{$produto->Serie}}"class="form-control" name="serie" id="" aria-describedby="helpId" placeholder="">
                    </div>

                    <div class="form-group col-md-2">
                        <label for="">Suframa</label>
                        <input  type="text" value="{{$produto->Suframa}}"class="form-control" name="suframa" id="" aria-describedby="helpId" placeholder="">
                    </div>

                    <div class="form-group col-md-2">
                        <label for="">Validade</label>
                        <input  type="text" value="{{$produto->Validade}}"class="form-control" name="validade" id="" aria-describedby="helpId" placeholder="">
                    </div>

                    <div class="form-group col-md-2">
                        <label for="">N° Lote</label>
                        <input  type="text" value="{{$produto->Lote}}"class="form-control" name="lote" id="" aria-describedby="helpId" placeholder="">
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
@include('footer')

</html>