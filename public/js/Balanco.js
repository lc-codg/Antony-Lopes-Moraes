function Validar() {

    if (document.getElementById("CodEmpresa").value == 'Selecione...')
        alert('Selecione uma Empresa');

    else if (document.getElementById("Valor").value == '')
        alert('Digite o Valor');
    else if (document.getElementById("Data") == null)
        alert('Selecione a Data');
    else

        document.forms["form"].submit();
}

function Localizar() {

    if (document.getElementById('CodEmpresa').value == 'Selecione...') {
        alert('Selecione a empresa');
    } else {
        Dataini = document.getElementById('Dataini').value;
        Datafim = document.getElementById('Datafim').value;
        CodEmpresa = document.getElementById('CodEmpresa').value;

        $.ajax({
            type: 'get',
            url: '/Balanco/Localizar/',
            data: { 'Dataini': Dataini, 'Datafim': Datafim, 'CodEmpresa': CodEmpresa },
            datatype: 'json',
            success: function(data) {

                $('#enderecos').html('');

                for (let i = 0; data.length > i; i++) {

                    $('#enderecos').append('<tr><td>' + data[i].id + '</td><td>' + data[i].Data + '</td><td>' +
                        data[i].Valor + '</td><td>' + data[i].CodEmpresa

                    );


                }
            }
        });
    }
}
