<?php
include_once 'header.php';
include '/xampp/htdocs/PF_20200446/model/User.php';
include '/xampp/htdocs/PF_20200446/model/Cliente.php';
include '/xampp/htdocs/PF_20200446/services/ServiceClasses/UserService.php';
include '/xampp/htdocs/PF_20200446/services/ServiceClasses/ClienteService.php';

session_start();
if(!isset($_SESSION['user'])){
    header('location: ../index.php');
}

$userS = new UserService();
$clientela = new ClienteService();
$user = $userS->apresentarUser($_SESSION['user']);
$cliente = $clientela->apresentarCliente($user->getId());
$_SESSION['idcliente'] = $cliente->getId();

if($user->getPerfil() === 'user'){
    $userS->alterarDados($user->getId(), $user->getNome(), $user->getProvincia(), $user->getMunicipio(), $user->getComuna(), $user->getNacionalidade(), $user->getMorada(), $user->getEmail(), $user->getTelemovel(), $user->getUsername(), $user->getPassword(),$cliente->getTipodecliente() ,$cliente->getAtividadedaempresa() , 'cliente', $user->getEstadoConta());
}
    
?>
<!-- banner section end-->
<!-- marketing section start-->
<title>Outdoors Angola | Pagina inicial</title>
<div class="marketing_section layout_padding">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="job_section">
                    <h1 class="jobs_text">Minha conta</h1>
                    <p class="dummy_text">Esta opção permite-lhe alterar os seus dados de adesão da conta. Por algum motivo, o utilizador pode não ter posto informações verídicas, pode refazê-las agora!</p>
                    <div class="apply_bt"><a href="alterarDadosDoClienteForm.php">Alterar dados</a></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="image_1 padding_0"><img src="../content/bootstrap/images/img-1.png"></div>
            </div>
        </div>
    </div>
</div>
<!-- marketing section end-->
<!-- Industrial section start-->
<div class="marketing_section layout_padding">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="image_1 padding_0"><img src="../content/bootstrap/images/img-2.png"></div>
            </div>
            <div class="col-md-6">
                <div class="job_section_2">
                    <h1 class="jobs_text">Outdoors disponíveis</h1>
                    <p class="dummy_text">Presumo que já tenha visto a nossa vasta gama de outdoors disponíveis enquanto navegava pela página no modo convidado. Tenha a oportunidade de alugar já o outdoor a sua escolha!</p>
                    <div class="apply_bt"><a href="visualizarOutdoors.php">Ver Outdoors disponíveis</a></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Industrial section end-->
<!-- Corporate section start-->
<div class="marketing_section layout_padding">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="job_section">
                    <h1 class="jobs_text">As suas solicitações de aluguer</h1>
                    <p class="dummy_text">Agradecemos imenso pela sua preferência, aqui nesta secção o (a) senhor (a) pode consultar todas solicitações de aluguer feitas por si!<br>Pode também enviar o seu comprovativo por aqui.</p>
                    <div class="apply_bt"><a href="minhasSolicitacoes.php">Consultá-las</a></div>
                </div>
            </div>
            <div class="col-md-6 padding_0">
                <div class="image_1"><img src="../content/bootstrap/images/negocio.jpg"></div>
            </div>
        </div>
    </div>
</div>

<!--
<div class="marketing_section layout_padding">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="image_1 padding_0"><img src="../content/bootstrap/images/comprovativo.jpg"></div>
            </div>
            <div class="col-md-6">
                <div class="job_section_2">
                    <h1 class="jobs_text">Comprovativo de pagamento de aluguer</h1>
                    <p class="dummy_text">Nós confiamos plenamente nos nossos clientes mas negócio sem dinheiro deixa de ser negócio, não é? Por favor, envie o comprovativo de pagamento!</p>
                    <div class="apply_bt"><a href="carregarComprovativo.php">Envie já!</a></div>
                </div>
            </div>
        </div>
    </div>
</div>
-->

<?php
include_once'footer.php';
?>
