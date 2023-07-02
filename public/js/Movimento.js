function FechamentoGeral() {

    let DataIni = document.getElementById('DataIni').value;
    let DataFim = document.getElementById('DataFim').value;
    let Empresa = document.getElementById('Empresa').value;

    let TotalCompra = 0;
    let TotalDespesa = 0;
    let TotalFaturamento = 0;
    let LucroBruto = 0;
    let LucroLiquido = 0;
    let EstoqueA = 0;
    let EstoqueAn = 0;

    $.ajax({
        method: 'get',

        url: '/ListarArrecadacoes',
        data: { 'DataIni': DataIni, 'DataFim': DataFim, 'Empresa': Empresa },

        success: function(Contas) {
            $('#Contas').html('');
            $('#TotalFaturamento').html('');


            for (let i = 0; Contas.length > i; i++) {
                TotalFaturamento += parseFloat(Contas[i].Total);
                $('#Contas').append('<tr> <td>' + Contas[i].Descricao + '</td> <td>' + parseFloat(Contas[i].Total).toLocaleString('pt-BR', {
                    style: 'currency',
                    currency: 'BRL'
                }));

            }
            $('#TotalFaturamento').append('<div class="form-group"> <label for="">Total Faturamento</label><input Style="font-size:20px;" type="text"class="form-control" value="' + TotalFaturamento.toLocaleString('pt-BR', {
                style: 'currency',
                currency: 'BRL'
            }) + '" name="" id="" aria-describedby="helpId" placeholder=""></div>');


        }
    });
    $.ajax({
        method: 'get',

        url: '/ListarDespesas',
        data: { 'DataIni': DataIni, 'DataFim': DataFim, 'Empresa': Empresa },

        success: function(Contas) {
            $('#Despesas').html('');
            $('#TotalDespesa').html('');


            for (let i = 0; Contas.length > i; i++) {
                TotalDespesa += parseFloat(Contas[i].Total);
                $('#Despesas').append('<tr> <td>' + Contas[i].descricao + '</td> <td>' + parseFloat(Contas[i].Total).toLocaleString('pt-BR', {
                    style: 'currency',
                    currency: 'BRL'
                }));

            }

            $('#TotalDespesa').append('<div class="form-group"> <label for="">Total Despesa</label><input Style="font-size:20px;" type="text"class="form-control" value="' + TotalDespesa.toLocaleString('pt-BR', {
                style: 'currency',
                currency: 'BRL'
            }) + '" name="" id="" aria-describedby="helpId" placeholder=""></div>');

        }
    });
    $.ajax({
        method: 'get',

        url: '/ListarCompras',
        data: { 'DataIni': DataIni, 'DataFim': DataFim, 'Empresa': Empresa },

        success: function(Compra) {
            $('#Compras').html('');



            for (let i = 0; Compra.length > i; i++) {
                TotalCompra += parseFloat(Compra[i].Total);
                $('#Compras').append('<tr> <td>' + Compra[i].Tipo + '</td> <td>' + parseFloat(Compra[i].Total).toLocaleString('pt-BR', {
                    style: 'currency',
                    currency: 'BRL'
                }));

            }



        }
    });

    $.ajax({
        method: 'get',

        url: '/ListarBalanco',
        data: { 'DataIni': DataIni, 'DataFim': DataFim, 'Empresa': Empresa },

        success: function(Contas) {
            $('#EstoqueAtual').html('');
            $('#EstoqueAnterior').html('');
            $('#TotalCompra').html('');

            $.each(Contas[0], function(Id, val) {
                EstoqueA = val.EstoqueAtual;
                const Total = parseFloat(val.EstoqueAtual).toLocaleString('pt-BR', {
                    style: 'currency',
                    currency: 'BRL'
                });

                $('#EstoqueAtual').append('<div class="form-group"> <label for="">Estoque Atual</label><input Style="font-size:20px;" type="text"class="form-control" value="' + Total + '" name="" id="" aria-describedby="helpId" placeholder=""></div>');

            });
            $.each(Contas[1], function(Id, val) {
                EstoqueAn = val.EstoqueAnterior;
                const Totala = parseFloat(val.EstoqueAnterior).toLocaleString('pt-BR', {
                    style: 'currency',
                    currency: 'BRL'
                });

                $('#EstoqueAnterior').append('<div class="form-group"> <label for="">Estoque Anterior</label><input Style="font-size:20px;" type="text"class="form-control" value="' + Totala + '" name="" id="" aria-describedby="helpId" placeholder=""></div>');
            });

            TotalC = (parseFloat(EstoqueAn) + parseFloat(TotalCompra)) - parseFloat(EstoqueA);
            $('#TotalCompra').append('<div class="form-group"> <label for="">Total Comras</label><input Style="font-size:20px;" type="text"class="form-control" value="' + TotalC.toLocaleString('pt-BR', {
                style: 'currency',
                currency: 'BRL'
            }) + '" name="" id="" aria-describedby="helpId" placeholder=""></div>');
            LucroBruto = parseFloat(TotalFaturamento) - parseFloat(TotalC);
            $('#LucroBruto').append('<div class="form-group"> <label for="">Lucro Bruto</label><input Style="font-size:20px;" type="text"class="form-control" value="' + LucroBruto.toLocaleString('pt-BR', {
                style: 'currency',
                currency: 'BRL'
            }) + '" name="" id="" aria-describedby="helpId" placeholder=""></div>');
            LucroLiquido = parseFloat(LucroBruto) - parseFloat(TotalDespesa);
            $('#LucroLiquido').append('<div class="form-group"> <label for="">Lucro Líquido</label><input Style="font-size:20px;" type="text"class="form-control" value="' + LucroLiquido.toLocaleString('pt-BR', {
                style: 'currency',
                currency: 'BRL'
            }) + '" name="" id="" aria-describedby="helpId" placeholder=""></div>');
        }



    });
}

