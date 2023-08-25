<?php

session_start();
include_once 'header.php';
#include_once '/xampp/htdocs/PF_20200446/controllers/usercontroller.php';
include_once '/xampp/htdocs/PF_20200446/controllers/outdoorcontroller.php';

if(!isset($_SESSION['user'])){
    header('location: ../../index.php');
}

$controlador = new OutdoorController();
$controlador->inserirAluguer();
?>

<title>Outdoors Angola | Formulário de solicitação de aluguer</title>
<div class="services_section">
    <div class="container">
        <h1 class="services_text">SOLICITAÇÃO DE ALUGUER</h1>
    </div>
</div>
<div class="login_section">
    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card card-signin my-5">
                    <div class="card-body">
                        <h5 class="card-title text-center">Solicitação</h5>

                        <form class="form-signin" method="post" enctype="multipart/form-data">
                            <div class="form-label-group">
                                <label for="datainicio">Data de Inicio do Aluguel</label>
                                <input type="date" name=datainicio id="datainicio" class="form-control" required autofocus>
                            </div>
                            <div class="form-label-group">
                                <label for="datafim">Data de Fim do Aluguel</label>
                                <input type="date" name=datafim id="datafim" class="form-control" required autofocus>
                            </div>
                            <br>
                            
                            <div class="custom-control custom-checkbox mb-3">
                                <input type="checkbox" class="custom-control-input" id="calculaPreco" name="calculaPreco" value="sim">
                                <label class="custom-control-label" for="calculaPreco" name="calculaPreco">Calcular preço</label>
                            </div>
                            
                            <div class="">
                                <span>PREÇO TOTAL: </span>
                                <br>
                                <input type="number" name="precoInicial" value="<?php echo $_SESSION['preco']; ?>" id="precoInicial" disabled="">
                            </div>
                            
                            <br>
                            <div class="custom-control custom-checkbox mb-3">
                                <input type="checkbox" class="custom-control-input" id="imagem" name="imagem" value="nao">
                                <label class="custom-control-label" for="imagem" name="imagem">O outdoor não tem imagem</label>
                            </div>
                            
                            <div>
                                <label for="tipodeoutdoor" id="sms" name="sms" hidden>Escolha o documento que deseja carregar para a plataforma</label>
                                <br>
                                <input type="file" name="ficheiro" id="ficheiro" required="">
                            </div>
                            <br>
                            <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Registrar</button>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<script src="../scripts/custom/solicitarAluguer.js"></script>

<?php
include_once 'footer.php';
?>

