<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ClienteRepository
 *
 * @author Ngola
 */
include_once '/xampp/htdocs/PF_20200446/Dbconfig/DbConnection.php';
include_once '/xampp/htdocs/PF_20200446/model/Cliente.php';
class ClienteRepository {
    private $db;
    
    function __construct() {
        $this->db = DbConnection::getInstance();
    }

    public function insert($tipodecliente, $atividadedaempresa, $fk_users) {
        try {
            $stmt = $this->db->prepare("INSERT INTO clientes (tipodecliente, atividadedaempresa, fk_users) VALUES(:tipodecliente, :atividadedaempresa, :fk_users)");
            $stmt->bindparam(":tipodecliente", $tipodecliente);
            $stmt->bindparam(":atividadedaempresa", $atividadedaempresa);
            $stmt->bindparam(":fk_users", $fk_users);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    
    public function selectAll() {
        $clientes = Array();
        $stmt = $this->db->prepare("SELECT * FROM clientes");
        $stmt->execute();
        $result = $stmt->fetchAll();

        foreach ($result as $cliente) {
            $clientes[] = new Cliente($cliente['id'], $cliente['fkUsers'], $cliente['tipodecliente'], $cliente['atividadedaempresa']);
        }
        return $clientes;
    }
    
    public function selectById($id) {
        $stmt = $this->db->prepare("SELECT * FROM clientes WHERE fk_users = :id");
        $stmt->execute(['id' => $id]);
        $cliente = $stmt->fetch();
            return new Cliente($cliente['id'], $cliente['fk_users'], $cliente['tipodecliente'], $cliente['atividadedaempresa']);
    }
    
    public function updateById($tipodecliente, $atividadedaempresa, $fk_users) {
        try {
            $stmt = $this->db->prepare("UPDATE clientes SET tipodecliente=:tipodecliente, atividadedaempresa=:atividadedaempresa WHERE fk_users=:fk_users");
            $stmt->bindparam(":tipodecliente", $tipodecliente);
            $stmt->bindparam(":atividadedaempresa", $atividadedaempresa);
            $stmt->bindparam(":fk_users", $fk_users);
            
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    
    public function delete($id) {
        try {
            $stmt = $this->db->prepare("DELETE FROM clientes WHERE id=:id");
            $stmt->bindparam(":id", $id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
}
