
/* global fetch */

const jsProvincia = document.getElementById('provincia');
const jsMunicipio = document.getElementById('municipio');
const jsComuna = document.getElementById('comuna');

// Manipulador de evento para o select de província
jsProvincia.addEventListener('change', function () {
    // Limpe o select de municípios e desative-o
    jsMunicipio.innerHTML = "<option value=''>-- Municipio --</option>";
    jsComuna.innerHTML = "<option value=''>-- Comuna --</option>";
    jsMunicipio.disabled = true;
    jsComuna.disabled = true;

    // Obtenha o ID da província selecionada
    const provinciaNome = jsProvincia.value;
    // Se a província selecionada não for vazia, faça a requisição AJAX para recuperar os municípios
    if (provinciaNome !== '') {
        // Faça a requisição AJAX para recuperar os municípios com base na província selecionada
        fetch('../../repositories/MunicipioRepository.php?provinciaNome=' + encodeURIComponent(provinciaNome))
                .then(response => response.json())
                .then(data => {
                    // Preencha o select de municípios com os dados recuperados
                    data.forEach(municipios => {
                        jsMunicipio.innerHTML += "<option value='" + municipios['nome'] + "'>" + municipios['nome'] + "</option>";
                    });

                    // Ative o select de municípios
                    jsMunicipio.disabled = false;
                })
                .catch(error => console.error(error));
    }
});

// Manipulador de evento para o select de município
jsMunicipio.addEventListener('change', function () {
    // Limpe o select de comunas e desative-o
    jsComuna.innerHTML = "<option value=''>-- Comuna --</option>";
    jsComuna.disabled = true;

    // Obtenha o ID do município selecionado
    const municipioNome = jsMunicipio.value;

    // Se o município selecionado não for vazio, faça a requisição AJAX para recuperar as comunas
    if (municipioNome !== '') {
        // Faça a requisição AJAX para recuperar as comunas com base no município selecionado
        fetch('../../repositories/ComunaRepository.php?municipioNome=' + encodeURIComponent(municipioNome))
                .then(response => response.json())
                .then(data => {
                    // Preencha o select de comunas com os dados recuperados
                    data.forEach(comunas => {
                        jsComuna.innerHTML += "<option value='" + comunas['nome'] + "'>" + comunas['nome'] + "</option>";
                    });

                    // Ative o select de comunas
                    jsComuna.disabled = false;
                })
                .catch(error => console.error(error));
    }
});