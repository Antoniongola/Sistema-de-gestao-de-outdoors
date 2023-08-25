<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Aluguer
 *
 * @author Ngola
 */
include_once 'Outdoor.php';

class Aluguer extends Outdoor{
    private $codAluguer;
    private $datainicio;
    private $datafim;
    private $imagem;
    private $fk_cliente;
    private $fk_outdoor;
    private $fk_gestor;
    private $preco;
    private $nomeGestor;
    
    function __construct($id, $datainicio, $datafim, $imagem, $fk_cliente, $fk_outdoor, $fk_gestor, $preco, $tipodeoutdoor, $provincia, $municipio, $comuna, $estado, $nome) {
        parent::__construct($fk_outdoor, $preco, $tipodeoutdoor, $provincia, $municipio, $comuna, $estado);
        $this->codAluguer = $id;
        $this->datainicio = $datainicio;
        $this->datafim = $datafim;
        $this->imagem = $imagem;
        $this->fk_cliente = $fk_cliente;
        $this->fk_outdoor = $fk_outdoor;
        $this->fk_gestor = $fk_gestor;
        $this->preco = $preco;
        $this->nomeGestor = $nome;
    }
    
    function getCodAluguer() {
        return $this->codAluguer;
    }

    function setCodAluguer($codAluguer): void {
        $this->codAluguer = $codAluguer;
    }

    function getDatainicio() {
        return $this->datainicio;
    }

    function getDatafim() {
        return $this->datafim;
    }

    function getImagem() {
        return $this->imagem;
    }

    function getFk_cliente() {
        return $this->fk_cliente;
    }

    function getFk_gestor() {
        return $this->fk_gestor;
    }

    function setFk_gestor($fk_gestor): void {
        $this->fk_gestor = $fk_gestor;
    }

    function getFk_outdoor() {
        return $this->fk_outdoor;
    }

    
    function getNomeGestor() {
        return $this->nomeGestor;
    }

    function setNomeGestor($nomeGestor): void {
        $this->nomeGestor = $nomeGestor;
    }
    
        
    function getPreco() {
        return $this->preco;
    }
       
    function setDatainicio($datainicio): void {
        $this->datainicio = $datainicio;
    }

    function setDatafim($datafim): void {
        $this->datafim = $datafim;
    }

    function setImagem($imagem): void {
        $this->imagem = $imagem;
    }

    function setFk_cliente($fk_cliente): void {
        $this->fk_cliente = $fk_cliente;
    }

    function setFk_outdoor($fk_outdoor): void {
        $this->fk_outdoor = $fk_outdoor;
    }
}
