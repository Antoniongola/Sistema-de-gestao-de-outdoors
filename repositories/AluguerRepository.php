<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Description of AluguerRepository
 *
 * @author Ngola
 */
include_once '/xampp/htdocs/PF_20200446/Dbconfig/DbConnection.php';
include_once '/xampp/htdocs/PF_20200446/model/Aluguer.php';
class AluguerRepository {
    private $db;
    
    function __construct() {
        $this->db = DbConnection::getInstance();
    }
    
    public function inserir($datainicio, $datafim, $imagem, $fk_cliente, $fk_outdoor, $fk_gestor, $preco){
        try {
            $stmt = $this->db->prepare("INSERT INTO aluguer (datainicio, datafim, imagem, fk_cliente, fk_outdoor, fk_gestor, preco) VALUES(:datainicio, :datafim, :imagem, :fk_cliente, :fk_outdoor, :fk_gestor, :preco)");
            $stmt->bindparam(":datainicio", $datainicio);
            $stmt->bindparam(":datafim", $datafim);
            $stmt->bindparam(":imagem", $imagem);
            $stmt->bindparam(":fk_cliente", $fk_cliente);
            $stmt->bindparam(":fk_outdoor", $fk_outdoor);
            $stmt->bindparam(":fk_gestor", $fk_gestor);
            $stmt->bindparam(":preco", $preco);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    
    public function apagarPeloId($id) {
        try {
            $stmt = $this->db->prepare("DELETE FROM aluguer WHERE id=:id");
            $stmt->bindparam(":id", $id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    
    public function apagarPelaFkOutdoor($fk_outdoor) {
        try {
            $stmt = $this->db->prepare("DELETE FROM aluguer WHERE fk_outdoor=:fk_outdoor");
            $stmt->bindparam(":fk_outdoor", $fk_outdoor);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function trocarGestorDaSolicitacao($id, $novogestor) {
        try {
            $stmt = $this->db->prepare("UPDATE aluguer SET fk_gestor =:novogestor WHERE id=:id");
            $stmt->bindparam(":id", $id);
            $stmt->bindparam(":novogestor", $novogestor);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    
    public function selecionarTodosJoin() {
        $alugueis = Array();
        $stmt = $this->db->prepare("SELECT aluguer.* , outdoor.tipodeoutdoor, outdoor.provincia, outdoor.municipio, outdoor.comuna, outdoor.estado, users.nome FROM aluguer JOIN outdoor ON (aluguer.fk_outdoor = outdoor.id) JOIN gestor ON (aluguer.fk_gestor = gestor.id) JOIN users ON (gestor.fk_user = users.id)");
        $stmt->execute();
        $result = $stmt->fetchAll();
        foreach ($result as $aluguer) {
            $alugueis[] = new Aluguer($aluguer['id'], $aluguer['datainicio'], $aluguer['datafim'], $aluguer['imagem'], $aluguer['fk_cliente'], $aluguer['fk_outdoor'], $aluguer['fk_gestor'], $aluguer['preco'], $aluguer['tipodeoutdoor'], $aluguer['provincia'], $aluguer['municipio'], $aluguer['comuna'], $aluguer['estado'], $aluguer['nome']);
        }
        
        return $alugueis;
    }
}
