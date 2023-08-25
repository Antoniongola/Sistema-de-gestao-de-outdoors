<?php
session_start();
include_once 'header.php';
include_once '/xampp/htdocs/PF_20200446/repositories/ComprovativoRepository.php';
include_once '/xampp/htdocs/PF_20200446/controllers/usercontroller.php';

if(!isset($_SESSION['user'])){
    header('location: ../../index.php');
}

$user = new UserController();
$user->carregarComprovativo();

?>

<title>Outdoors Angola | Carregamento de comprovativo</title>

<div class="services_section">
    <div class="container">
        <h1 class="services_text">CARREGAR COMPROVATIVO</h1>
    </div>
</div>
<div class="login_section">
    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card card-signin my-5">
                    <div class="card-body">
                        <h5 class="card-title text-center">carregar comprovativo</h5>

                        <form method="post" enctype="multipart/form-data">
                            <div>
                                <label for="tipodeoutdoor">Escolha o documento que deseja carregar para a plataforma</label>
                                <br>
                                <input type="file" name="ficheiro" id="ficheiro" accept=".pdf" required>
                            </div>
                            <br>
                            
                            <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Carregar</button>

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

