<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Comprovativos
 *
 * @author Ngola
 */
class Comprovativos {
    private $id;
    private $comprovativo;
    private $fk_user;
    
    function __construct($id, $comprovativo, $fk_user) {
        $this->id = $id;
        $this->comprovativo = $comprovativo;
        $this->fk_user = $fk_user;
    }

    function getId() {
        return $this->id;
    }

    function getComprovativo() {
        return $this->comprovativo;
    }

    function getFk_user() {
        return $this->fk_user;
    }

    function setId($id): void {
        $this->id = $id;
    }

    function setComprovativo($comprovativo): void {
        $this->comprovativo = $comprovativo;
    }

    function setFk_user($fk_user): void {
        $this->fk_user = $fk_user;
    }
}
