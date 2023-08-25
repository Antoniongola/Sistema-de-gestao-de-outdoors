<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ProvinciaRepository
 *
 * @author Ngola
 */
include_once '/xampp/htdocs/PF_20200446/Dbconfig/DbConnection.php';
include_once '/xampp/htdocs/PF_20200446/model/Provincia.php';

class ProvinciaRepository {
    private $db;
    
    function __construct() {
        $this->db = DbConnection::getInstance();
    }

    public function selectAll() {
        $stmt = $this->db->prepare("SELECT * FROM provincias");
        $stmt->execute();

        while($result = $stmt->fetch()){
            echo "<option value='".$result['nome']."'>".$result['nome']."</option>";
        }
    }
}