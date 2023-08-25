<?php
include_once 'header.php';
session_start();
session_destroy();
include_once '/xampp/htdocs/PF_20200446/repositories/OutdoorRepository.php';
include_once '/xampp/htdocs/PF_20200446/repositories/UserRepository.php';
include_once '/xampp/htdocs/PF_20200446/model/Outdoor.php';
$outdoor = new OutdoorRepository();
$outdoors = $outdoor->selectAll();
?>
<!-- banner section end-->
<!-- marketing section start

<div class="marketing_section layout_padding">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="job_section">
                    <h1 class="jobs_text">Lampoles</h1>
                    <p class="dummy_text">Caixa de descrições malucas esgotou, não tenho descrição para este tipo de outdoors, adquira só. Vais gostar! </p>
                    <div class="apply_bt"><a href="userForm.php">Alugar</a></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="image_1 padding_0"><img src="content/bootstrap/images/lampoles.jpg"></div>
            </div>
        </div>
    </div>
</div>

<div class="marketing_section layout_padding">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="image_1 padding_0"><img src="content/bootstrap/images/img-2.png"></div>
            </div>
            <div class="col-md-6">
                <div class="job_section_2">
                    <h1 class="jobs_text">Painéis</h1>
                    <p class="dummy_text">Painéis podem ser limunosos e não luminosos. Os painéis são de extrema populadoridade, quantas vezes viu um anúncio de desporto, novela e festas neste tipo de outdoors? Muitas! Este é o tipo de outdoor com maior notoriedade.</p>
                    <div class="apply_bt"><a href="userForm.php">Alugar</a></div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="marketing_section layout_padding">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="job_section">
                    <h1 class="jobs_text">Placas indicativas</h1>
                    <p class="dummy_text">Placas indicativas são muito importantes, estas mesmas placas nos providenciam valiosas importantes sobre o caminho que devemos ir para chegar no ponto desejado. </p>
                    <div class="apply_bt"><a href="userForm.php">Alugar</a></div>
                </div>
            </div>
            <div class="col-md-6 padding_0">
                <div class="image_1"><img src="content/bootstrap/images/placas indicativas.jpg"></div>
            </div>
        </div>
    </div>
</div>
-->
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
                                    <a href="userForm.php"><i class="glyphicon glyphicon-edit"></i>Alugar</a>
                                </td>
                            </tr>
                        <?php } ?>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="/xampp/htdocs/PF_20200446/scripts/custom/myscript.js"></script>

<?php
include_once'footer.php';
?>