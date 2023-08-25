<?php
session_start();
if(!isset($_SESSION['user'])){
    header('location: ../../index.php');
}
include_once 'header.php';
include_once '/xampp/htdocs/PF_20200446/controllers/GestorController.php';
include_once '/xampp/htdocs/PF_20200446/controllers/OutdoorController.php';
include_once '/xampp/htdocs/PF_20200446/model/Outdoor.php';

$outdoors = new OutdoorController();
$gestor = new GestorController();
$gestor->gerirInformacao();
?>
<!-- Recurments  section start-->
    <div class="services_section">
        <div class="container">
            <h1 class="services_text">VISUALIZAR OUTDOORS</h1>
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
                                <th>Tipo de outdoor</th>
                                <th>Provincia</th>
                                <th>Municipio</th>
                                <th>Comuna</th>
                                <th>Estado</th>
                                <th>Preço</th>
                                <th colspan=2 align="center">Actions</th>
                            </tr>
                            <?php foreach ($outdoors->recuperarTodosOutdoors() as $outdoor): ?>
                                <tr>
                                    <td><?php echo $outdoor->getId() ?></td>
                                    <td><?php echo $outdoor->getTipodeoutdoor(); ?></td>
                                    <td><?php echo $outdoor->getProvincia() ?></td>
                                    <td><?php echo $outdoor->getMunicipio(); ?></td>
                                    <td><?php echo $outdoor->getComuna() ?></td>
                                    <td><?php echo $outdoor->getEstado(); ?></td>
                                    <td><?php echo $outdoor->getPreco(); ?></td>
                                    <td align="center">
                                        <a href="visualizarOutdoors.php?op=atualizar&id=<?php echo $outdoor->getId() ?>"><i class="glyphicon glyphicon-edit"></i>Atualizar</a>
                                    </td>
                                    <td align="center">
                                        <a href="visualizarOutdoors.php?op=remover&id=<?php echo $outdoor->getId() ?>"><i class="glyphicon glyphicon-remove-circle"></i>Remover</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                </div>
<?php
include_once 'footer.php';
?>