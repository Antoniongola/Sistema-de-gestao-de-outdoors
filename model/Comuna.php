<?php

class Comuna {
    private $nome;
    private $id;
    private $fk_municipio;
    
    function __construct($nome, $id, $fk_municipio) {
        $this->nome = $nome;
        $this->id = $id;
        $this->fk_municipio = $fk_municipio;
    }

    function getNome() {
        return $this->nome;
    }

    function getId() {
        return $this->id;
    }

    function getFk_municipio() {
        return $this->fk_municipio;
    }
    
}
