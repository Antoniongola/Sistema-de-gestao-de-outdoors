<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Outdoor
 *
 * @author Ngola
 */
class Outdoor {
    private $id;
    private $preco;
    private $tipodeoutdoor;
    private $provincia;
    private $municipio;
    private $comuna;
    private $estado;

    function getEstado() {
        return $this->estado;
    }

    function setEstado($estado): void {
        $this->estado = $estado;
    }

    function __construct($id, $preco, $tipodeoutdoor, $provincia, $municipio, $comuna, $estado) {
        $this->id = $id;
        $this->preco = $preco;
        $this->tipodeoutdoor = $tipodeoutdoor;
        $this->provincia = $provincia;
        $this->municipio = $municipio;
        $this->comuna = $comuna;
        $this->estado = $estado;
    }

    function getId() {
        return $this->id;
    }

    function getPreco() {
        return $this->preco;
    }

    function getTipodeoutdoor() {
        return $this->tipodeoutdoor;
    }

    function getProvincia() {
        return $this->provincia;
    }

    function getMunicipio() {
        return $this->municipio;
    }

    function getComuna() {
        return $this->comuna;
    }

    function setId($id): void {
        $this->id = $id;
    }

    function setPreco($preco): void {
        $this->preco = $preco;
    }

    function setTipodeoutdoor($tipodeoutdoor): void {
        $this->tipodeoutdoor = $tipodeoutdoor;
    }

    function setProvincia($provincia): void {
        $this->provincia = $provincia;
    }

    function setMunicipio($municipio): void {
        $this->municipio = $municipio;
    }

    function setComuna($comuna): void {
        $this->comuna = $comuna;
    }
}
