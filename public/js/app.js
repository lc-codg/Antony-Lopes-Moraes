$(function() {


    $('#Empresa').change(function(event) {
        var empresa = event.currentTarget.value;
        Codempresa = empresa.substr(0, 1);

        $.ajax({
            typ: 'get',
            url: '/Empresa/Seleciona/',
            data: { Codempresa: Codempresa },
            datatype: 'json',
            success: function(retorno) {

                $.each(retorno, function(Id, val) {
                    console.log(val);
                });

            }
        });
    });

    $('#PesquisaNome').keydown(function(e) {

        var buscacliente = $(this).val();

        switch (e.keyCode) {

            case 113:
                $('#Limpar').focus();
            case 120:
                $('#Finalizar').focus();
            case 13:
                {
                    $('#resultado_cliente').html("");
                    if (buscacliente.length > 0)
                        $.ajax({
                            type: 'get',
                            url: "/Clientes/PesquisaNome/",
                            data: { 'Nome': buscacliente },
                            datetype: 'json',

                            success: function(retorno) {

                                if (retorno.Clientes.length > 0) {

                                    $.each(retorno.Clientes, function(Id, val) {
                                        if (val.Nome === '') {
                                            Nome = val.Razao;
                                        } else {
                                            Nome = val.Nome;
                                        }
                                        if (val.Cpf === '') {
                                            Cpf = val.Cnpj;
                                        } else {
                                            Cpf = val.Cnpj;
                                        }
                                        $('#resultado_cliente').append(' <a style ="color:red;" href="#"" id=' + val.Id + '>' + Nome + ' | CNPJ: ' + Cpf + '</a><p></p>');

                                    });

                                } else {
                                    $('#resultado_cliente').html("<p>Não há Dados para esta consulta.</p>");
                                }
                            }
                        });
                }
        }
    });



    $('#buscar').keydown(function(e) {

        var buscatexto = $(this).val();

        switch (e.keyCode) {

            case 113:
                $('#Limpar').focus();
            case 120:
                $('#Finalizar').focus();
            case 13:
                {
                    $('#resultado_busca').html("");
                    if (buscatexto.length > 0)
                        $.ajax({
                            type: 'get',
                            url: "/Produtos/LocDesc/",
                            data: { 'Descricao': buscatexto },
                            datetype: 'json',

                            success: function(retorno) {

                                if (retorno.Produtos.length > 0) {

                                    $.each(retorno.Produtos, function(Id, val) {

                                        $('#resultado_busca').append(' <a href="#"" id=' + val.Id + '>' + val.Descricao + ' | R$' + val.ValorUnitario + '</a><p></p>');

                                    });

                                } else {
                                    $('#resultado_busca').html("<p>Não há Dados para esta consulta.</p>");
                                }
                            }
                        });
                }
        }
    });


    $('body').on('click', '#resultado_busca a', function() {

        var dadosProduto = $(this).attr('id');
        var splitdados = dadosProduto.split(':');

        let quantidadeO = prompt('Digite a quantidade: ');
        let PesoO = prompt('Digite o Peso: ');
        let PrecoO = prompt('Digite o Preço: ');
        let quantidade = parseFloat(quantidadeO.replace(',', '.'));
        let Peso = parseFloat(PesoO.replace(',', '.'));
        let Preco = parseFloat(PrecoO.replace(',', '.'));


        if ((!isNaN(quantidade)) && (quantidade > 0)) {
            if ((!isNaN(Peso)) && (Peso > 0)) {
                if ((!isNaN(Preco)) && (Preco > 0)) {

                    $.ajax({
                        method: 'get',
                        url: '/Produtos/Inserir',
                        data: { id: splitdados[0], 'Quantidade': quantidade, 'Preco': Preco, 'Peso': Peso },
                        datetype: 'json',
                        success: function(retorno) {
                            window.location.href = '/Pedidos/Carrinho';

                        }
                    });
                }
            }
        } else
            alert('Digite um número válido.');


    });
});


$('body').on('click', '#resultado_cliente a', function() {

    var dadosCliente = $(this).attr('id');
    var splitdados = dadosCliente.split(':');

    $.ajax({
        method: 'get',
        url: '/Clientes/Inserir',
        data: { id: splitdados[0] },
        datetype: 'json',
        success: function(retorno) {
            window.location.href = '/Pedidos/Carrinho';
        }
    });



});

function ValidarContasAPagar() {

    let Empresa = document.getElementById("Empresa").value;
    let Fornecedor = document.getElementById("Fornecedor").value;
    let Grupo = document.getElementById("Grupo").value;
    let SubGrupo = document.getElementById("SubGrupo").value;
    let Descricao = document.getElementById("Descricao").value;
    let Desconto = document.getElementById("Desconto").value;
    let Acrescimo = document.getElementById("Acrescimo").value;
    let Total = document.getElementById("Total").value;

    if (Grupo == 'Selecione...') {
        alert("Selecione o Grupo");
        document.getElementById("Grupo").focus();
    } else if (Empresa == 'Selecione...') {
        alert("Selecione a Empresa");
        document.getElementById("Empresa").focus();
    } else if (SubGrupo == 'Selecione...') {
        alert("Selecione o SubGrupo");
        document.getElementById("SubGrupo").focus();
    } else if (Fornecedor == 'Selecione...') {
        alert("Selecione o Fornecedor");
        document.getElementById("Fornecedor").focus();
    } else if (Total == '') {
        alert("Digite o Total");
        document.getElementById("Total").focus();
    } else {
        if (Desconto == '') {
            document.getElementById("Desconto").value = 0;
        }
        if (Descricao == '') {
            document.getElementById("Descricao").value = 'Compra ' + Fornecedor.substring(3, 100)
        }
        if (Acrescimo == '') {
            document.getElementById("Acrescimo").value = 0;
        }
        document.getElementById("Form").submit();
    }

}


function ValidarContasAReceber() {

    let Empresa = document.getElementById("CodEmpresa").value;
    let Fornecedor = document.getElementById("Cliente").value;
    let Grupo = document.getElementById("Grupo").value;
    let SubGrupo = document.getElementById("SubGrupo").value;

    if (Grupo == 'Selecione...') {
        alert("Selecione o Grupo");
    } else if (Empresa == 'Selecione...') {
        alert("Selecione a Empresa");
    } else if (SubGrupo == 'Selecione...') {
        alert("Selecione o SubGrupo");
    } else if (Fornecedor == 'Selecione...') {
        alert("Selecione o Cliente");
    } else {
        document.getElementById("Form").submit();
    }
}

function Prazo() {

    if (document.getElementById('Tipo').checked == false) {
        document.getElementById('Parcela').readOnly = true;
        document.getElementById('Boleta').readOnly = true;
        document.getElementById('Parcela').value = '1';
        document.getElementById('Boleta').value = '1';
    } else {
        document.getElementById('Parcela').readOnly = false;
        document.getElementById('Boleta').readOnly = false;


    }
}

function Conta() {

    let Desconto = document.getElementById('Desconto').value == '' ? 0 : parseFloat(document.getElementById('Desconto').value);
    let Acrescimo = document.getElementById('Acrescimo').value == '' ? 0 : parseFloat(document.getElementById('Acrescimo').value);
    let Valor = document.getElementById('Total').value == '' ? 0 : parseFloat(document.getElementById('Total').value);
    let Final = Valor + Acrescimo - Desconto;
    document.getElementById('Final').value = Final;
}