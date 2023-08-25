/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
let JsDataInicio = document.getElementById('datainicio');
let JsDataFim = document.getElementById('datafim');
let preco = document.getElementById('precoInicial');
let calcula = document.getElementById('calculaPreco');
let img = document.getElementById('imagem');
let sms = document.getElementById('sms');
let ficheiro = document.getElementById('ficheiro');
let timeDiff;
let diffDays;

var date2 = new Date(JsDataFim);

img.addEventListener('change', function () {
    if(img.value === 'nao'){
        ficheiro.required = false;
        ficheiro.hidden = true;
        sms.hidden = true;
    }else{
        ficheiro.required = true;
        ficheiro.hidden = false;
        sms.hidden = false;
    }
});

calcula.onchange = () =>{
    var date1 = new Date(JsDataInicio.value);
    var date2 = new Date(JsDataFim.value);
    timeDiff = Math.abs(date2 - date1);
    diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24));
    
    if(diffDays === 0)
        diffDays = 1;
    
    let resultado = preco.value * diffDays;
    preco.value = resultado;
    preco.disabled = false;
    preco.hidden = true;
};