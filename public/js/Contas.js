function QuitarContasAReceber(id, idclass, total) {

    if (ValidarFormReceber() == true) {

        var Parcial = document.getElementById("ValorParcial" + idclass).value;
        var Conta = document.getElementById(idclass).value;

        $.ajax({

            method: 'get',
            url: '/ContasaReceber/Validar/',
            data: { 'id': id, 'tipo': 'Receber', 'ValorParcial': Parcial, 'Valor': total, 'conta': Conta },
            success: function(retorno) {

                alert(retorno);
                document.getElementById("btn" + idclass).style.visibility = 'hidden';
            }
        });
    }

}


function SelecionaContaBancaria(TotalDados) {

    var select = document.getElementById("ContaBancaria");
    var Valor = select.options[select.selectedIndex].text;

    for (let i = 1; i <= TotalDados; i++) {
        document.getElementById(i).value = Valor;
    }
}

function ValidarForm() {
    var select = document.getElementById("ContaBancaria");
    var Valor = select.options[select.selectedIndex].text;
    if (Valor == 'Selecione') {
        alert('Atenção! É necessário Selecionar uma conta para pagamento.');
    } else {

        return true;
    }

}

function Parcial(id) {

    var Valor = document.getElementById("Parcial" + id).value;

    document.getElementById("ValorParcial" + id).value = Valor;
}

function ValidarFormReceber() {
    var select = document.getElementById("ContaBancaria");
    var Valor = select.options[select.selectedIndex].text;
    if (Valor == 'Selecione') {
        alert('Atenção! É necessário Selecionar uma conta para pagamento.');
    } else {

        return true;
    }

}

function Juros(id) {

    var Juros = document.getElementById("Juros" + id).value;
    document.getElementById("Juros2" + id).value = Juros;

}

function Multa(id) {

    var Multa = document.getElementById("Multa" + id).value;
    document.getElementById("Multa2" + id).value = Multa;

}

function Cheque(id) {

    var Cheque = document.getElementById("Cheque" + id).value;
    document.getElementById("Cheque2" + id).value = Cheque;

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