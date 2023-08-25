<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Perfil
 *
 * @author Ngola
 */
abstract class Perfil {
    private $id;
    private $nome;
    private $username;
    private $email;
    private $password;
    
    function __construct($id, $nome, $username, $email, $password) {
        $this->id = $id;
        $this->nome = $nome;
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
    }

    function getId() {
        return $this->id;
    }

    function getNome() {
        return $this->nome;
    }

    function getUsername() {
        return $this->username;
    }

    function getEmail() {
        return $this->email;
    }

    function getPassword() {
        return $this->password;
    }

    function setNome($nome): void {
        $this->nome = $nome;
    }

    function setUsername($username): void {
        $this->username = $username;
    }

    function setEmail($email): void {
        $this->email = $email;
    }

    function setPassword($password): void {
        $this->password = $password;
    }
}
