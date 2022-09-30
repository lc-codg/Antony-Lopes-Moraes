function SelecionaContaBancaria() {

    var select = document.getElementById("ContaBancaria");
    var Valor = select.options[select.selectedIndex].text;

    document.getElementById("conta").value = Valor;

}

function ValidarForm() {
    var select = document.getElementById("ContaBancaria");
    var Valor = select.options[select.selectedIndex].text;
    if (Valor == 'Selecione') {
        alert('Atenção! É necessário Selecionar uma conta para pagamento.');
    } else {
        JurosEMulta();
        document.getElementById("FrmQuitar").submit();
    }

}

function JurosEMulta() {

    var Juros = document.getElementById("Juros").value;
    var Multa = document.getElementById("Multa").value;
    var Cheque = document.getElementById("Cheque").value;

    document.getElementById("Juros2").value = Juros;
    document.getElementById("Multa2").value = Multa;
    document.getElementById("Cheque2").value = Cheque;

}

$(function() {


    var totals = $('.price');
    var totals2 = $('.price2');

    var sum = 0;
    var sum2 = 0;

    for (var i = 0; i < totals.length; i++) {
        //strip out Real signs and commas
        var v = $(totals[i]).text().replace(/[^\d.]/g, '');

        //convert string to integer
        var ct = parseFloat(v);
        sum += ct;


    }

    for (var i2 = 0; i2 < totals2.length; i2++) {
        //strip out Real signs and commas
        var v2 = $(totals2[i2]).text().replace(/[^\d.]/g, '');

        //convert string to integer
        var ct2 = parseFloat(v2);
        sum2 += ct2;


    }

    console.log(sum);
    console.log(sum2);



    const formatado = sum.toLocaleString('pt-BR', {
        style: 'currency',
        currency: 'BRL'
    });
    const formatado2 = sum2.toLocaleString('pt-BR', {
        style: 'currency',
        currency: 'BRL'
    });
    var qtd = $('#tabelaPedidos tbody tr').length;


    var myHeading = document.querySelector('#h5');
    myHeading.textContent = "Total Quitado: " + formatado;

    var myHeading = document.querySelector('#h6');
    myHeading.textContent = "Total Em Aberto: " + formatado2;

    var myHeading = document.querySelector('#h7');
    myHeading.textContent = "N° de Contas: " + qtd;



    //Filtragem por botôes

    var tds = document.querySelectorAll('table td[data-estado]');
    document.querySelector('.btn-group').addEventListener('click', function(e) {
        var estado = e.target.id;
        for (var i = 0; i < tds.length; i++) {
            var tr = tds[i].closest('tr');
            tr.style.display = estado == tds[i].dataset.estado || !estado ? '' : 'none';
        }
    });

});