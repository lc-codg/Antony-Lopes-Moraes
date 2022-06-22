

$(function () {

    $('#buscar').keydown(function (e) {

        var buscatexto = $(this).val();

        if (e.keyCode === 13) {

            $('#resultado_busca').html("");
            if (buscatexto.length > 0)
                $.ajax({
                    type: 'get',
                    url: "/Produtos/LocDesc/",
                    data: { 'Descricao': buscatexto },
                    datetype: 'json',

                    success: function (retorno) {

                        if (retorno.Produtos.length > 0) {

                            $.each(retorno.Produtos, function (Id, val) {

                                $('#resultado_busca').append(' <a href="#"" id=' + val.Id + '>' + val.Descricao + ' | R$' + val.ValorUnitario + '</a><p></p>');
                            });

                        } else {
                            $('#resultado_busca').html("<p>Não há Dados para esta consulta.</p>");
                        }
                    }
                });
        }
    });

    $('body').on('click', '#resultado_busca a', function () {

        var dadosProduto = $(this).attr('id');
        var splitdados = dadosProduto.split(':');

        quantidade = prompt('Digite a quantidade: ');

        if ((!isNaN(quantidade)) && (quantidade > 0)){
            $.ajax({
                method: 'get',
                url: '/Produtos/Inserir',
                data: { id: splitdados[0],'Quantidade':quantidade },
                datetype: 'json',
                success: function (retorno) {
                    window.location.href = '/Pedidos/Carrinho'; 

                }
            });
        }else
          alert('Digite um número válido.');


    });
});