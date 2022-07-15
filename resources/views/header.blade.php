<!DOCTYPE html>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.4.1/jspdf.debug.js" integrity="sha384-THVO/sM0mFD9h7dfSndI6TS0PgAGavwKvB5hAxRRvc0o9cPLohB0wb/PTA7LdUHs" crossorigin="anonymous"></script>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <title>Frigo Erp| Há mais de 10 anos no mercado | Emissor de Pedidos| Rio de Janeiro | Brasil</title>
  <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
    <a Style=" font-size: 30px;color:white;" class="navbar-brand" href="/">Frigo Erp</a>
    <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation"></button>

    <div class="collapse navbar-collapse" id="collapsibleNavId">
      <ul class="navbar-nav mr-auto mt-2 mt-lg-0">

        <li class="nav-item dropdown">
          <a style='color:white;' class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Cadastro</a>
          <div class="dropdown-menu">

            <div class="list-group">
              <a href="#" class="list-group-item-dark  list-group-item-action active" aria-current="true">
                Produtos
              </a>
              <a class="dropdown-item" href="/Produtos/Novo">Cadastrar Produtos</a>
              <a class="dropdown-item" href="/Produtos/Todos">Listar Produtos</a>
            </div>
            <div class="list-group">
              <a href="" class="list-group-item-dark  list-group-item-action active" aria-current="True">
                Clientes
              </a>
              <a class="dropdown-item" href="/Clientes/Novo">Cadastrar Clientes</a>
              <a class="dropdown-item" href="/Clientes/Todos">Listar Clientes</a>
            </div>

            <div class="list-group">
              <a href="" class="list-group-item-dark  list-group-item-action active" aria-current="False">
                Fornecedores
              </a>
              <a class="dropdown-item" href="/Fornecedor/Novo">Cadastrar Fornecedores</a>
              <a class="dropdown-item" href="/Fornecedor/Todos">Listar Fornecedores</a>
            </div>

            <div class="list-group">
              <a href="" class="list-group-item-dark  list-group-item-action active" aria-current="False">
                Empresas
              </a>
              <a class="dropdown-item" href="/Empresa/Novo">Cadastrar Empresas</a>
              <a class="dropdown-item" href="/Empresa/Todos">Listar Empresas</a>
            </div>

          </div>
        </li>

        <li class="nav-item dropdown">
          <a style='color:white;' class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Financeiro</a>
          <div class="dropdown-menu">

            <div class="list-group">
              <a href="" class="list-group-item-dark  list-group-item-action active" aria-current="False">
                Contas a Pagar
              </a>
              <a class="dropdown-item" href="/ContasaPagar/Novo">Cadastrar Contas a Pagar</a>
              <a class="dropdown-item" href="/ContasaPagar/Todos">Listar Contas a Pagar </a>
            </div>
            <div class="list-group">
              <a href="" class="list-group-item-dark  list-group-item-action active" aria-current="False">
                Contas a Receber
              </a>
              <a class="dropdown-item" href="/ContasaReceber/Novo">Cadastrar Contas a Receber </a>
              <a class="dropdown-item" href="/ContasaReceber/Todos">Listar Contas a Receber </a>
            </div>
            <div class="list-group">
              <a href="" class="list-group-item-dark  list-group-item-action active" aria-current="False">
                Contas Bancárias
              </a>
              <a class="dropdown-item" href="/ContasBancarias/Novo">Cadastrar Conta Bancárias</a>
              <a class="dropdown-item" href="/ContasBancarias/Todos">Listar Conta Bancárias</a>
            </div>
            <div class="list-group">
              <a href="" class="list-group-item-dark  list-group-item-action active" aria-current="False">
                Despesas
              </a>
              <a class="dropdown-item" href="/Despesas/Novo">Cadastrar de Despesas </a>
              <a class="dropdown-item" href="/Despesas/Todos">Listar Despesas </a>
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

          </div>
        </li>

        <li class="nav-item dropdown">
          <a style='color:white;' class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Notas</a>
          <div class="dropdown-menu">
            <div class="list-group">
              <a href="" class="list-group-item-dark  list-group-item-action active" aria-current="False">
                Notas de Compra
              </a>
              <a class="dropdown-item" href="/Compras/Carrinho">Cadastrar Notas de Compra </a>
              <a class="dropdown-item" href="/Compras/Todos">Listar Notas de Compra </a>
            </div>
            <div class="list-group">
              <a href="" class="list-group-item-dark  list-group-item-action active" aria-current="False">
                Notas de Venda
              </a>
              <a class="dropdown-item" href="/Pedidos/Carrinho">Emitir Nota de Venda </a>
              <a class="dropdown-item" href="/Pedidos/Todos/">Listar Nota de Venda </a>
            </div>


          </div>
        <li class="nav-item dropdown">
          <a style='color:white;' class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Fluxo</a>
          <div class="dropdown-menu">

            <div class="list-group">

              <a class="dropdown-item" href="/Produtos/Novo">Movimento diário</a>
              <a class="dropdown-item" href="/Produtos/Todos">Saldo Do Caixa</a>
            </div>


            <div class="list-group">

              <a class="dropdown-item" href="/Clientes/Novo">Fluxo de Fechamento</a>
            </div>

          </div>
        </li>
        <li class="nav-item dropdown">
          <a style='color:white;' class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Relatório</a>
          <div class="dropdown-menu">

            <div class="list-group">

              <a class="dropdown-item" href="/Produtos/Novo">Entradas</a>
              <a class="dropdown-item" href="/Produtos/Todos">Saídas</a>
              <a class="dropdown-item" href="/Produtos/Todos">Despesas</a>
              <a class="dropdown-item" href="/Produtos/Todos">Consolidado</a>
            </div>


          </div>
        </li>

        </li>
        <li class="nav-item active">
          <a class="nav-link" href="Front-end/Produto.html">Sair <span class="sr-only">(current)</span></a>
        </li>

      </ul>

    </div>
  </nav>
</head>

<br>

</html>