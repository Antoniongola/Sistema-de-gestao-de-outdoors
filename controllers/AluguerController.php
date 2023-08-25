<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AluguerController
 *
 * @author Ngola
 */
include_once '/xampp/htdocs/PF_20200446/services/ServiceClasses/AluguerService.php';
include_once '/xampp/htdocs/PF_20200446/model/Aluguer.php';
#testando tudo aqui em baixo
#include_once '/xampp/htdocs/PF_20200446/controllers/gestorcontroller.php';
#include_once '/xampp/htdocs/PF_20200446/controllers/outdoorcontroller.php';
#include_once '/xampp/htdocs/PF_20200446/repositories/outdoorrepository.php';



class AluguerController {
    private $service = NULL;
    
    function __construct() {
        $this->service = new AluguerService();
    }
    
    public function inserirAluguer(){
        $gestor = new GestorController();
        $userS = new UserService();
        $fk_gestor = $gestor->gestorMenosSolicitado();
        $outdoor = new OutdoorController();
        $outdoorRES = $outdoor->recuperarOutdoor($_SESSION['outdoor']);

        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            $ficheiro = filter_input(INPUT_POST, 'ficheiro');
            #$tipodeoutdoor = filter_input(INPUT_POST, 'tipodeoutdoor'); 
            $datainicio = filter_input(INPUT_POST, 'datainicio');
            $datafim = filter_input(INPUT_POST, 'datafim');
            $imagem = filter_input(INPUT_POST, 'imagem');
            $calcula = filter_input(INPUT_POST, 'calculaPreco');
            $preco = filter_input(INPUT_POST, 'precoInicial');
            $ficheiro = filter_input(INPUT_POST, 'ficheiro');

            #$teste = new AluguerRepository();
            //imprimindo o ficheiro escolhido pelo user
            echo "<pre>";
                print_r($_FILES);
            echo "</pre>";
            //definindo as propriedades
            #$clien = new ClienteService();
            $file = $_FILES['ficheiro'];
            $file_name = $file['name'];
            $tmp_name = $file['tmp_name'];
            #$User = $userS->apresentarUser($_SESSION['user']);

            if($imagem === 'nao'){
                $this->service->alugarOutdoor($datainicio, $datafim, 'nenhuma', $_SESSION['idcliente'], $_SESSION['outdoor'], $fk_gestor, $preco);
                $outdoor->atualizarOutdoor($_SESSION['outdoor'], 'A aguardar pagamento', $outdoorRES->getTipodeoutdoor(), $outdoorRES->getPreco(), $outdoorRES->getComuna(), $outdoorRES->getMunicipio(), $outdoorRES->getProvincia());
                $gestor->aumentarSolicitacoes($fk_gestor);
                #echo "<script> alert('Aluguer feito com sucesso!!'); </script>";
            }else{
                
                $path = $_SERVER['DOCUMENT_ROOT'].'/PF_20200446/ficheiros/imagens/';
                move_uploaded_file($tmp_name, $path.$file_name);
                $this->service->alugarOutdoor($datainicio, $datafim, $file_name, $_SESSION['idcliente'], $_SESSION['outdoor'], $fk_gestor, $preco);
                $outdoor->atualizarOutdoor($_SESSION['outdoor'], 'A aguardar pagamento', $outdoorRES->getTipodeoutdoor(), $outdoorRES->getPreco(), $outdoorRES->getComuna(), $outdoorRES->getMunicipio(), $outdoorRES->getProvincia());
                $gestor->aumentarSolicitacoes($fk_gestor);
                #echo "<script> alert('Aluguer feito com sucesso!!'); </script>";
            }
            #header('location: index.php');
        }
    }

    public function apagarAluguerPeloId($id){
        $this->service->apagarPeloId($id);
    }
    
    public function apagarAluguerPeloFkOutdoor($fk_outdoor){
        $this->service->apagarPelaFkOutdoor($fk_outdoor);
    }
    
}
