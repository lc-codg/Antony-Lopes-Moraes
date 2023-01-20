function Imprimnir() {
    window.print();
}

function Extrato() {

    let DataIni = document.getElementById('DataIni').value;
    let DataFim = document.getElementById('DataFim').value;
    let Conta = document.getElementById('Conta').value;
    let ValorArrecadado = 0;
    let ValorPAgo = 0;
    let Filtroconta = Conta.substr(0, 1);


    $.ajax({
        method: 'get',
        url: '/Extrato/Creditos',
        data: { 'DataIni': DataIni, 'DataFim': DataFim, 'Conta': Conta },

        success: function(Contas) {
            $('#Creditos').html('');
            $('#Debitos').html('');


            for (let i = 0; Contas.length > i; i++) {

                if (Contas[i].conta == Filtroconta) {
                    ValorPAgo = ValorPAgo + parseFloat(Contas[i].valor);
                    $('#Creditos').append('<tr> <td>' + Contas[i].id + ' </td> <td>' + Contas[i].descricao + '</td> <td>' + Contas[i].valor +
                        ' </td> <td>' + Contas[i].data + ' </td> <td>' + Contas[i].id_original + ' </td> <td>' + Contas[i].conta + ' </td> <td>' + Contas[i].pessoa + '</td>' +
                        ' </td> <td>' + Contas[i].usuario + '</td>' + ' </td> <td>' + Contas[i].CodEmpresa + '</td>');

                }
            }



        }
    });

    $.ajax({
        method: 'get',
        url: '/Extrato/Debitos',
        data: { 'DataIni': DataIni, 'DataFim': DataFim, 'Conta': Conta },

        success: function(Arrecadacao) {

            $('#Debitos').html('');



            for (let i = 0; Arrecadacao.length > i; i++) {

                if (Arrecadacao[i].conta == Filtroconta) {
                    ValorArrecadado = ValorArrecadado + parseFloat(Arrecadacao[i].valor);
                    $('#Debitos').append('<tr> <td>' + Arrecadacao[i].id + ' </td> <td>' + Arrecadacao[i].descricao + '</td> <td>' + Arrecadacao[i].valor +
                        ' </td> <td>' + Arrecadacao[i].data + ' </td> <td>' + Arrecadacao[i].id_original + ' </td> <td>' + Arrecadacao[i].conta + ' </td> <td>' + Arrecadacao[i].pessoa + '</td>' +
                        ' </td> <td>' + Arrecadacao[i].usuario + '</td>' + ' </td> <td>' + Arrecadacao[i].CodEmpresa + '</td>');
                }
            }

            let Saldo = ValorPAgo - ValorArrecadado;
            $('#Totais').html('');
            $('#Totais').append('<button type="button" class="btn btn-success btn-xs"> Crédito: ' + ValorPAgo.toLocaleString('pt-br', { style: 'currency', currency: 'BRL' }) + '</button>' +
                '<button type="button" class="btn btn-danger btn-xs"> Débito: ' + ValorArrecadado.toLocaleString('pt-br', { style: 'currency', currency: 'BRL' }) + '</button>' +
                '<button type="button" class="btn btn-primary btn-xs"> Saldo: ' + Saldo.toLocaleString('pt-br', { style: 'currency', currency: 'BRL' }) + '</button>' +
                '<button type="button"  onclick ="Imprimnir();" class="btn btn-dark"> Imprimir </button>');


        }

    });

}
