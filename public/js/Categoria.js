function Validar() {
    if (document.getElementById('Tipo').value == 'Selecione...') {
        alert('Selecione um Tipo de Categoria');
    } else if (document.getElementById('Descricao').value == '') {
        alert('Digite uma descrição.');
    }
    else {
        document.forms['Form'].submit();
    }
}
function Editar(id) {
    document.forms['Form' + id].submit();
}
function Excluir(id, codigo) {

    $.ajax({
        type: 'get',
        url: '/Categorias/Excluir',
        data: { 'id': codigo },
        datatype: 'json',
        success: function (data) {
            if (data == true) {
                $('#id' + id).remove();
                $('#desc' + id).remove();
                $('#tip' + id).remove();
                $('#a' + id).remove();
                $('#b' + id).remove();
                $('#tr' + id).remove();
            }
        }
    });


}
function Localizar() {

    let Tipo = document.getElementById('Tipo').value;
    $.ajax({
        type: 'get',
        url: '/Categorias/Localizar',
        data: {  'Tipo': Tipo },
        datatype: 'json',
        success: function (data) {

            $('#Categorias').html('');

            for (let i = 0; data.length > i; i++) {

                $('#Categorias').append('<tr id="tr' + i + '"> ><td id="id' + i + '">' + data[i].id + '</td><td id="desc' + i + '">' + data[i].descricao +
                    '</td><td id="tip' + i + '">' + data[i].tipo +
                    '<form action="/Categorias/Categorias" method="get" id="Form' + i + '">' +

                    '<input hidden name="Descricao" value="' + data[i].descricao + '"></input>' +
                    '<input  hidden name="Id" value="' + data[i].id + '"></input>' +
                    '<input  hidden name="Tipo" value="' + data[i].tipo + '"></input>' +
                    '<td><input name="" id="a' + i + '" onclick ="Editar(' + i + ');" class="btn btn-warning" type="button" value="Editar"></td>' +
                    '</form>' +
                    '<td><input name="" id="b' + i + '"  onclick = "Excluir(' + i + ',' + data[i].id + ');"class="btn btn-danger" type="button" value="Excluir"></td>'

                );
            }
        }
    });
}
