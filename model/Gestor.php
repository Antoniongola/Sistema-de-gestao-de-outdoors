<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Gestor
 *
 * @author Ngola
 */
require_once 'User.php';
class Gestor extends User{
    private $id;
    private $solicitacoes;
    private $fkuser;
    
    function __construct($id, $solicitacoes, $fkuser, $nome, $username, $email, $password, $provincia, $municipio, $comuna, $nacionalidade, $morada, $telemovel, $perfil, $estadoConta) {
        parent::__construct($fkuser, $nome, $username, $email, $password, $provincia, $municipio, $comuna, $nacionalidade, $morada, $telemovel, $perfil, $estadoConta);
        $this->id = $id;
        $this->solicitacoes = $solicitacoes;
        $this->fkuser = $fkuser;
    }
    
    function analisarSolicitacaoAluguer(){
        
    }
    
    function gerirInformacao(){
        
    }
    
    function getId() {
        return $this->id;
    }

    function getSolicitacoes() {
        return $this->solicitacoes;
    }

    function getFkuser() {
        return $this->fkuser;
    }

    function setSolicitacoes($solicitacoes): void {
        $this->solicitacoes = $solicitacoes;
    }

    function setFkuser($fkuser): void {
        $this->fkuser = $fkuser;
    }
}
