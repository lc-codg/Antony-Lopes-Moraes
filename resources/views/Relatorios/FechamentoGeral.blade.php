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
    <h5 id='Titulo' class="card-title">Movimento Financeiro</h5>
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
        <select class="form-control" name="Empresa" id="Empresa">
          <option selected>Selecione...</option>
          @foreach ($Empresa as $item)
          <option>{{$item->id .'-' .$item->Razao}}</option>
          @endforeach


        </select>
      </div>
    </div>
    <input name="" id="BtnPesquisa" onclick="FechamentoGeral();" class="btn btn-primary" type="button" value="Pesquisar">
    <input name="" id="BtnImprimir" onclick="Imprimir();" class="btn btn-danger" type="button" value="Imprimir">
    <br>
    <br>




    <div class='form-row'>

      <div id='Arrecadado' class="btn-group md col-02">

      </div>
    </div>

    <table id="tabelaPedidos" class="table table-bordered table-condensed " style="font-size: 12px; width:100%;">

      <thead class="thead-dark">

        <tr>
          <th>Arrecadação</th>
          <th>Valor</th>



        </tr>
      </thead>
      <tbody id='Contas'>


    </table>
    <div id='TotalFaturamento'>
    </div>
    <table id="tabelaPedidos" class="table table-bordered table-condensed " style="font-size: 12px; width:100%;">

      <thead class="thead-dark">
        <tr>
          <th>Compras</th>
          <th>Valor</th>

        </tr>
      </thead>
      <tbody id='Compras'>


    </table>
    <div id='EstoqueAtual'>
    </div>
    <div id='EstoqueAnterior'>
    </div>
    <div id='TotalCompra'>
    </div>

    <table id="tabelaPedidos" class="table table-bordered table-condensed " style="font-size: 12px; width:100%;">

      <thead class="thead-dark">
        <tr>
          <th>Despesas</th>
          <th>Valor</th>

        </tr>
      </thead>
      <tbody id='Despesas'>


    </table>

    <div id='TotalDespesa'>
    </div>
   
    <div id='LucroBruto'>
    </div>
    <div id='LucroLiquido'>
    </div>
    

  </div>

  </div>

</body>
@include('footer')
<script src="{{ asset('js/Movimento.js') }}"></script>

</html>