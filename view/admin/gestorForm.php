<?php
session_start();
include_once 'header.php';
include_once '/xampp/htdocs/PF_20200446/controllers/AdminController.php';
include_once '/xampp/htdocs/PF_20200446/repositories/ProvinciaRepository.php';
include_once '/xampp/htdocs/PF_20200446/repositories/NacionalidadeRepository.php';
include_once '/xampp/htdocs/PF_20200446/model/Nacionalidade.php';

$admin = new AdminController();
$repositorioProvincia = new ProvinciaRepository();
$repositorioNacionalidade = new NacionalidadeRepository();
$admin->criarGestor();

if(!isset($_SESSION['user'])){
    header('location: ../../index.php');
}
?>
<title>Outdoors Angola | Formulário de inscrição de gestor</title>
<div class="services_section">
    <div class="container">
        <h1 class="services_text">REGISTRE UM GESTOR</h1>
    </div>
</div>
<div class="login_section">
    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card card-signin my-5">
                    <div class="card-body">
                        <h5 class="card-title text-center">Registro</h5>

                        <form class="form-signin" method="post">
                            
                            <div class="form-label-group">
                                <input type="text" name=nome id="inputNome" class="form-control" placeholder="Nome" required autofocus>
                                <label for="inputNome">Nome</label>
                            </div>

                            <div class="form-label-group">
                                <input type="text" name=username id="inputUsername" class="form-control" placeholder="Username" required autofocus>
                                <label for="inputUsername">Username</label>
                            </div>

                            <div class="form-label-group">
                                <input type="email" name=email id="inputEmail" class="form-control" placeholder="Email" required autofocus>
                                <label for="inputEmail">Email</label>
                            </div>

                            <div class="form-label-group">
                                <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
                                <label for="inputPassword">Senha</label>
                            </div>

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
                            </div><!--municipios, comunas e províncias-->

                            <div class="form-label-group">
                                <select id="nacionalidade" name="nacionalidade" style="width: 60%">
                                    <option>-- Nacionalidade --</option>
                                    <?php foreach ($repositorioNacionalidade->selectAll() as $nacionalidades) {?>
                                    <option> <?php echo $nacionalidades->getNome(); ?></option>
                                    <?php }?>
                                </select>
                            </div>

                            <div class="form-label-group">
                                <input type="text" name=morada id="inputMorada" class="form-control" placeholder="Morada" required autofocus>
                                <label for="inputMorada">Morada</label>
                            </div>

                            <div class="form-label-group">
                                <input type="text" name=telemovel id="inputTelemovel" class="form-control" placeholder="Telemovel" minlength="9" maxlength="12" required autofocus>
                                <label for="inputTelemovel">Telemovel</label>
                            </div>
                            
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
<script src="../../scripts/custom/cascata2.js"></script>

<?php
include_once 'footer.php';
?>
