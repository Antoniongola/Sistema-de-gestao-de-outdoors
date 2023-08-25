/* global fetch */
let JsTipoCliente = document.getElementById('tipodecliente');
let JsAtividadeEmpresa = document.getElementById('atividadedaempresa');

JsTipoCliente.onchange = () =>{
    if(JsTipoCliente.value === 'Particular'){
        JsAtividadeEmpresa.value = 'nenhuma';
        JsAtividadeEmpresa.hidden = true;
    }
};
/*
JsProvincia.onchange = () =>{
    JsMunicipio.disabled = false;
    JsMunicipio = document.getElementById('municipio');
    alert(JsMunicipio.value);
    fetch("/xampp/htdocs/PF_20200446/repositories/MunicipioRepository.php?municipio="+JsProvincia.value)
        .then(response =>{
                return response.text();
        })
        .then(result =>{
            JsMunicipio.innerHTML = 'texto';
        });
    
    JsMunicipio.onchange = () =>{
        alert('Mudou de municipio');
        let JsComuna = document.getElementById('comuna');
        JsComuna.innerHTML = '<option>teste</option>';
    };
};
*/