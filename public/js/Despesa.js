function Pesquisa() {

    let DataIni = document.getElementById('DataIni').value;
    let DataFim = document.getElementById('DataFim').value;
    let Empresa = document.getElementById('Empresa').value;


    $.ajax({
        method: 'get',
        url: '/Despesas/Fechamento',
        data: { 'DataIni': DataIni, 'DataFim': DataFim, 'Empresa': Empresa },
        success: function (retorno) {
            $('#Despesas').html('');
            $('#Soma').html('');

            let Soma = 0;
            for (let i = 0; retorno.length > i; i++) {
                const Valor = parseFloat(retorno[i].Total).toLocaleString('pt-BR', {
                    style: 'currency',
                    currency: 'BRL'
                });
                Soma += parseFloat(retorno[i].Total);
                let DescCat = SelecionaNomeCategoria(retorno[i].CodGrupo );
                $('#Despesas').append('<tr> <td>' + retorno[i].id + ' </td> <td>' + retorno[i].Descricao + '</td> <td>' + Valor + '</td>'
                    + '</td> <td>' + retorno[i].Datarecebimento + '</td>' + '<td>' + DescCat);
            }
            const Total = parseFloat(Soma).toLocaleString('pt-BR', {
                style: 'currency',
                currency: 'BRL'
            });
            $('#Soma').append('<div class="form-group"> <label for="">Total</label><input Style="font-size:20px;" type="text"class="form-control" value="' + Total + '" name="" id="" aria-describedby="helpId" placeholder=""></div>');

        }


    });

}

function SelecionaNomeCategoria($Id) {

    let Categoria ='' ;
    $.ajax({
        method: 'get',
        url: '/Categorias/ListarPorId',
        data: { 'id': $Id },
        success: function (retorno) {

            
            Categoria = (retorno[0].descricao);

              
            }


        });
        
    
    return 'teste';



}

function Categoria() {


    $.ajax({


        method: 'get',
        url: '/Categorias/Categorias',
        datatype: 'json',
        success: function (retorno) {
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

    $.each(Dados, function (Id, val) {
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