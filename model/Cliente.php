<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Cliente
 *
 * @author Ngola
 */
class Cliente {
     private $id;
     private $fkUsers;
     private $tipodecliente;
     private $atividadedaempresa;
     
     function __construct($id, $fkUsers, $tipodecliente, $atividadedaempresa) {
         $this->id = $id;
         $this->fkUsers = $fkUsers;
         $this->tipodecliente = $tipodecliente;
         $this->atividadedaempresa = $atividadedaempresa;
     }
     
     function getId() {
         return $this->id;
     }
     
     function getFkUsers() {
         return $this->fkUsers;
     }

     function getTipodecliente() {
         return $this->tipodecliente;
     }

     function getAtividadedaempresa() {
         return $this->atividadedaempresa;
     }
}
