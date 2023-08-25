<?php
session_start();
include_once 'header.php';
include_once '/xampp/htdocs/PF_20200446/model/Provincia.php';
include_once '/xampp/htdocs/PF_20200446/controllers/GestorController.php';
include_once '/xampp/htdocs/PF_20200446/controllers/AdminController.php';

if(!isset($_SESSION['user'])){
    header('location: ../../index.php');
}

#$result = $useres->apresentarUser($_SESSION['user']);
$gestor = new GestorController();
$admin = new AdminController();
$admin->mudarGestorDaSolicitacao();
?>

<title>Outdoors Angola | Formulário de mudança de gestor</title>

<div class="services_section">
    <div class="container">
        <h1 class="services_text">MUDANÇA DE GESTOR!</h1>
    </div>
</div>

<div class="login_section">
    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card card-signin my-5">
                    <div class="card-body">
                        <h5 class="card-title text-center">Atualização de gestor</h5>

                        <form class="form-signin" method="post">
                            <div>
                                <span>LISTA DE GESTORES DA PLATAFORMA </span>
                                <br>
                                <select id="novogestor" name="novogestor">
                                    <?php foreach ($gestor->apresentarGestores() as $gestor) {?>
                                    <option value="<?php echo $gestor->getId() ?>"> <?php echo $gestor->getNome(); ?></option>
                                    <?php }?>
                                </select>
                            </div>
                            <br>
                            <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Atualizar gestor</button>

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

