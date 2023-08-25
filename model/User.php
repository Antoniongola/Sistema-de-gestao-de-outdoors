<?php

require_once 'Perfil.php';

class User extends Perfil{
    //put your code here
    private $provincia;
    private $municipio;
    private $comuna;
    private $nacionalidade;
    private $morada;
    private $email;
    private $telemovel;
    private $perfil;
    private $estadoConta;
    
    function __construct($id, $nome, $username, $email, $password, $provincia, $municipio, $comuna, $nacionalidade, $morada, $telemovel, $perfil, $estadoConta) {
        parent::__construct($id, $nome, $username, $email, $password);
        $this->provincia = $provincia;
        $this->municipio = $municipio;
        $this->comuna = $comuna;
        $this->nacionalidade = $nacionalidade;
        $this->morada = $morada;
        $this->email = $email;
        $this->telemovel = $telemovel;
        $this->perfil = $perfil;
        $this->estadoConta = $estadoConta;
    }

    function getEstadoConta() {
        return $this->estadoConta;
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

    function getNacionalidade() {
        return $this->nacionalidade;
    }

    function getMorada() {
        return $this->morada;
    }

    function getEmail() {
        return $this->email;
    }

    function getTelemovel() {
        return $this->telemovel;
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

    function setNacionalidade($nacionalidade): void {
        $this->nacionalidade = $nacionalidade;
    }

    function setMorada($morada): void {
        $this->morada = $morada;
    }

    function setEmail($email): void {
        $this->email = $email;
    }

    function setTelemovel($telemovel): void {
        $this->telemovel = $telemovel;
    }
    
    function getPerfil() {
        return $this->perfil;
    }

}
