function Fechamento() {
    let DataIni = document.getElementById('DataIni').value;
    let DataFim = document.getElementById('DataFim').value;
    let Empresa = document.getElementById('Empresa').value;

    $.ajax({
        method: 'get',
        url: '/Arrecadacao/Fechamento',
        data: { 'DataIni': DataIni, 'DataFim': DataFim, 'Empresa': Empresa },

        success: function (Contas) {

            $('#Contas').html('');


            for (let i = 0; Contas.length > i; i++) {
                $('#Contas').append('<tr> <td>' + Contas[i].id + ' </td> <td>' + Contas[i].Descricao + '</td> <td>' + Contas[i].DataRecebimento + 
                 ' </td> <td>' +  Contas[i].Razaoe + ' </td> <td>' +  Contas[i].Valor + ' </td> <td>' +  Contas[i].Numero+ ' </td> <td>' +  Contas[i].conta + '</td>');
            }

        }
    });

    $.ajax({
        method: 'get',
        url: '/ContasaPagar/Fechamento',
        data: { 'DataIni': DataIni, 'DataFim': DataFim, 'Empresa': Empresa },

        success: function (Arrecadacao) {

            $('#Arrecadacao').html('');


            for (let i = 0; Arrecadacao.length > i; i++) {
                $('#Arrecadacao').append('<tr> <td>' + Arrecadacao[i].id + ' </td> <td>' +Arrecadacao[i].Razaof + '</td> <td>' + Arrecadacao[i].Vencimento 
                + ' </td> <td>' +Arrecadacao[i].Total + ' </td> <td>' +Arrecadacao[i].Conta
                + ' </td> <td>' +Arrecadacao[i].Razaoe  + ' </td> <td>' +Arrecadacao[i].Descricao+'</td>');
            }

        }
    });

}


