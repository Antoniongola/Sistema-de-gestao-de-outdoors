<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserRepository
 *
 * @author Ngola
 */
include_once '/xampp/htdocs/PF_20200446/Dbconfig/DbConnection.php';
include_once '/xampp/htdocs/PF_20200446/model/User.php';

class UserRepository {
    private $db;
    
    function __construct() {
        $this->db = DbConnection::getInstance();
    }

    public function insert($nome, $provincia, $municipio, $comuna, $nacionalidade, $morada, $email, $telemovel, $username, $password, $perfil, $estadoConta) {
        try {
            $stmt = $this->db->prepare("INSERT INTO users (nome, provincia, municipio, comuna, nacionalidade, morada, email, telemovel, username, password, perfil, estadoConta) VALUES(:nome, :provincia, :municipio, :comuna, :nacionalidade, :morada, :email, :telemovel, :username, :password, :perfil, :estadoConta)");
            $stmt->bindparam(":nome", $nome);
            $stmt->bindparam(":username", $username);
            $stmt->bindparam(":email", $email);
            $stmt->bindparam(":password", $password);
            $stmt->bindparam(":provincia", $provincia);
            $stmt->bindparam(":municipio", $municipio);
            $stmt->bindparam(":comuna", $comuna);
            $stmt->bindparam(":nacionalidade", $nacionalidade);
            $stmt->bindparam(":morada", $morada);
            $stmt->bindparam(":telemovel", $telemovel);
            $stmt->bindparam(":perfil", $perfil);
            $stmt->bindparam(":estadoConta", $estadoConta);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    
    public function selectAll() {
        $users = Array();
        $stmt = $this->db->prepare("SELECT * FROM users");
        $stmt->execute();
        $result = $stmt->fetchAll();

        foreach ($result as $user) {
            $users[] = new User($user['id'], $user['nome'], $user['username'], $user['email'], $user['password'], $user['provincia'], $user['municipio'], $user['comuna'], $user['nacionalidade'], $user['morada'], $user['telemovel'], $user['perfil'], $user['estadoConta']);
        }
        return $users;
    }
    
    public function selectByEmail($email) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->execute(['email' => $email]);
        $user = $stmt->fetch();
        $res = new User($user['id'], $user['nome'], $user['username'], $user['email'], $user['password'], $user['provincia'], $user['municipio'], $user['comuna'], $user['nacionalidade'], $user['morada'], $user['telemovel'], $user['perfil'], $user['estadoConta']);
        return $res;
    }
    
    public function updateByID($id, $nome, $provincia, $municipio, $comuna, $nacionalidade, $morada, $email, $telemovel, $username, $password, $perfil, $estadoConta) {
        try {
            $stmt = $this->db->prepare("UPDATE users SET nome=:nome, username =:username, email =:email, password=:password, provincia=:provincia, municipio=:municipio, comuna=:comuna, nacionalidade=:nacionalidade, morada=:morada, telemovel=:telemovel, perfil=:perfil, estadoConta=:estadoConta WHERE id=:id");
            $stmt->bindparam(":id", $id);
            $stmt->bindparam(":nome", $nome);
            $stmt->bindparam(":username", $username);
            $stmt->bindparam(":email", $email);
            $stmt->bindparam(":nacionalidade", $nacionalidade);
            $stmt->bindparam(":password", $password);
            $stmt->bindparam(":provincia", $provincia);
            $stmt->bindparam(":municipio", $municipio);
            $stmt->bindparam(":comuna", $comuna);
            $stmt->bindparam(":morada", $morada);
            $stmt->bindparam(":telemovel", $telemovel);
            $stmt->bindparam(":perfil", $perfil);
            $stmt->bindparam(":estadoConta", $estadoConta);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    
    public function delete($id) {
        try {
            $stmt = $this->db->prepare("DELETE FROM users WHERE id=:id");
            $stmt->bindparam(":id", $id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
}
