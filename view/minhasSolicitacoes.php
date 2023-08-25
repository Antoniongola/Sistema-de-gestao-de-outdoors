<?php
session_start();

if (!isset($_SESSION['user'])) {
    header('location: ../../index.php');
}

include_once 'header.php';
include_once '/xampp/htdocs/PF_20200446/repositories/AluguerRepository.php';
include_once '/xampp/htdocs/PF_20200446/model/Aluguer.php';
$solicitacoes = new AluguerRepository();

if (isset($_GET['id'])) {
    $_SESSION['idsolicitacao'] = $_GET['id'];
    header('location: carregarComprovativo.php');
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
                        <th>Data Fim - Data Inicio</th>
                        <th>Imagem</th>
                        <th>Tipo de outdoor</th>
                        <th>Provincia</th>
                        <th>Municipio</th>
                        <th>Comuna</th>
                        <th>Estado</th>
                        <th>Preço</th>
                        <th>Gestor Da Solicitação</th>
                        <th align="center">Actions</th>
                    </tr>
                    <?php foreach ($solicitacoes->selecionarTodosJoin() as $solicitacao): ?>
                        <tr>
                            <?php if ($solicitacao->getFk_cliente() === $_SESSION['idcliente']) { ?>
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

                                <?php if ($solicitacao->getEstado() === 'disponivel') { ?>
                                    <td><?php echo 'Solicitação recusada'; ?></td>
                                <?php } else { ?>  
                                    <td><?php echo $solicitacao->getEstado(); ?></td>
                                <?php } ?>

                                <td><?php echo $solicitacao->getPreco() ?></td>
                                <td><?php echo $solicitacao->getNomeGestor(); ?></td>

                                <?php if ($solicitacao->getEstado() === 'disponivel') { ?>
                                    <td align="center">#</td>
                                <?php } else if ($solicitacao->getEstado() === 'A aguardar pagamento') { ?>  
                                    <td align="center">
                                        <a href="minhasSolicitacoes.php?op=comprovativo&id=<?php echo $solicitacao->getCodAluguer(); ?>" <?php $_SESSION['outdoor'] = $solicitacao->getFk_outdoor() ?>><i class="glyphicon glyphicon-edit"></i>ENVIAR COMPROVATIVO</a>
                                    </td>
                                <?php } else { ?>
                                    <td align="center">#</td>
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