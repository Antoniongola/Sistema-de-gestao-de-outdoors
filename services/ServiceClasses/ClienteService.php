<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ClienteService
 *
 * @author Ngola
 */
require_once '/xampp/htdocs/PF_20200446/repositories/ClienteRepository.php';
class ClienteService {
    private $cliente;
    private $clienteRepository = NULL;
    public function __construct() {
        $this->clienteRepository = new ClienteRepository();
    }
    public function alterarDados($tipodecliente, $atividadedaempresa, $fk_users) {
        try {
            $res = $this->clienteRepository->updateById($tipodecliente, $atividadedaempresa, $fk_users);
            return $res;
        } catch (PDOException $e) {
        }
    }
    
    public function inserirCliente($tipodecliente, $atividadedaempresa, $fk_users) {
        try {
            $res = $this->clienteRepository->insert($tipodecliente, $atividadedaempresa, $fk_users);
            return $res;
        } catch (PDOException $e) {
        }
    }
    
    public function apresentarTodosClientes() {
        try {
            $res = $this->clienteRepository->selectAll();
            return $res;
        } catch (PDOException $e) {
        }
    }
    
    public function apresentarCliente($id) {
        try {
            $res = $this->clienteRepository->selectById($id);
            return $res;
        } catch (PDOException $e) {
        }
    }
    
    public function apagarCliente($id) {
        try {
            $res = $this->clienteRepository->delete($id);
            return $res;
        } catch (PDOException $e) {
        }
    }
}
