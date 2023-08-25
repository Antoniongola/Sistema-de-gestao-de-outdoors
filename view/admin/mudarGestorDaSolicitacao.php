<?php
session_start();

if(!isset($_SESSION['user'])){
    header('location: ../../index.php');
}

include_once 'header.php';
include_once '/xampp/htdocs/PF_20200446/repositories/AluguerRepository.php';
include_once '/xampp/htdocs/PF_20200446/controllers/AdminController.php';
include_once '/xampp/htdocs/PF_20200446/model/Aluguer.php';
$solicitacoes = new AluguerRepository();
$controlador = new AdminController();

if (isset($_GET['id'])) {
     $_SESSION['idaluguer'] = $_GET['id'];
    header('location: mudarGestorForm.php');
}
?>
<!-- Recurments  section start-->
    <div class="services_section">
        <div class="container">
            <h1 class="services_text">VISUALIZAR SOLICITAÇÕES</h1>
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
                                <th>Id Aluguer</th>
                                <th>Data Fim - Data Inicio</th>
                                <th>Imagem</th>
                                <th>Tipo de outdoor</th>
                                <th>Provincia</th>
                                <th>Municipio</th>
                                <th>Comuna</th>
                                <th>Estado</th>
                                <th>Preço</th>
                                <th>Gestor Da Solicitação</th>
                                <th>Id gestor</th>
                                <th align="center">Actions</th>
                            </tr>
                            <?php foreach ($solicitacoes->selecionarTodosJoin() as $solicitacao): ?>
                                <?php if($solicitacao->getEstado() !== 'disponivel'){ ?>
                                    <tr>
                                        <td><?php echo $solicitacao->getCodAluguer() ?></td>
                                        <td><?php echo $solicitacao->getDatafim().' - '. $solicitacao->getDatainicio() ?></td>
                                        <td><?php echo $solicitacao->getImagem() ?></td>
                                        <td><?php echo $solicitacao->getTipodeoutdoor(); ?></td>
                                        <td><?php echo $solicitacao->getProvincia(); ?></td>
                                        <td><?php echo $solicitacao->getMunicipio(); ?></td>
                                        <td><?php echo $solicitacao->getComuna() ?></td>
                                        <td><?php echo $solicitacao->getEstado(); ?></td>
                                        <td><?php echo $solicitacao->getPreco() ?></td>
                                        <td><?php echo $solicitacao->getNomeGestor(); ?></td>
                                        <td><?php echo $solicitacao->getFk_gestor(); ?></td>
                                        <td align="center">
                                            <a href="mudarGestorDaSolicitacao.php?op=mudarGestor&id=<?php echo $solicitacao->getCodAluguer(); ?>"><button class="bt btn-lg btn-outline-primary">MUDAR GESTOR</button></a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            <?php endforeach; ?>
                            <tr>
                                <td colspan="11" align="center">
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