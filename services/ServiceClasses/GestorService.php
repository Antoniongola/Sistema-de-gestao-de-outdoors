<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of GestorService
 *
 * @author Ngola
 */

require_once '/xampp/htdocs/PF_20200446/repositories/GestorRepository.php';
include_once '/xampp/htdocs/PF_20200446/services/IService/IGestor.php';
class GestorService implements IGestor{
    //put your code here
    private $gestorRepository = NULL;
    
    public function __construct() {
        $this->gestorRepository = new GestorRepository();
    }
    
    public function alterarDados($id, $solicitacoes) {
        try {
            $res = $this->gestorRepository->updateByID($id, $solicitacoes);
            return $res;
        } catch (PDOException $e) {
        }
    }
    
    public function inserirGestor($solicitacoes, $fk_user) {
        try {
            $res = $this->gestorRepository->insert($solicitacoes, $fk_user);
            return $res;
        } catch (PDOException $e) {
        }
    }
    
    public function apresentarTodosGestores() {
        try {
            $res = $this->gestorRepository->selectAll();
            return $res;
        } catch (PDOException $e) {
        }
    }
    
    public function apresentarGestor($fkuser) {
        try {
            $res = $this->gestorRepository->selectByFk($fkuser);
            return $res;
        } catch (PDOException $e) {
        }
    }
    
    public function apagarGestor($fkuser) {
        try {
            $res = $this->gestorRepository->delete($fkuser);
            return $res;
        } catch (PDOException $e) {
        }
    }
    
    public function gestorMenosSolicitado(){
        $gestores = $this->apresentarTodosGestores();
        $menor = 9999999999999999999999999999999999;
        foreach($gestores as $gestor){
            if($menor > $gestor->getSolicitacoes()){
                $menor = $gestor->getSolicitacoes();
                $id = $gestor->getId();
            }
        }
        return $id;
    }
    
    public function aumentarSolicitacoes($id){
        $this->gestorRepository->aumentarSolicitacao($id);
    }
    
    public function diminuirSolicitacoes($id){
        $this->gestorRepository->diminuirSolicitacao($id);
    }
    
    public function analisarSolicitacaoAluguer() {
        
    }

    public function gerirInformacao() {
    }

}
