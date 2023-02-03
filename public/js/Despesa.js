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


            for (let i = 0; retorno.length > i; i++) {
                $('#Despesas').append('<tr> <td>' + retorno[i].id + ' </td> <td>' + retorno[i].Descricao + '</td> <td>' + retorno[i].Datarecebimento + '</td>');
            }

        }


    });

}

function Categoria() {


    $.ajax({


        method: 'get',
        url: '/Categorias/Categorias',
        datatype: 'json',
        success: function (retorno) {
           a = [1,2,3];
            return a;
        }

    });
  

}

function DespesaCategoria() {

    let DataIni = document.getElementById('DataIni').value;
    let DataFim = document.getElementById('DataFim').value;

    Dados = Categoria();
  
    $.each(Dados, function(Id, val) {
        console.log(val);
    });


}