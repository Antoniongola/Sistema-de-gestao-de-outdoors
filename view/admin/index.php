<?php
include_once 'header.php';
#include_once '/xampp/htdocs/PF_20200446/controllers/AdminController.php';
include_once '/xampp/htdocs/PF_20200446/controllers/UserController.php';
include_once '/xampp/htdocs/PF_20200446/model/User.php';
session_start();

if (!isset($_SESSION['user'])) {
    header('location: ../../index.php');
}

#$controlador = new AdminController();
$users = new UserController();
?>
<!-- Recurments  section start-->
<div class="services_section">
    <div class="container">
        <h1 class="services_text">ADMINISTRADOR</h1>
    </div>
    <br>
    <br>
</div>

<div class="container">

</div>


<div class="Recurments_section_2">
    <div class="container">

        <div class="product_section">
            <div class="row padding_top_0">
                <div class="col-sm-2">
                    <div class="one_text"><a href="#" class="active">01</a></div>
                    <br>
                </div>
                <div class="col-sm-8">
                    <h1 class="software_text">Ativar, desativar e bloquear contas</h1>
                </div>
                <div class="col-sm-2">
                </div>
                <br>
                <br>

                <table class='table table-bordered table-responsive'>
                    <tr>
                        <th>id</th>
                        <th>Nome</th>
                        <th>Telemóvel</th>
                        <th>Email</th>
                        <th>Morada</th>
                        <th>Estado da conta</th>
                        <th colspan=3 align="center">Actions</th>
                    </tr>
                    <?php foreach ($users->recuperarTodosUsers() as $cliente): ?>
                        <tr>
                            <?php if ($cliente->getPerfil() === 'cliente' || $cliente->getPerfil() === 'user') { ?>
                                <td><?php echo $cliente->getId(); ?></td>
                                <td><?php echo $cliente->getNome(); ?></td>
                                <td><?php echo $cliente->getTelemovel(); ?></td>
                                <td><?php echo $cliente->getEmail(); ?></td>
                                <td><?php echo $cliente->getMorada(); ?></td>
                                <td><?php echo $cliente->getEstadoConta(); ?></td>

                                <?php if($cliente->getEstadoConta() === 'por ativar'){?>
                                    <td align="center">
                                        <a href="gestorDeUtilizador.php?op=ativar&id=<?php echo $cliente->getId(); ?>"><button class="bt btn-lg btn-success">Ativ.</button></a>
                                    </td>
                                <?php }else{?>
                                    <td align="center">#
                                    </td>
                                <?php }?>
                                    
                                <td align="center">
                                    <a href="gestorDeUtilizador.php?op=bloquear&id=<?php echo $cliente->getId(); ?>"><button class="bt btn-lg btn-danger">Blq.</button></a>
                                </td>
                                
                                <td align="center">
                                    <a href="gestorDeUtilizador.php?op=desbloquear&id=<?php echo $cliente->getId(); ?>"><button class="bt btn-lg btn-outline-info">Desbloq.</button></a>
                                </td>
                                
                            <?php } ?>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>

        <div class="Recurments_section_2">
            <div class="container">
                <div class="product_section">
                    <div class="row padding_top_0">
                        <div class="col-sm-2">
                            <div class="one_text"><a href="#">02</a></div>
                        </div>
                        <div class="col-sm-8">
                            <h1 class="software_text">Atualizar email</h1>
                            <p class="lorem_ipsum_text">Opção que lhe permite atualizar o seu email.</p>
                        </div>
                        <div class="col-sm-2">
                            <button class="apply_now"><a href="atualizarEmail.php">Atualizar email</a></button>
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
                            <div class="one_text"><a href="gestorForm.php">03</a></div>
                        </div>
                        <div class="col-sm-8">
                            <h1 class="software_text">Registrar gestor</h1>
                            <p class="lorem_ipsum_text">Caso precise de ajuda, pode adicionar alguém para ajudá-lo e assim manter a plataforma em dia.</p>
                        </div>
                        <div class="col-sm-2">
                            <button class="apply_now"><a href="gestorForm.php">Registrar</a></button>
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
                            <div class="one_text"><a href="visualizarGestores.php">04</a></div>
                        </div>
                        <div class="col-sm-8">
                            <h1 class="software_text">Visualizar gestores</h1>
                            <p class="lorem_ipsum_text">Opção que permite visualizar todos os gestores da plataforma.</p>
                        </div>
                        <div class="col-sm-2">
                            <button class="apply_now"><a href="visualizarGestores.php">Gestores</a></button>
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
                            <div class="one_text"><a href="mudarGestorDaSolicitacao.php">05</a></div>
                        </div>
                        <div class="col-sm-8">
                            <h1 class="software_text">Mudar Gestor da solicitação </h1>
                            <p class="lorem_ipsum_text">Mudar gestor responsável por determinada solicitação de aluguer.</p>
                        </div>
                        <div class="col-sm-2">
                            <button class="apply_now"><a href="mudarGestorDaSolicitacao.php">Mudar</a></button>
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
                            <div class="one_text"><a href="adminForm.php">06</a></div>
                        </div>
                        <div class="col-sm-8">
                            <h1 class="software_text">Registrar administrador</h1>
                            <p class="lorem_ipsum_text">Caso precise de ajuda, pode adicionar mais um administrador na plataforma para mantê-la em dia.</p>
                        </div>
                        <div class="col-sm-2">
                            <button class="apply_now"><a href="adminForm.php">Registrar</a></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php
        include_once 'footer.php';
        ?>