<?php
include_once '/xampp/htdocs/PF_20200446/repositories/ClienteRepository.php';
include_once '/xampp/htdocs/PF_20200446/services/serviceclasses/gestorservice.php';
include_once '/xampp/htdocs/PF_20200446/repositories/OutdoorRepository.php';
include_once '/xampp/htdocs/PF_20200446/repositories/AluguerRepository.php';
include_once '/xampp/htdocs/PF_20200446/repositories/GestorRepository.php';

#$service = new GestorService();
#var_dump($service->gestorMenosSolicitado());

$gestor = new GestorRepository();
$gestor->diminuirSolicitacao(1);