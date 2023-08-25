<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of GestorController
 *
 * @author Ngola
 */
include_once '/xampp/htdocs/PF_20200446/services/ServiceClasses/GestorService.php';
include_once '/xampp/htdocs/PF_20200446/controllers/OutdoorController.php';
include_once '/xampp/htdocs/PF_20200446/controllers/AluguerController.php';
include_once '/xampp/htdocs/PF_20200446/model/User.php';
include_once '/xampp/htdocs/PF_20200446/model/Gestor.php';
include_once '/xampp/htdocs/PF_20200446/model/Outdoor.php';
#vou adicionar o model do aluguer

class GestorController {
    private $servico = NULL;

    function __construct() {
        $this->servico = new GestorService();
    }
    
    public function gerirInformacao(){
        $filterOp = filter_input(INPUT_GET, 'op');
        $filterId = filter_input(INPUT_GET, 'id');
        $op = isset($filterOp) ? $filterOp : NULL;
        $id = isset($filterId) ? $filterId : NULL;
        try {
            if($op === 'atualizar' && $id !== NULL){
                $_SESSION['outdoor'] = $id;
                header('location: outdoorUpdateForm.php');
            }else if($op === 'remover'){
                $outdoor = new OutdoorController();
                $outdoor->removerOutdoorById($id);
                header('location: visualizarOutdoors.php');
            }else {
                echo '"<script> alert("Page not found, Page for operation " '. $op . '" was not found!");</script>';
            }
        } catch (Exception $e) {
            $this->showError("Erro", $e->getMessage());
        }
    }
    
    public function analisarSolicitacaoAluguer() {
        $aluguer = new AluguerController();
        $filterId = filter_input(INPUT_GET, 'id');
        $filterOp = filter_input(INPUT_GET, 'op');
        $op = isset($filterOp) ? $filterOp : NULL;
        $id = isset($filterId) ? $filterId : NULL;
        
        $outdoorController = new OutdoorController();
        $outdoor = $outdoorController->recuperarOutdoor($id);
        
        try {
            if($op === 'aceitar' && $id !== NULL){
                $outdoorController->atualizarOutdoor($outdoor->getId(), 'ocupado', $outdoor->getTipodeoutdoor(), $outdoor->getPreco(), $outdoor->getComuna(), $outdoor->getMunicipio(), $outdoor->getProvincia());
                $this->servico->diminuirSolicitacoes($_SESSION['fkgestor']);
                #$aluguer->apagarAluguerPeloFkOutdoor($outdoor->getId());
                header('location: analisarSolicitacoes.php');
            }else if($op === 'recusar' && $id !== NULL){
                $outdoorController->atualizarOutdoor($outdoor->getId(), 'disponivel', $outdoor->getTipodeoutdoor(), $outdoor->getPreco(), $outdoor->getComuna(), $outdoor->getMunicipio(), $outdoor->getProvincia());
                $this->servico->diminuirSolicitacoes($_SESSION['fkgestor']);
                #$aluguer->apagarAluguerPeloFkOutdoor($outdoor->getId());
                header('location: analisarSolicitacoes.php');
            }else {
                echo '"<script> alert("Page not found, Page for operation " '. $op . '" was not found!");</script>';
            }
        } catch (Exception $e) {
            $this->showError("Erro", $e->getMessage());
        }
    }
    
    public function apresentarGestores(){
       return $this->servico->apresentarTodosGestores();
    }
    
    public function apresentarGestor ($id){
        foreach ($this->servico->apresentarTodosGestores() as $gestor){
            if($gestor->getFkuser() === $id){
                return new Gestor($gestor->getId(), $gestor->getSolicitacoes(), $gestor->getFkuser(), $gestor->getNome(), $gestor->getUsername(), $gestor->getEmail(), $gestor->getPassword(), $gestor->getProvincia(), $gestor->getMunicipio(), $gestor->getComuna(),
                        $gestor->getNacionalidade(), $gestor->getMorada(), $gestor->getTelemovel(), $gestor->getPerfil(), $gestor->getEstadoConta());
            }
        }
    }
    
    public function gestorMenosSolicitado(){
        return $this->servico->gestorMenosSolicitado();
    }
    
    public function aumentarSolicitacoes($id){
        $this->servico->aumentarSolicitacoes($id);
    }
    
    public function diminuirSolicitacoes($id){
        $this->servico->diminuirSolicitacoes($id);
    }
    
}
