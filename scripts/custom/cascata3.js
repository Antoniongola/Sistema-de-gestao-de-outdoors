
/* global fetch */
let JsTipoCliente = document.getElementById('tipodecliente');
let JsAtividadeEmpresa = document.getElementById('atividadedaempresa');
const jsProvincia = document.getElementById('provincia');
const jsMunicipio = document.getElementById('municipio');
const jsComuna = document.getElementById('comuna');

JsTipoCliente.addEventListener('change', function () {
    if(JsTipoCliente.value === 'Particular' || JsTipoCliente.value === 'particular'){
        JsAtividadeEmpresa.required = false;
        //JsAtividadeEmpresa.value = 'nenhuma';
        JsAtividadeEmpresa.hidden = true;
    }else{
        JsAtividadeEmpresa.hidden = false;
        JsAtividadeEmpresa.disabled = false;
    }
});

jsProvincia.addEventListener('change', function () {
    jsMunicipio.innerHTML = "<option value=''>-- Municipio --</option>";
    jsComuna.innerHTML = "<option value=''>-- Comuna --</option>";
    jsMunicipio.disabled = true;
    jsComuna.disabled = true;

    const provinciaNome = jsProvincia.value;
    if (provinciaNome !== '') {
        fetch('../repositories/MunicipioRepository.php?provinciaNome=' + encodeURIComponent(provinciaNome))
                .then(response => response.json())
                .then(data => {
                    data.forEach(municipios => {
                        jsMunicipio.innerHTML += "<option value='" + municipios['nome'] + "'>" + municipios['nome'] + "</option>";
                    });
                    jsMunicipio.disabled = false;
                })
                .catch(error => console.error(error));
    }
});

jsMunicipio.addEventListener('change', function () {
    jsComuna.innerHTML = "<option value=''>-- Comuna --</option>";
    jsComuna.disabled = true;

    const municipioNome = jsMunicipio.value;

    if (municipioNome !== '') {
        fetch('../repositories/ComunaRepository.php?municipioNome=' + encodeURIComponent(municipioNome))
                .then(response => response.json())
                .then(data => {
                    data.forEach(comunas => {
                        jsComuna.innerHTML += "<option value='" + comunas['nome'] + "'>" + comunas['nome'] + "</option>";
                    });

                    jsComuna.disabled = false;
                })
                .catch(error => console.error(error));
    }
});