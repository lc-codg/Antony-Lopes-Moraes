let totals = $('.price');
let sum = 0;

for (let i = 0; i < totals.length; i++) {
    sum += parseFloat($(totals[i]).text());
}

const formatado = sum.toLocaleString('pt-BR', {
    style: 'currency',
    currency: 'BRL'
});

document.getElementById('h7').innerHTML = formatado;
