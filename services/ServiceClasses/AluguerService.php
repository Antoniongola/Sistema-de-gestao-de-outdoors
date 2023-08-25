<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AluguerService
 *
 * @author Ngola
 */
require_once '/xampp/htdocs/PF_20200446/repositories/AluguerRepository.php';
#include_once '/xampp/htdocs/PF_20200446/repositories/GestorRepository.php';

class AluguerService {
    private $aluguerRepository = NULL;
    #private $gestorRepository = NULL;
    
    public function __construct() {
        $this->aluguerRepository = new AluguerRepository();
        #$this->gestorRepository = new GestorRepository();
    }
    
    public function alugarOutdoor($datainicio, $datafim, $imagem, $fk_cliente, $fk_outdoor, $fk_gestor, $preco){
        try {
            $res = $this->aluguerRepository->inserir($datainicio, $datafim, $imagem, $fk_cliente, $fk_outdoor, $fk_gestor, $preco);
            return $res;
        } catch (PDOException $e) {
        }
    }
    
    public function alterarDados($id, $novogestor) {
        try {
            $res = $this->aluguerRepository->trocarGestorDaSolicitacao($id, $novogestor);
            return $res;
        } catch (PDOException $e) {
        }
    }
    
    public function apagarPeloId($id) {
        try {
            $res = $this->aluguerRepository->apagarPeloId($id);
            return $res;
        } catch (PDOException $e) {
        }
    }
    
    public function apagarPelaFkOutdoor($fk_outdoor) {
        try {
            $res = $this->aluguerRepository->apagarPelaFkOutdoor($fk_outdoor);
            return $res;
        } catch (PDOException $e) {
        }
    }
    
    public function selecionarTodosAlugueis(){
        try{
            $res = $this->aluguerRepository->selecionarTodosJoin();
            return $res;
        } catch (PDOException $e) {

        }
    }
}
