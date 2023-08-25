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

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $email = filter_input(INPUT_POST, 'email'); 
    $useres->alterarDados($result->getId(), $result->getNome(),$result->getProvincia() , $result->getMunicipio(), $result->getComuna(), $result->getNacionalidade(), $result->getMorada(), $email, $result->getTelemovel(), $result->getUsername(), $result->getPassword(),'', '' ,'administrador', 'ativo');
    header('location: index.php');
}
?>

<title>Outdoors Angola | Formulário de alteração de email</title>
<div class="services_section">
    <div class="container">
        <h1 class="services_text">ATUALIZAÇÃO DE EMAIL!</h1>
    </div>
</div>
<div class="login_section">
    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card card-signin my-5">
                    <div class="card-body">
                        <h5 class="card-title text-center">Atualização de Email</h5>

                        <form class="form-signin" method="post">
                            <div>
                                <label for="senha">Insira o seu email: </label>
                                <input type="email" name="email" id="email" required>
                            </div>
                            <br>
                            <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Alterar email</button>

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
