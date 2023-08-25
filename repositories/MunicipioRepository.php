<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MunicipioRepository
 *
 * @author Ngola
 */
include_once '/xampp/htdocs/PF_20200446/Dbconfig/DbConnection.php';
    $db = DbConnection::getInstance();
    if(isset($_GET['provinciaNome'])){
        $provincia = $_GET['provinciaNome'];
        try{
            $stmt = $db->prepare("SELECT id FROM provincias WHERE nome=:provincia");
            $stmt->bindparam(":provincia", $provincia);
            $stmt->execute();
            $idProvincia = $stmt->fetch()['id'];
            
            $stmt2 = $db->prepare("SELECT * FROM municipios WHERE fk_provincia=:provincia");
            $stmt2->bindparam(":provincia", $idProvincia);
            $stmt2->execute();

            $municipios = $stmt2->fetchAll();
            header('content-type: application/json');
            echo json_encode($municipios);
        } catch (PDOException $ex) {
            header('content-type: application/json');
            echo json_encode([]);
        }
    }