<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ComunaRepository
 *
 * @author Ngola
 */
include_once '/xampp/htdocs/PF_20200446/Dbconfig/DbConnection.php';
    
    $db = DbConnection::getInstance();
    if(isset($_GET['municipioNome'])){
        $municipio = $_GET['municipioNome'];
        try{
            $stmt = $db->prepare("SELECT id FROM municipios WHERE nome=:municipio");
            $stmt->bindparam(":municipio", $municipio);
            $stmt->execute();
            $idMunicipio = $stmt->fetch()['id'];
            
            $stmt2 = $db->prepare("SELECT * FROM comunas WHERE fk_municipio=:municipio");
            $stmt2->bindparam(":municipio", $idMunicipio);
            $stmt2->execute();

            $comunas = $stmt2->fetchAll();
            header('content-type: application/json');
            echo json_encode($comunas);
            
        } catch (PDOException $ex) {
            header('content-type: application/json');
            echo json_encode([]);
        }
    }