<?php
include_once 'header.php';
session_start();

if(!isset($_SESSION['user'])){
    header('location: ../../index.php');
}

include_once '/xampp/htdocs/PF_20200446/services/ServiceClasses/UserService.php';
include_once '/xampp/htdocs/PF_20200446/controllers/GestorController.php';
include_once '/xampp/htdocs/PF_20200446/model/User.php';
include_once '/xampp/htdocs/PF_20200446/model/Gestor.php';
$users = new UserService();
$gestor = $users->apresentarUser($_SESSION['user']);
$controlador = new GestorController();
$gest = $controlador->apresentarGestor($gestor->getId());
$_SESSION['fkgestor'] = $gest->getId();
?>
<!-- Recurments  section start-->
    <div class="services_section">
        <div class="container">
            <h1 class="services_text">GESTOR</h1>
        </div>
        <br>
    </div>
    
    <?php if($gest->getEstadoConta() === 'autenticado'){ ?>
        <div class="Recurments_section_2">
            <div class="container">
                <div class="product_section">
                    <div class="row padding_top_0">
                        <div class="col-sm-2">
                            <div class="one_text"><a href="analisarSolicitacoes.php" class="active">01</a></div>
                        </div>
                        <div class="col-sm-8">
                            <h1 class="software_text">Analisar solicitação de aluguer dos clientes</h1>
                            <p>Opção que lhe permite recusar ou aprovar uma solicitação de aluguer proveniente de um da plataforma Outdoors Angola.</p>
                        </div>
                        <div class="col-sm-2">
                            <button class="apply_now"><a href="analisarSolicitacoes.php">Analisar</a></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="Recurments_section_2">
            <div class="container">
                <div class="product_section">
                    <div class="row padding_top_0">
                        <div class="col-sm-2">
                            <div class="one_text"><a href="outdoorForm.php">02</a></div>
                        </div>
                        <div class="col-sm-8">
                            <h1 class="software_text">Inserir Outdoor</h1>
                            <p class="lorem_ipsum_text">Opção que lhe permite inserir um novo outdoor na plataforma Outdoors Angola.</p>
                        </div>
                        <div class="col-sm-2">
                            <button class="apply_now"><a href="outdoorForm.php">Inserir</a></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="Recurments_section_2">
            <div class="container">
                <div class="product_section">
                    <div class="row padding_top_0">
                        <div class="col-sm-2">
                            <div class="one_text"><a href="#">03</a></div>
                        </div>
                        <div class="col-sm-8">
                            <h1 class="software_text">Visualizar Outdoors</h1>
                            <p class="lorem_ipsum_text">Opção que lhe permite ver, remover e atualizar um outdoor da plataforma Outdoors Angola.</p>
                        </div>
                        <div class="col-sm-2">
                            <button class="apply_now"><a href="visualizarOutdoors.php">Atualizar/Remover</a></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php }else{?>
        <div class="Recurments_section_2">
            <div class="container">
                <div class="product_section">
                    <div class="row padding_top_0">
                        <div class="col-sm-2">
                            <div class="one_text"><a href="#">01</a></div>
                        </div>
                        <div class="col-sm-8">
                            <h1 class="software_text">Atualizar password</h1>
                            <p class="lorem_ipsum_text">Opção que lhe permite atualizar password pra poder fazer as funções na plataforma.</p>
                        </div>
                        <div class="col-sm-2">
                            <button class="apply_now"><a href="atualizarPass.php">Atualizar senha</a></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php }?>

<?php
include_once 'footer.php';
?>