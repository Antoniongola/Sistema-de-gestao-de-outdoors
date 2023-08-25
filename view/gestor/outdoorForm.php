<?php
session_start();

if (!isset($_SESSION['user'])) {
    header('location: ../../index.php');
}

include_once 'header.php';
include_once '/xampp/htdocs/PF_20200446/model/Provincia.php';
include_once '/xampp/htdocs/PF_20200446/repositories/ProvinciaRepository.php';
include_once '/xampp/htdocs/PF_20200446/repositories/ComunaRepository.php';
include_once '/xampp/htdocs/PF_20200446/controllers/OutdoorController.php';
include_once '/xampp/htdocs/PF_20200446/repositories/OutdoorRepository.php';

$repositorioProvincia = new ProvinciaRepository();

$outdoor = new OutdoorController();
$outdoorII = new OutdoorRepository();
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $tipodeoutdoor = filter_input(INPUT_POST, 'tipodeoutdoor');
    $provincia = filter_input(INPUT_POST, 'provincia');
    $municipio = filter_input(INPUT_POST, 'municipio');
    $comuna = filter_input(INPUT_POST, 'comuna');
    $preco = filter_input(INPUT_POST, 'preco');
    $outdoor->inserirOutdoor($tipodeoutdoor, $preco, 'disponivel', $provincia, $municipio, $comuna);
    echo '<script> alert("OUTDOOR ADICIONADO COM SUCESSO!"); </script>"';
}
?>

<title>Outdoors Angola | Formulário de adição de outdoor</title>
<div class="services_section">
    <div class="container">
        <h1 class="services_text">INSERIR OUTDOOR!</h1>
    </div>
</div>
<div class="login_section">
    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card card-signin my-5">
                    <div class="card-body">
                        <h5 class="card-title text-center">Inserção Outdoor</h5>

                        <form class="form-signin" method="post">
                            <div>
                                <label for="tipodeoutdoor">Escolha o tipo de outdoor</label>
                                <br>
                                <select id="tipodeoutdoor" name="tipodeoutdoor" style="width: 31%">
                                    <option>-- Tipo de Outdoor --</option>
                                    <option>Paineis Luminosos</option>
                                    <option>Paineis Não Luminosos</option>
                                    <option>Faixadas</option>
                                    <option>Placas Indicativas</option>
                                    <option>Lampoles</option>
                                </select>
                            </div>
                            <br>
                            <label>Escolha a província, município e comuna do seu outdoor</label>
                            <div>
                                <select id="provincia" name="provincia" style="width: 31%">
                                    <option>-- Provincia --</option>
                                    <?php $repositorioProvincia->selectAll(); ?>
                                </select>

                                <select id="municipio" name="municipio" style="width: 31%">
                                    <option>-- Municipio --</option>
                                </select>

                                <select id="comuna" name="comuna" style="width: 31%">
                                    <option>-- Comuna --</option>
                                </select>
                                <br>
                                <br>
                            </div>
                            <br>
                            <br>
                            <div>
                                <label for="preco">Escolha o preço</label>
                                <br>
                                <input type="number" id="preco" name="preco" placeholder="insira o preço">
                            </div>
                            <br>
                            </div> <!--municipios, comunas e províncias-->

                            <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Registrar</button>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="../../scripts/custom/cascata2.js">

    <?php
    include_once 'footer.php';
    ?>

