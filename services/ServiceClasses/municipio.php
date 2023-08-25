<?php

include_once '/xampp/htdocs/PF_20200446/repositories/MunicipioRepository.php';

$muni = new MunicipioRepository();
$id = $_GET['provincia'];

foreach($muni->selectAll($id) as $municipio){
    echo $municipio->getId() . $municipio->getNome();
}