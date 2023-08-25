<?php
include_once 'header.php';
include_once '/xampp/htdocs/PF_20200446/model/Provincia.php';
include_once '/xampp/htdocs/PF_20200446/model/Nacionalidade.php';
include_once '/xampp/htdocs/PF_20200446/repositories/ProvinciaRepository.php';
include_once '/xampp/htdocs/PF_20200446/repositories/NacionalidadeRepository.php';
include_once '/xampp/htdocs/PF_20200446/controllers/usercontroller.php';
session_start();

if(!isset($_SESSION['user'])){
    header('location: ../index.php');
}
$repositorioProvincia = new ProvinciaRepository();
$repositorioNacionalidade = new NacionalidadeRepository();
$utilizador = new UserController();
$user = $utilizador->recuperarUserByEmail($_SESSION['user']);
$utilizador->atualizarDados();
?>
<title>Outdoors Angola | Formulário de atualização de dados</title>
<div class="services_section">
    <div class="container">
        <h1 class="services_text">ATUALIZAÇÃO DE DADOS DA CONTA!</h1>
    </div>
</div>
<div class="login_section">
    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card card-signin my-5">
                    <div class="card-body">
                        <h5 class="card-title text-center">Atualização</h5>

                        <form class="form-signin" method="post">

                            <div class="form-label-group">
                                <input type="text" name=nome id="inputNome" class="form-control" value="<?php echo $user->getNome(); ?>" placeholder="Nome" autofocus>
                                <label for="inputNome">Nome</label>
                            </div>

                            <div class="form-label-group">
                                <input type="text" name=username id="inputUsername" class="form-control" value="<?php echo $user->getUsername(); ?>" placeholder="Username" autofocus>
                                <label for="inputUsername">Username</label>
                            </div>

                            <div class="form-label-group">
                                <input type="email" name=email id="inputEmail" class="form-control" value="<?php echo $user->getEmail(); ?>" placeholder="Email" autofocus>
                                <label for="inputEmail">Email</label>
                            </div>

                            <div class="form-label-group">
                                <input type="password" name="password" id="inputPassword" class="form-control" value="<?php echo $user->getPassword(); ?>" placeholder="Password" >
                                <label for="inputPassword">Senha</label>
                            </div>

                            <div class="form-label-group">
                                <select id="tipodecliente" name="tipodecliente"  style="width: 60%">
                                    <option>-- tipo de cliente --</option>
                                    <option>Particular</option>
                                    <option>Empresa</option>
                                </select>
                            </div>

                            <div class="form-label-group">
                                <input type="text" name=atividadedaempresa id="atividadedaempresa" class="form-control" placeholder="Atividade da empresa" autofocus>
                                <label for="atividadedaempresa">Atividade da empresa</label>
                            </div>

                            <div>
                                <select id="provincia" name="provincia" style="width: 31%">
                                    <option><?php echo $user->getProvincia(); ?></option>
                                    <?php $repositorioProvincia->selectAll(); ?>
                                </select>

                                <select id="municipio" name="municipio" style="width: 31%">
                                    <option><?php echo $user->getMunicipio(); ?></option>
                                </select>

                                <select id="comuna" name="comuna" style="width: 31%">
                                    <option><?php echo $user->getComuna(); ?></option>
                                </select>
                                <br>
                                <br>
                            </div>
                            
                            <div class="form-label-group">
                                <select id="nacionalidade" name="nacionalidade"  style="width: 60%">
                                    <option><?php echo $user->getNacionalidade(); ?>"</option>
                                    <?php foreach ($repositorioNacionalidade->selectAll() as $nacionalidades) {?>
                                    <option> <?php echo $nacionalidades->getNome(); ?></option>
                                    <?php }?>
                                </select>
                            </div>

                            <div class="form-label-group">
                                <input type="text" name=morada id="inputMorada" class="form-control" value="<?php echo $user->getMorada(); ?>" placeholder="Morada" autofocus>
                                <label for="inputMorada">Morada</label>
                            </div>

                            <div class="form-label-group">
                                <input type="text" name=telemovel id="inputTelemovel" class="form-control" value="<?php echo $user->getTelemovel(); ?>" placeholder="Telemovel" minlength="9" maxlength="12" autocus>
                                <label for="inputTelemovel">Telemovel</label>
                            </div>

                            <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Atualizar</button>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<script src="../scripts/custom/cascata3.js"></script>
<script src="../scripts/custom/myscript.js"></script>

<?php
include_once 'footer.php';
?>