function Fechamento() {

    let DataIni = document.getElementById('DataIni').value;
    let DataFim = document.getElementById('DataFim').value;
    let Empresa = document.getElementById('Empresa').value;

    let ValorArrecadado = 0;
    let ValorPAgo = 0;
    let Soma = 0;
    let Saldo = 0;

    $.ajax({
        method: 'get',

        url: '/Arrecadacao/Fechamento',
        data: { 'DataIni': DataIni, 'DataFim': DataFim, 'Empresa': Empresa },

        success: function(Contas) {
            $('#Arrecadado').html('');
            $('#Contas').html('');


            for (let i = 0; Contas.length > i; i++) {
                ValorPAgo += parseFloat(Contas[i].Valor);
                $('#Contas').append('<tr> <td>' + Contas[i].id + ' </td> <td>' + Contas[i].Descricao + '</td> <td>' + Contas[i].DataRecebimento +
                    ' </td> <td>' + Contas[i].Razaoe + ' </td> <td>' + parseFloat(Contas[i].Valor).toLocaleString('pt-BR', {
                        style: 'currency',
                        currency: 'BRL'
                    }) + ' </td> <td>' + Contas[i].Numero + ' </td> <td>' + Contas[i].conta + '</td>');

            }



        }
    });

    $.ajax({
        method: 'get',
        url: '/ContasaPagar/Fechamento',
        data: { 'DataIni': DataIni, 'DataFim': DataFim, 'Empresa': Empresa },

        success: function(Arrecadacao) {

            $('#Arrecadacao').html('');



            for (let i = 0; Arrecadacao.length > i; i++) {

                ValorArrecadado += parseFloat(Arrecadacao[i].Total);
                $('#Arrecadacao').append('<tr> <td>' + Arrecadacao[i].id + ' </td> <td>' + Arrecadacao[i].Razaof + '</td> <td>' + Arrecadacao[i].Vencimento +
                    ' </td> <td>' + parseFloat(Arrecadacao[i].Total).toLocaleString('pt-BR', {
                        style: 'currency',
                        currency: 'BRL'
                    }) + ' </td> <td>' + Arrecadacao[i].Conta +
                    ' </td> <td>' + Arrecadacao[i].Razaoe + ' </td> <td>' + Arrecadacao[i].Descricao + '</td>');
            }


        }

    });
    $.ajax({
        method: 'get',
        url: '/Despesas/Fechamento',
        data: { 'DataIni': DataIni, 'DataFim': DataFim, 'Empresa': Empresa },
        success: function(retorno) {
            $('#Despesas').html('');
            $('#Soma').html('');
            $('#Somac').html('');
            $('#Somaa').html('');
            $('#Saldo').html('');


            for (let i = 0; retorno.length > i; i++) {
                const Valor = parseFloat(retorno[i].Total).toLocaleString('pt-BR', {
                    style: 'currency',
                    currency: 'BRL'
                });
                Soma += parseFloat(retorno[i].Total);
                $('#Despesas').append('<tr> <td>' + retorno[i].id + ' </td> <td>' + retorno[i].Descricao + '</td> <td>' + Valor + '</td>' +
                    '</td> <td>' + retorno[i].Datarecebimento + '</td>');
            }
            const Total = parseFloat(Soma).toLocaleString('pt-BR', {
                style: 'currency',
                currency: 'BRL'
            });
            $('#Soma').append('<div class="form-group"> <label for="">Total Despesa</label><input Style="font-size:20px;" type="text"class="form-control" value="' + Total + '" name="" id="" aria-describedby="helpId" placeholder=""></div>');
            $('#Somac').append('<div class="form-group"> <label for="">Total De Contas Pagas</label><input Style="font-size:20px;" type="text"class="form-control" value="' + ValorArrecadado.toLocaleString('pt-BR', {
                style: 'currency',
                currency: 'BRL'
            }) + '" name="" id="" aria-describedby="helpId" placeholder=""></div>');
            $('#Somaa').append('<div class="form-group"> <label for="">Total Arrecadado</label><input Style="font-size:20px;" type="text"class="form-control" value="' + ValorPAgo.toLocaleString('pt-BR', {
                style: 'currency',
                currency: 'BRL'
            }) + '" name="" id="" aria-describedby="helpId" placeholder=""></div>');
            Saldo = ValorPAgo - (ValorArrecadado + Soma);
            $('#Saldo').append('<div class="form-group"> <label for="">Saldo</label><input Style="font-size:20px;" type="text"class="form-control" value="' + Saldo.toLocaleString('pt-BR', {
                style: 'currency',
                currency: 'BRL'
            }) + '" name="" id="" aria-describedby="helpId" placeholder=""></div>');

        }


    });

}

function Imprimir() {
    $('#BtnPesquisa').hide();
    $('#BtnImprimir').hide();
    $("#Titulo").html('Impressão Movimento Financeiro');
    window.print();
    $('#BtnPesquisa').show();
    $('#BtnImprimir').show();
    $("#Titulo").html('Movimento Financeiro');

}