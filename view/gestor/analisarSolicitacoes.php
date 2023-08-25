<?php
session_start();

if (!isset($_SESSION['user'])) {
    header('location: ../../index.php');
}

include_once 'header.php';
include_once '/xampp/htdocs/PF_20200446/repositories/AluguerRepository.php';
#include_once '/xampp/htdocs/PF_20200446/controllers/GestorController.php';
include_once '/xampp/htdocs/PF_20200446/model/Aluguer.php';

$solicitacoes = new AluguerRepository();
#$gestor = new GestorController();
#$gestor->analisarSolicitacaoAluguer();
?>
<!-- Recurments  section start-->
<div class="services_section">
    <div class="container">
        <h1 class="services_text">ANALISAR SOLICITAÇÕES</h1>
    </div>
    <br>
    <br>
</div>

<div class="">
    <div class="container">

        <div class="">
            <div class="row padding_top_0">
                <br>
                <br>
                <table class='table table-bordered table-responsive'>
                    <tr>
                        <th>Data Fim - Data Inicio</th>
                        <th>Imagem</th>
                        <th>Tipo de outdoor</th>
                        <th>Provincia</th>
                        <th>Municipio</th>
                        <th>Comuna</th>
                        <th>Estado</th>
                        <th>Preço</th>
                        <th colspan="3" align="center">Actions</th>
                    </tr>
                    <?php foreach ($solicitacoes->selecionarTodosJoin() as $solicitacao): ?>
                        <tr>
                            <?php if ($solicitacao->getFk_gestor() === $_SESSION['fkgestor']) { ?>
                                <?php if ($solicitacao->getEstado() !== 'disponivel') { ?>
                                    <td><?php echo $solicitacao->getDatafim() . ' - ' . $solicitacao->getDatainicio() ?></td>

                                    <?php if($solicitacao->getImagem() !== 'nenhuma'){ ?>
                                        <td><img alt="Outdoor sem imagem" src="/PF_20200446/ficheiros/imagens/<?php echo $solicitacao->getImagem()?>"></td>
                                    <?php }else{ ?>
                                        <td>nenhuma</td>
                                    <?php } ?>

                                    <td><?php echo $solicitacao->getTipodeoutdoor(); ?></td>
                                    <td><?php echo $solicitacao->getProvincia(); ?></td>
                                    <td><?php echo $solicitacao->getMunicipio(); ?></td>
                                    <td><?php echo $solicitacao->getComuna() ?></td>
                                    <td><?php echo $solicitacao->getEstado(); ?></td>
                                    <td><?php echo $solicitacao->getPreco() ?></td>

                                    <?php if ($solicitacao->getEstado() === 'por validar pagamento') { ?>
                                        <td align="center">
                                            <a target="blank" href="/PF_20200446/ficheiros/comprovativos/<?php echo $solicitacao->getCodAluguer() ?>.pdf"><button class="bt btn-lg btn-outline-info">ABRIR COMPROVATIVO</button></a>
                                        </td>

                                        <td align="center">
                                            <a href="aceitarRecusarSolicitacao.php?op=aceitar&id=<?php echo $solicitacao->getId() ?>"><button class="bt btn-lg btn-outline-success">ACEITAR</button></a>
                                        </td>
                                    <?php } else { ?>
                                        <td align="center">#
                                        </td>

                                        <td align="center">#
                                        </td>
                                    <?php } ?>    
                                    <td align="center">
                                        <a href="aceitarRecusarSolicitacao.php?op=recusar&id=<?php echo $solicitacao->getId() ?>"><button class="bt btn-lg btn-outline-danger">RECUSAR</button></a>
                                    </td>
                                <?php } ?>
                            <?php } ?>
                        </tr>

                    <?php endforeach; ?>
                </table>
            </div>
        </div>
        <?php
        include_once 'footer.php';
        ?>