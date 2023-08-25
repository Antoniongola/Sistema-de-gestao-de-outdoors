<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Municipio
 *
 * @author Ngola
 */
class Municipio {
    private $nome;
    private $id;
    private $fk_provincia;
    
    function __construct($nome, $id, $fk_provincia) {
        $this->nome = $nome;
        $this->id = $id;
        $this->fk_provincia = $fk_provincia;
    }
    
    function getNome() {
        return $this->nome;
    }

    function getId() {
        return $this->id;
    }

    function getFk_provincia() {
        return $this->fk_provincia;
    }


}
