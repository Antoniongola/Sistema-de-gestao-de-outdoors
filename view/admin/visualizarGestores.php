<?php
session_start();

if(!isset($_SESSION['user'])){
    header('location: ../../index.php');
}

include_once 'header.php';
include_once '/xampp/htdocs/PF_20200446/controllers/AdminController.php';
include_once '/xampp/htdocs/PF_20200446/repositories/GestorRepository.php';
include_once '/xampp/htdocs/PF_20200446/model/Gestor.php';

$gestor = new GestorRepository();
?>
<!-- Recurments  section start-->
    <div class="services_section">
        <div class="container">
            <h1 class="services_text">VISUALIZAR GESTORES</h1>
        </div>
        <br>
        <br>
    </div>

    <div class="Recurments_section_2">
    	<div class="container">
            
    		<div class="product_section">
                    <div class="row padding_top_0">
                        <br>
                        <br>
                        <table class='table table-bordered table-responsive'>
                            <tr>
                                <th>Id</th>
                                <th>Nome</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Nº de solicitações</th>
                            </tr>
                            <?php foreach ($gestor->selectAll() as $gestor): ?>
                                <tr>
                                    <td><?php echo $gestor->getId() ?></td>
                                    <td><?php echo $gestor->getNome(); ?></td>
                                    <td><?php echo $gestor->getUsername() ?></td>
                                    <td><?php echo $gestor->getEmail(); ?></td>
                                    <td><?php echo $gestor->getSolicitacoes() ?></td>
                                </tr>
                                
                            <?php endforeach; ?>
                            <tr>
                                <td colspan="9" align="center">
                                    <div class="pagination-wrap">
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
<?php
include_once 'footer.php';
?>