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
    let Apuracao = 0;
    let ApuracaoL = 0;
    let ApuraRL = 0;

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
            if (TotalFaturamento > 0) {
                $('#TotalFaturamento').append('<div class="form-group"> <label for="">Total Faturamento</label><input readonly style="font-weight: bold;font-size:20px;"  type="text"class="form-control" value="' + TotalFaturamento.toLocaleString('pt-BR', {
                    style: 'currency',
                    currency: 'BRL'
                }) + '" name="" id="" aria-describedby="helpId" placeholder=""></div>');
            }


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
            if (TotalDespesa > 0) {
                $('#TotalDespesa').append('<div class="form-group"> <label for="">Total Despesa</label><input readonly style="font-weight: bold;font-size:20px;"  type="text"class="form-control" value="' + TotalDespesa.toLocaleString('pt-BR', {
                    style: 'currency',
                    currency: 'BRL'
                }) + '" name="" id="" aria-describedby="helpId" placeholder=""></div>');
            }

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
            $('#LucroBruto').html('');
            $('#LucroLiquido').html('');

            $.each(Contas[0], function(Id, val) {
                EstoqueA = val.EstoqueAtual;
                const Total = parseFloat(val.EstoqueAtual).toLocaleString('pt-BR', {
                    style: 'currency',
                    currency: 'BRL'
                });

                $('#EstoqueAtual').append('<div  class="form-group"> <label for="">Estoque Atual</label><input readonly style="font-weight: bold;font-size:20px;" type="text"class="form-control" value="' + Total + '" name="" id="" aria-describedby="helpId" placeholder=""></div>');


            });

            $.each(Contas[1], function(Id, val) {
                EstoqueAn = val.EstoqueAnterior;
                const Totala = parseFloat(val.EstoqueAnterior).toLocaleString('pt-BR', {
                    style: 'currency',
                    currency: 'BRL'
                });

                $('#EstoqueAnterior').append('<div readonly class="form-group"> <label for="">Estoque Anterior</label><input readonly style="font-weight: bold;font-size:20px;"  type="text"class="form-control" value="' + Totala + '" name="" id="" aria-describedby="helpId" placeholder=""></div>');

            });

            TotalC = (parseFloat(EstoqueAn) + parseFloat(TotalCompra)) - parseFloat(EstoqueA);
            if (TotalCompra > 0) {
                $('#TotalCompra').append('<div readonly class="form-group"> <label for="">Total Comras</label><input readonly style="font-weight: bold;font-size:20px;" type="text"class="form-control" value="' + TotalC.toLocaleString('pt-BR', {
                    style: 'currency',
                    currency: 'BRL'
                }) + '" name="" id="" aria-describedby="helpId" placeholder=""></div>');
            }

            LucroBruto = parseFloat(TotalFaturamento) - parseFloat(TotalC);
            Apuracao = (parseFloat(LucroBruto) / parseFloat(TotalFaturamento)) * 100;
            ApuraR = Apuracao.toFixed(2);
            if (LucroBruto > 0) {
                $('#LucroBruto').append('<div readonly class="form-group"> <label for="">Lucro Bruto</label><input readonly style="font-weight: bold;font-size:20px;"  type="text"class="form-control" value="' + LucroBruto.toLocaleString('pt-BR', {
                    style: 'currency',
                    currency: 'BRL'
                }) + '   Apuração: ' + ApuraR + '%" name="" id="" aria-describedby="helpId" placeholder=""></div>');
            }
            LucroLiquido = parseFloat(LucroBruto) - parseFloat(TotalDespesa);
            ApuracaoL = (parseFloat(LucroLiquido) / parseFloat(TotalFaturamento)) * 100;
            ApuraRL = ApuracaoL.toFixed(2);
            if (LucroLiquido > 0) {
                $('#LucroLiquido').append('<div readonly class="form-group"> <label for="">Lucro Líquido</label><input readonly style="font-weight: bold;font-size:20px;"  type="text"class="form-control" value="' + LucroLiquido.toLocaleString('pt-BR', {
                    style: 'currency',
                    currency: 'BRL'
                }) + '  Apuração: ' + ApuraRL + '%" name="" id="" aria-describedby="helpId" placeholder=""></div>');
            }
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
    let Rota = '';

    Rota = (Empresa == '0-TODOS') ? '/Arrecadacao/FechamentoTodos' : '/Arrecadacao/Fechamento';

    $.ajax({
        method: 'get',

        url: Rota,
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
                    }) + ' </td>');

            }



        }
    });
    Rota = (Empresa == '0-TODOS') ? '/Compras/FechamentoTodos' : '/Compras/Fechamento';
    $.ajax({
        method: 'get',
        url: Rota,
        data: { 'DataIni': DataIni, 'DataFim': DataFim, 'Empresa': Empresa },

        success: function(Arrecadacao) {

            $('#Arrecadacao').html('');



            for (let i = 0; Arrecadacao.length > i; i++) {

                ValorArrecadado += parseFloat(Arrecadacao[i].Total);
                $('#Arrecadacao').append('<tr> <td>' + Arrecadacao[i].id + ' </td> <td>' + Arrecadacao[i].Razaof + '</td><td>' + Arrecadacao[i].Natureza + '</td> <td>' + Arrecadacao[i].DtPedido +
                    ' </td> <td>' + Arrecadacao[i].Razaoe + ' </td> <td>' + parseFloat(Arrecadacao[i].Total).toLocaleString('pt-BR', {
                        style: 'currency',
                        currency: 'BRL'
                    }) + ' </td>  ');
            }


        }

    });
    Rota = (Empresa == '0-TODOS') ? '/Despesas/FechamentoTodos' : '/Despesas/Fechamento';
    $.ajax({
        method: 'get',
        url: Rota,
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
                $('#Despesas').append('<tr> <td>' + retorno[i].id + ' </td> <td>' + retorno[i].Razaof + '</td> ' +
                    '<td>' + retorno[i].Descricao + '</td> <td>' + retorno[i].Datarecebimento + '</td>' + '<td>' + retorno[i].Razaoe + '</td>' +
                    '</td> <td>' + Valor + '</td>');
            }
            const Total = parseFloat(Soma).toLocaleString('pt-BR', {
                style: 'currency',
                currency: 'BRL'
            });
            $('#Soma').append('<div class="form-group"> <label for="">Total Despesa</label><input Style="font-weight: bold;font-size:25px;" type="text"class="form-control" value="' + Total + '" name="" id="" aria-describedby="helpId" placeholder=""></div>');
            $('#Somac').append('<div class="form-group"> <label for="">Total De Compras a Vista</label><input Style="font-weight: bold;font-size:25px;" type="text"class="form-control" value="' + ValorArrecadado.toLocaleString('pt-BR', {
                style: 'currency',
                currency: 'BRL'
            }) + '" name="" id="" aria-describedby="helpId" placeholder=""></div>');
            $('#Somaa').append('<div class="form-group"> <label for="">Total Arrecadado</label><input Style="font-weight: bold;font-size:25px;" type="text"class="form-control" value="' + ValorPAgo.toLocaleString('pt-BR', {
                style: 'currency',
                currency: 'BRL'
            }) + '" name="" id="" aria-describedby="helpId" placeholder=""></div>');
            Saldo = ValorPAgo - (ValorArrecadado + Soma);
            $('#Saldo').append('<div class="form-group"> <label Style="font-weight: bold;font-size:28px;"for="">Saldo</label><input Style="font-weight: bold;font-size:28px;" type="text"class="form-control" value="' + Saldo.toLocaleString('pt-BR', {
                style: 'currency',
                currency: 'BRL'
            }) + '" name="" id="" aria-describedby="helpId" placeholder=""></div>');

        }


    });

}

function Imprimir() {
    let hoje = new Date();
    $('#dia').html('Emitido dia: ' + hoje);
    $('#BtnPesquisa').hide();
    $('#BtnImprimir').hide();
    $("#Titulo").html('Impressão Movimento Financeiro');
    window.print();
    $('#BtnPesquisa').show();
    $('#BtnImprimir').show();
    $("#Titulo").html('Movimento Financeiro');



}