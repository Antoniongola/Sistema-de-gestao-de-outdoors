<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of NacionalidadeRepository
 *
 * @author Ngola
 */
class NacionalidadeRepository {
    private $db;
    
    function __construct() {
        $this->db = DbConnection::getInstance();
    }
    
    public function selectAll() {
        $nacionalidades = Array();
        $stmt = $this->db->prepare("SELECT * FROM nacionalidade");
        $stmt->execute();
        $result = $stmt->fetchAll();

        foreach ($result as $nacionalidade){
            $nacionalidades[] = new Nacionalidade($nacionalidade['id'], $nacionalidade['nome']);
        }
        
        return $nacionalidades;
    }
}
