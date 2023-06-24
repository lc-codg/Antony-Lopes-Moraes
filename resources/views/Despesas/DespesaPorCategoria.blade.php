<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  @include('Header')
</head>

<body>
  <div class='. container-fluid'>
    <br>
    <h4 id='Titulo' class="card-title">Relatório de Despesas Por Categoria</h4>
    <div class='form-row'>
      <div class="form-group md col-2">
        <label for="">Data inicial</label>
        <input type="date" class="form-control" value="{{Date('Y-m-d')}}" name="DataIni" id="DataIni" aria-describedby="helpId" placeholder="">
      </div>

      <div class="form-group md col-2">
        <label for="">Data final</label>
        <input type="date" class="form-control" value="{{Date('Y-m-d')}}" name="DataFim" id="DataFim" aria-describedby="helpId" placeholder="">
      </div>
      <div class="form-group md col-8">
        <label for="">Empresa</label>
        <select style="width:100%;" class="form-control" name="Empresa" id="Empresa">
          <option selected>Selecione...</option>
          @foreach ($Empresas as $item)
          <option>{{$item->id .'-' .$item->Razao}}</option>
          @endforeach


        </select>
      </div>
    </div>
    <input name="" id="BtnPesquisa" onclick="RelatorioCategoria();" class="btn btn-primary" type="button" value="Pesquisar">
    <input name="" id="BtnImprimir" onclick="Imprimir();" class="btn btn-danger" type="button" value="Imprimir">
<br>
<br>
    <table id="tabelaPedidos" class="table table-bordered table-condensed " style="font-size: 15px; width:100%;">

<thead class="thead-dark">
  <tr>
    <th>Código</th>
  </tr>
</thead>
<tbody id='Cat'>
   
  </div>


  </tr>
      </thead>
     

    </table>
   
  </div>

</body>
@include('footer')
<script src="{{ asset('js/Despesa.js') }}"></script>

</html>