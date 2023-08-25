<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ComprovativoRepository
 *
 * @author Ngola
 */
require_once '/xampp/htdocs/PF_20200446/Dbconfig/DbConnection.php';
class ComprovativoRepository {
    private $db;
    
    function __construct() {
        $this->db = DbConnection::getInstance();
    }
    
    public function inserir($comprovativo, $fk_user){
        try {
            $stmt = $this->db->prepare("INSERT INTO comprovativos (comprovativo, fk_user) VALUES(:comprovativo, :fk_user)");
            $stmt->bindparam(":comprovativo", $comprovativo);
            $stmt->bindparam(":fk_user", $fk_user);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    
    
}
