<?php
session_start();
include_once 'header.php';
include_once '/xampp/htdocs/PF_20200446/repositories/OutdoorRepository.php';
include_once '/xampp/htdocs/PF_20200446/repositories/UserRepository.php';
include_once '/xampp/htdocs/PF_20200446/model/Outdoor.php';
$userOutdoors = new UserRepository();

$outdoor = new OutdoorRepository();
$outdoors = $outdoor->selectAll();
$filterOp = filter_input(INPUT_GET, 'op');
$filterId = filter_input(INPUT_GET, 'id');
$op = isset($filterOp) ? $filterOp : NULL;
$id = isset($filterId) ? $filterId : NULL;

$alugueis = array();

if ($op === 'alugar' && $id !== NULL) {
    $_SESSION['outdoor'] = $id;
    header('location: solicitarAluguerForm.php');
}
?>
<!-- Recurments  section start-->
<div class="services_section">
    <div class="container">
        <h1 class="services_text">VISUALIZAR OUTDOORS DISPONÍVEIS</h1>
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
                        <th align="center">Actions</th>
                    </tr>
                    <?php foreach ($outdoors as $outdoor): ?>
                        <?php if ($outdoor->getEstado() === 'disponivel') { ?>
                            <tr>
                                <td><?php echo $outdoor->getId() ?></td>
                                <td><?php echo $outdoor->getTipodeoutdoor(); ?></td>
                                <td><?php echo $outdoor->getProvincia() ?></td>
                                <td><?php echo $outdoor->getMunicipio(); ?></td>
                                <td><?php echo $outdoor->getComuna() ?></td>
                                <td><?php echo $outdoor->getEstado(); ?></td>
                                <td><?php echo $outdoor->getPreco(); ?></td>
                                <td align="center">
                                    <a href="visualizarOutdoors.php?op=alugar&id=<?php echo $outdoor->getId() ?>" <?php $_SESSION['preco'] = $outdoor->getPreco(); ?> ><i class="glyphicon glyphicon-edit"></i><button class="bt btn-lg btn-success">Selecionar</button></a>
                                </td>
                            </tr>
                        <?php } ?>
                    <?php endforeach; ?>
                    <tr>
                        <td colspan="8" align="center">
                            <div class="pagination-wrap">
                            </div>
                        </td>
                    </tr>
                    
                </table>
            </div>
            <button class="bt btn-lg btn-outline-success">Solicitar alugueis (<?php echo count($alugueis) ?>)</button>
            <button class="bt btn-lg btn-danger" onclick="<?php #$alugueis = array() ?>"><a href="visualizarOutdoors.php?esvaziar">Esvaziar o carrinho</a></button>
        </div>
    </div>
</div>

<?php
include_once 'footer.php';
?>