<!DOCTYPE html>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.4.1/jspdf.debug.js" integrity="sha384-THVO/sM0mFD9h7dfSndI6TS0PgAGavwKvB5hAxRRvc0o9cPLohB0wb/PTA7LdUHs" crossorigin="anonymous"></script>
<html lang="pt-br">
@php
date_default_timezone_set('America/Sao_Paulo');
@endphp

<head>
  <meta charset="utf-8">
  <title>Frigo Erp| Sistema de Gerenciamento financeiro | Emissor de Pedidos| Rio de Janeiro | Brasil | Suporte:(21098837-3398</title>
  <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
    <a Style=" font-size: 30px;color:white;" class="navbar-brand" href="/home">FrigoErp</a>
    <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation"></button>

    <div class="collapse navbar-collapse" id="collapsibleNavId">
      <ul class="navbar-nav mr-auto mt-2 mt-lg-0">


        <?php
        $Usuarios = Session()->get('DadosUsuarios');

        if ($Usuarios->Cadastro <> Null) { ?>

          <li class="nav-item dropdown">
            <a style='color:white;' class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Cadastro</a>
            <div class="dropdown-menu">

              <div class="list-group">
                <a href="#" class="list-group-item-dark  list-group-item-action active" aria-current="true">
                  Produtos
                </a>
                <a class="dropdown-item" href="/Produtos/Novo">Lançar Produtos</a>
                <a class="dropdown-item" href="/Produtos/Todos">Listar Produtos</a>
              </div>
              <div class="list-group">
                <a href="" class="list-group-item-dark  list-group-item-action active" aria-current="True">
                  Clientes
                </a>
                <a class="dropdown-item" href="/Clientes/Novo">Lançar Clientes</a>
                <a class="dropdown-item" href="/Clientes/Todos">Listar Clientes</a>
              </div>

              <div class="list-group">
                <a href="" class="list-group-item-dark  list-group-item-action active" aria-current="False">
                  Fornecedores
                </a>
                <a class="dropdown-item" href="/Fornecedor/Novo">Lançar Fornecedores</a>
                <a class="dropdown-item" href="/Fornecedor/Todos">Listar Fornecedores</a>
              </div>

              <div class="list-group">
                <a href="" class="list-group-item-dark  list-group-item-action active" aria-current="False">
                  Empresas
                </a>
                <a class="dropdown-item" href="/Empresa/Novo">Lançar Empresas</a>
                <a class="dropdown-item" href="/Empresa/Todos">Listar Empresas</a>
              </div>


              <div class="list-group">
                <a href="" class="list-group-item-dark  list-group-item-action active" aria-current="False">
                  Diversos
                </a>
                <a class="dropdown-item" href="/Categorias/Categorias">Lançar Categorias</a>

                <a class="dropdown-item" href="/Categorias/Todos">Listar Categorias</a>
              </div>
              <div class="list-group">
                <a href="" class="list-group-item-dark  list-group-item-action active" aria-current="False">
                  Contas Bancárias
                </a>
                <a class="dropdown-item" href="/ContasBancarias/Novo">Lançar Conta Bancárias</a>
                <a class="dropdown-item" href="/ContasBancarias/Todos">Listar Conta Bancárias</a>
              </div>
            </div>
          <?php } ?>
          </li>
          <?php

          if ($Usuarios->Financeiro <> Null) { ?>
            <li class="nav-item dropdown">
              <a style='color:white;' class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Financeiro</a>
              <div class="dropdown-menu">
                <div class="list-group">
                  <a href="" class="list-group-item-dark  list-group-item-action active" aria-current="False">
                    Despesas
                  </a>
                  <a class="dropdown-item" href="/Despesas/Novo">Lançar de Despesas </a>
                  <a class="dropdown-item" href="/Despesas/Todos">Listar Despesas </a>
                  <a class="dropdown-item" href="/Despesas/DespesaPorCategoria">Listar Despesas Por Categoria</a>
                </div>

                <div class="list-group">
                  <a href="" class="list-group-item-dark  list-group-item-action active" aria-current="False">
                    Receitas
                  </a>
                  <a class="dropdown-item" href="/Receitas/Novo">Lançar Receitas</a>
                  <a class="dropdown-item" href="/Receitas/Todos">Listar Receitas</a>
                </div>

                <div class="list-group">
                  <a href="" class="list-group-item-dark  list-group-item-action active" aria-current="False">
                    Outros Lançamentos
                  </a>
                  <a class="dropdown-item" href="/Outros/Novo">Lançar Outros</a>
                </div>


                <div class="list-group">
                  <a href="" class="list-group-item-dark  list-group-item-action active" aria-current="False">
                    Arrecadação
                  </a>
                  <a class="dropdown-item" href="/Arrecadacao/Novo">Lançar Arrecadação</a>
                  <a class="dropdown-item" href="/Arrecadacao/Todos">Listar Arrecadação</a>
                </div>
                <div class="list-group">
                  <a href="" class="list-group-item-dark  list-group-item-action active" aria-current="False">
                    Contas a Pagar
                  </a>
                  <a class="dropdown-item" href="/ContasaPagar/Novo/conta">Lançar Contas a Pagar</a>
                  <a class="dropdown-item" href="/ContasaPagar/Todos">Listar Contas a Pagar </a>
                </div>
                <div class="list-group">
                  <a href="" class="list-group-item-dark  list-group-item-action active" aria-current="False">
                    Contas a Receber
                  </a>
                  <a class="dropdown-item" href="/ContasaReceber/Novo">Lançar Contas a Receber </a>
                  <a class="dropdown-item" href="/ContasaReceber/Todos">Listar Contas a Receber </a>
                </div>



              </div>
            <?php } ?>
            </li>
            <?php
            if ($Usuarios->Notas <> Null) { ?>
              <li class="nav-item dropdown">
                <a style='color:white;' class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Notas</a>
                <div class="dropdown-menu">
                  <?php

                  if ($Usuarios->Compras = '1') { ?>
                    <div class="list-group">
                      <a href="" class="list-group-item-dark  list-group-item-action active" aria-current="False">
                        Notas de Compra
                      </a>
                      <a class="dropdown-item" href="/Compras/Carrinho">Lançar Notas de Compra </a>
                      <a class="dropdown-item" href="/ContasaPagar/Novo/vista">Lançar Compra a Vista </a>
                      <a class="dropdown-item" href="/ContasaPagar/Novo/prazo">Lançar Compra a Prazo </a>
                      <a class="dropdown-item" href="/ContasaPagar/Novo/transferencia">Lançar Transferência </a>
                      <a class="dropdown-item" href="/Compras/Todos">Listar lançamentos de Compra </a>
                    </div>
                  <?php } ?>
                  <?php

                  if ($Usuarios->Vendas <> Null) { ?>
                    <div class="list-group">
                      <a href="" class="list-group-item-dark  list-group-item-action active" aria-current="False">
                        Notas de Venda
                      </a>
                      <a class="dropdown-item" href="/Pedidos/Carrinho">Emitir Nota de Venda </a>
                      <a class="dropdown-item" href="/Pedidos/Todos/">Listar Nota de Venda </a>
                    </div>
                  <?php } ?>

                </div>
              <?php }

            if ($Usuarios->Fluxo <> Null) { ?>
              <li class="nav-item dropdown">
                <a style='color:white;' class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Fluxo</a>
                <div class="dropdown-menu">

                  <div class="list-group">
                    <a href="" class="list-group-item-dark  list-group-item-action active" aria-current="False">
                      Movimento
                    </a>
                    <a class="dropdown-item" href="/MovimentoFinanceiro">Movimento diário</a>
                    <a class="dropdown-item" href="/Extrato/View">Extrato</a>
                    <a class="dropdown-item" h href="/ContasBancarias/Saldo">Saldo Do Caixa</a>
                    <a class="dropdown-item" href="/FechamentoGeral">Fechamento Geral</a>

                    <div class="list-group">

                      <a href="" class="list-group-item-dark  list-group-item-action active" aria-current="False">
                        Balanço
                      </a>
                      <a class="dropdown-item" href="/Balanco/Show">Lançar Balanço </a>
                      <a class="dropdown-item" href="/Balanco/Listar">Listar Balanço </a>
                    </div>
                  </div>



                  <div class="list-group">
                    <a href="" class="list-group-item-dark  list-group-item-action active" aria-current="False">
                      Abate
                    </a>

                    <a class="dropdown-item" href="/Tabela">Lançar Abate</a>
                  </div>

                </div>
              <?php } ?>
              </li>

              <?php if ($Usuarios->Relatorio <> Null) { ?>
                <li class="nav-item dropdown">
                  <a style='color:white;' class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Relatório</a>
                  <div class="dropdown-menu">

                    <div class="list-group">

                      <a class="dropdown-item" href="/Despesas/DespesaPorCategoria">Relatório de Despesas Por Categoria</a>
                      <a class="dropdown-item" href="/ContasBancarias/Todos">Relatório Conta Bancárias</a>
                      <a class="dropdown-item" href="/Receitas/Todos">Relatório Receitas</a>
                      <a class="dropdown-item" href="/Arrecadacao/Todos">Relatório Arrecadação</a>
                      <a class="dropdown-item" href="/Receitas/Todos">Relatório Receitas</a>
                      <a class="dropdown-item" href="/Despesas/Todos">Relatório Despesas </a>
                      <a class="dropdown-item" href="/ContasaReceber/Todos">Relatório Contas a Receber </a>
                      <a class="dropdown-item" href="/ContasaPagar/Todos">Relatório Contas a Pagar </a>


                      <a class="dropdown-item" href="/Categorias/Todos">Relatório Categorias</a>
                      <a class="dropdown-item" href="/Empresa/Todos">Relatório Empresas</a>
                      <a class="dropdown-item" href="/Fornecedor/Todos">Relatório Fornecedores</a>
                      <a class="dropdown-item" href="/Clientes/Todos">Relatório Clientes</a>
                      <a class="dropdown-item" href="/Produtos/Todos">Relatório Produtos</a>

                    </div>


                  </div>
                </li>
              <?php } ?>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="/LogOff">Sair <span class="sr-only">(current)</span></a>
              </li>

      </ul>

    </div>
  </nav>
</head>


<br>

</html>