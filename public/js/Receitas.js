function Totalizar() {

    let Total = document.getElementById('Total').value == '' ? 0 : parseFloat(document.getElementById('Total').value);
    let Desconto = document.getElementById('Desconto').value == '' ? 0 : parseFloat(document.getElementById('Desconto').value);
    let Acrescimo = document.getElementById('Acrescimo').value != '' ? parseFloat(document.getElementById('Acrescimo').value) : 0;
    let Totalizado = (Total + Acrescimo) - Desconto;

    document.getElementById('Totalizado').value = Totalizado;

}

function Verifica() {
    var cliente = document.getElementById("Cliente");
    var empresa = document.getElementById("Empresa");
    var opcaoTexto = cliente.options[cliente.selectedIndex].text;
    var opcaoTextoe = empresa.options[empresa.selectedIndex].text;
    let Total = document.getElementById('Total').value == '' ? 0 : parseFloat(document.getElementById('Total').value);
    let Desconto = document.getElementById('Desconto').value == '' ? 0 : parseFloat(document.getElementById('Desconto').value);
    let Acrescimo = document.getElementById('Acrescimo').value != '' ? parseFloat(document.getElementById('Acrescimo').value) : 0;
    let Totalizado = (Total + Acrescimo) - Desconto;

    if (document.getElementById('Desconto').value == '') {
        document.getElementById('Desconto').value = 0;
    }
    if (document.getElementById('Acrescimo').value == '') {
        document.getElementById('Acrescimo').value = 0;
    }
    if (document.getElementById('Totalizado').value == '') {
        document.getElementById('Totalizado').value = Totalizado;
    }

    if (document.getElementById('Total').value == '') {
        alert('Prencha o Total');
    } else if (opcaoTexto == 'Selecione...') {
        alert('Selecione o Cliente  ');
    } else if (opcaoTextoe == 'Selecione...') {
        alert('Selecione a Empresa');
    } else {
        if (document.getElementById('Descricao').value == '') {
            document.getElementById('Descricao').value = opcaoTexto.substring(2, 100);
        }
        document.getElementById("Form").submit();
    }
}
