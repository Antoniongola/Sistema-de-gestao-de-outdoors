<?php
session_start();
include_once 'header.php';
include_once '/xampp/htdocs/PF_20200446/model/Provincia.php';
include_once '/xampp/htdocs/PF_20200446/controllers/UserController.php';
include_once '/xampp/htdocs/PF_20200446/services/ServiceClasses/UserService.php';

if(!isset($_SESSION['user'])){
    header('location: ../../index.php');
}

$user = new UserController();
$useres = new UserService();
$result = $useres->apresentarUser($_SESSION['user']);
echo 'teste, '. $result->getEstadoConta();

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $senha = filter_input(INPUT_POST, 'senha'); 
    echo 'teste, '. $result->getId();
    $useres->alterarDados($result->getId(), $result->getNome(),$result->getProvincia() , $result->getMunicipio(), $result->getComuna(), $result->getNacionalidade(), $result->getMorada(), $result->getEmail(), $result->getTelemovel(), $result->getUsername(), $senha,'', '', 'gestor', 'autenticado');
    header('location: index.php');
}
?>

<title>Outdoors Angola | Formulário de atualização de senha</title>
<div class="services_section">
    <div class="container">
        <h1 class="services_text">ATUALIZAÇÃO DE SENHA!</h1>
    </div>
</div>
<div class="login_section">
    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card card-signin my-5">
                    <div class="card-body">
                        <h5 class="card-title text-center">Atualização de senha</h5>

                        <form class="form-signin" method="post">
                            <div>
                                <label for="senha">Insira a password: </label>
                                <input type="password" name="senha" id="senha" required>
                            </div>
                            <br>
                            <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Atualizar senha</button>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<?php
include_once 'footer.php';
?>

