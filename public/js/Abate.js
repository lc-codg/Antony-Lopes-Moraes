let i = 0;
let Total = 0;
let Quantidade = 0;
let Subtotal = 0;

function Apurar() {

   
}

function Inserir() {
 
  let Valor = new Array(7);
  let Tabela = new Array(7);
  var Peso = parseFloat(document.getElementById('Pesado').value);

  if (Peso >= 160){

    for (let j = 0; j <= 7; j++) {
        Valor[j] = document.getElementById(j).value;
    }

    for (let l = 0; l <= 7; l++) {
        Tabela[l] = document.getElementById(l + 'p').value;
    }



    for (let m = 0; m <= 7; m++) {

        if (Peso >= Tabela[m]) {

            document.getElementById('faixa' + i).value = Tabela[m];

            document.getElementById('quantidade' + i).value = 1;

            let Moeda = parseFloat((Peso * Valor[m])/15) ;

            document.getElementById('valor' + i).value = Moeda.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'});
        

            document.getElementById('peso' + i).value = Peso;

            Total = parseFloat(Total + Peso);

            Quantidade = Quantidade + 1;

            Subtotal = Subtotal + Moeda;

            document.getElementById('Totala').value = Total;
            document.getElementById('Totals').value = Subtotal;
            document.getElementById('Totalq').value = Quantidade;
              
            break;

        }
        
    }

    if (i < 7)
        i++;

}else{
    alert('Peso abaixo da tabela');
}
}
