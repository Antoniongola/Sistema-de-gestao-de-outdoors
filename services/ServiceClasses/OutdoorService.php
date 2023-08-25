<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of OutdoorService
 *
 * @author Ngola
 */

include_once '/xampp/htdocs/PF_20200446/repositories/OutdoorRepository.php';
include_once '/xampp/htdocs/PF_20200446/services/IService/IOutdoor.php';

class OutdoorService implements IOutdoor {
    private $outdoorRepository = NULL;
    public function __construct() {
        $this->outdoorRepository = new OutdoorRepository();
    }
    
    public function atualizarOutdoor($id, $estado, $tipodeoutdoor, $preco, $comuna, $municipio, $provincia) {
        try {
            $res = $this->outdoorRepository->updateByID($id, $provincia, $municipio, $comuna, $tipodeoutdoor, $estado, $preco);
            return $res;
        } catch (PDOException $e) {
        }
    }
    
    public function inserir($tipodeoutdoor, $preco, $estado, $provincia, $municipio, $comuna) {
        try {
            $res = $this->outdoorRepository->insert($estado, $preco, $tipodeoutdoor, $provincia, $municipio, $comuna);
            return $res;
        } catch (PDOException $e) {
        }
    }
    
    public function recuperarOutdoor($id){
        try {
            $res = $this->outdoorRepository->selectById($id);
            return $res;
        } catch (PDOException $e) {
        }
    }
    
    public function recuperartodosOutdoor(){
        try {
            $res = $this->outdoorRepository->selectAll();
            return $res;
        } catch (PDOException $e) {
        }
    }
    
    public function removerOutdoor($id) {
        try {
            $res = $this->outdoorRepository->delete($id);
            return $res;
        } catch (PDOException $e) {
        }
    }
}
