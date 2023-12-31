var Totalizado;

function Pesquisa() {

    let DataIni = document.getElementById('DataIni').value;
    let DataFim = document.getElementById('DataFim').value;
    let Empresa = document.getElementById('Empresa').value;


    $.ajax({
        method: 'get',
        url: '/Despesas/Fechamento',
        data: { 'DataIni': DataIni, 'DataFim': DataFim, 'Empresa': Empresa },
        success: function(retorno) {
            $('#Despesas').html('');
            $('#Soma').html('');

            let Soma = 0;

            for (let i = 0; retorno.length > i; i++) {

                const Valor = parseFloat(retorno[i].Total).toLocaleString('pt-BR', {
                    style: 'currency',
                    currency: 'BRL'
                });
                Soma += parseFloat(retorno[i].Total);

                $('#Despesas').append('<tr> <td>' + retorno[i].id + ' </td> <td>' + retorno[i].Descricao + '</td> <td>' + Valor + '</td>' + '</td> <td>' + retorno[i].Datarecebimento + '</td>' + '<td id="cat' + i + '"> </td> <td> <form action="/Despesas/Delete/' + retorno[i].id + '" method="get"><input class="btn btn-danger" name="" type="submit" Value="Excluir"></td>');

                SelecionaNomeCategoria(retorno[i].CodGrupo, i);
            }
            const Total = parseFloat(Soma).toLocaleString('pt-BR', {
                style: 'currency',
                currency: 'BRL'
            });
            $('#Soma').append('<div class="form-group"> <label for="">Total</label><input Style="font-size:20px;" type="text"class="form-control" value="' + Total + '" name="" id="" aria-describedby="helpId" placeholder=""></div>');


        }


    });

}

function SelecionaNomeCategoria(Id, Posicao) {
    let Cat;
    $.ajax({
        method: 'get',
        url: '/Categorias/ListarPorId',
        data: { 'id': Id },
        success: function(dados) {


            Cat = (dados[0].descricao);
            $('#cat' + Posicao).append(Cat);


        }


    });
}

function RelatorioCategoria() {
    Totalizado = 0;
    $('#Cat').html('');
    $.ajax({
        method: 'get',
        url: '/Categorias/Lista',
        data: {},
        success: function(retorno) {

            for (let i = 0; retorno.length > i; i++) {
                $('#Despesa' + i).html('');
                $('#Soma' + i).html('');

                $('#Cat').append('<tr>  <td style="font-size: 20px; width:80%;">' + retorno[i].descricao + '<td> <tr><td id="Despesa' + i + '"></td>' + '<td> <tr><td id="Soma' + i + '"></td>');

                DespesasPorCategoria(i, retorno[i].id);
                const Totalizador = parseFloat(Totalizado).toLocaleString('pt-BR', {
                    style: 'currency',
                    currency: 'BRL'
                });

                // $('#Totalizado').append('<div class="form-group"> <label for="">Total</label><input Style="font-size:20px;" type="text"class="form-control" value="' + Totalizador + '" name="" id="" aria-describedby="helpId" placeholder=""></div>');
            }

        }


    });

}

function DespesasPorCategoria(Posicao, Tipo) {

    let DataIni = document.getElementById('DataIni').value;
    let DataFim = document.getElementById('DataFim').value;
    let Empresa = document.getElementById('Empresa').value;


    $.ajax({
        method: 'get',
        url: '/Despesas/FechamentoCat',
        data: { 'DataIni': DataIni, 'DataFim': DataFim, 'Empresa': Empresa, 'CodGrupo': Tipo },
        success: function(retorno) {


            let Soma = 0;
            for (let i = 0; retorno.length > i; i++) {
                const Valor = parseFloat(retorno[i].Total).toLocaleString('pt-BR', {
                    style: 'currency',
                    currency: 'BRL'
                });
                Soma += parseFloat(retorno[i].Total);
                Totalizado += Soma;

                $('#Despesa' + Posicao).append('<tr> <td>' + retorno[i].Nome + '</td>' + '<td style="font-size: 15px; width:80%;">' + retorno[i].Descricao + '</td> <td>' + Valor + '</td>' +
                    '</td> <td>' + retorno[i].Datarecebimento + '</td>');
            }
            const Total = parseFloat(Soma).toLocaleString('pt-BR', {
                style: 'currency',
                currency: 'BRL'
            });

            $('#Soma' + Posicao).append('<div class="form-group"> <label for="">Total</label><input Style="font-size:20px;" type="text"class="form-control" value="' + Total + '" name="" id="" aria-describedby="helpId" placeholder=""></div>');


        }



    });

}






function Categoria() {


    $.ajax({


        method: 'get',
        url: '/Categorias/Categorias',
        datatype: 'json',
        success: function(retorno) {
            a = [1, 2, 3];
            return a;
        }

    });


}

function Imprimir() {
    $('#BtnPesquisa').hide();
    $('#BtnImprimir').hide();
    $("#Titulo").html('Impressão Relatório de Despesas');
    window.print();
    $('#BtnPesquisa').show();
    $('#BtnImprimir').show();
    $("#Titulo").html('Relatório de Despesas');

}

function DespesaCategoria() {

    let DataIni = document.getElementById('DataIni').value;
    let DataFim = document.getElementById('DataFim').value;

    Dados = Categoria();

    $.each(Dados, function(Id, val) {
        console.log(val);
    });


}

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
        alert('Selecione o Fornecedor');
    } else if (opcaoTextoe == 'Selecione...') {
        alert('Selecione a Empresa');
    } else {
        if (document.getElementById('Descricao').value == '') {
            document.getElementById('Descricao').value = opcaoTexto.substring(2, 100);
        }
        document.getElementById("Form").submit();
    }
}