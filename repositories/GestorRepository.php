<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of GestorRepository
 *
 * @author Ngola
 */
require_once '/xampp/htdocs/PF_20200446/Dbconfig/DbConnection.php';
require_once '/xampp/htdocs/PF_20200446/model/Gestor.php';


class GestorRepository {
    private $db;
    
    function __construct() {
        $this->db = DbConnection::getInstance();
    }
    
    public function insert($solicitacoes, $fk_user) {
        try {
            $stmt = $this->db->prepare("INSERT INTO gestor (solicitacoes, fk_user) VALUES(:solicitacoes, :fk_user)");
            $stmt->bindparam(":solicitacoes", $solicitacoes);
            $stmt->bindparam(":fk_user", $fk_user);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    
    public function selectAll() {
        $gestores = Array();
        $stmt = $this->db->prepare("SELECT gestor.* , users.nome, users.provincia, users.municipio, users.comuna, users.nacionalidade, users.morada, users.email, users.telemovel, users.username, users.password, users.perfil, users.estadoConta FROM gestor INNER JOIN users WHERE gestor.fk_user = users.id");
        $stmt->execute();
        $result = $stmt->fetchAll();

        foreach ($result as $gestor) {
            $gestores[] = new Gestor($gestor['id'],$gestor['solicitacoes'], $gestor['fk_user'], $gestor['nome'], $gestor['username'], $gestor['email'], $gestor['password'], $gestor['provincia'], $gestor['municipio'], $gestor['comuna'], $gestor['nacionalidade'], $gestor['morada'], $gestor['telemovel'], $gestor['perfil'], $gestor['estadoConta']);
        }
        return $gestores;
    }
    
    public function gestorId($id){
        $stmt = $this->db->prepare("SELECT id FROM gestor WHERE fk_user =: id)");
        $stmt->bindparam(":id", $id);
        $stmt->execute();
        $gestor = $stmt->fetch();

        return $gestor;
    }
    
    public function selectByFk($fkuser) {
        $stmt = $this->db->prepare("SELECT gestor.* , users.nome, users.provincia, users.municipio, users.comuna, users.nacionalidade, users.morada, users.email, users.telemovel, users.username, users.password, users.perfil, users.estadoConta FROM gestor INNER JOIN users WHERE gestor.fk_user =: fkuser");
        $stmt->bindparam(":fkuser", $fkuser);
        $stmt->execute();
        $gestor = $stmt->fetchAll();

        return new Gestor($gestor['id'],$gestor['solicitacoes'], $gestor['fk_user'], $gestor['nome'], $gestor['username'], $gestor['email'], $gestor['password'], $gestor['provincia'], $gestor['municipio'], $gestor['comuna'], $gestor['nacionalidade'], $gestor['morada'], $gestor['telemovel'], $gestor['perfil'], $gestor['estadoConta']);
    }
    
    public function aumentarSolicitacao($id) {
        try {
            $stmt = $this->db->prepare("UPDATE gestor SET solicitacoes=(solicitacoes+1) WHERE id=:id");
            $stmt->bindparam(":id", $id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    
    public function diminuirSolicitacao($id) {
        try {
            $stmt = $this->db->prepare("UPDATE gestor SET solicitacoes=(solicitacoes-1) WHERE id=:id");
            $stmt->bindparam(":id", $id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    
    public function delete($id) {
        try {
            $stmt = $this->db->prepare("DELETE FROM gestor WHERE fk_user=:id");
            $stmt->bindparam(":id", $id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
}
