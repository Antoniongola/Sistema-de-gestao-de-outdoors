<?php
include_once '/xampp/htdocs/PF_20200446/Dbconfig/DbConnection.php';
require '/xampp/htdocs/PF_20200446/model/Outdoor.php';

class OutdoorRepository {
    private $db;
    
    function __construct() {
        $this->db = DbConnection::getInstance();
    }

    public function insert($estado, $preco, $tipodeoutdoor, $provincia, $municipio, $comuna) {
        try {
            $stmt = $this->db->prepare("INSERT INTO outdoor (estado, preco, tipodeoutdoor, provincia, municipio, comuna) VALUES (:estado, :preco, :tipodeoutdoor, :provincia, :municipio, :comuna)");
            $stmt->bindparam(":estado", $estado);
            $stmt->bindparam(":preco", $preco);
            $stmt->bindparam(":tipodeoutdoor", $tipodeoutdoor);
            $stmt->bindparam(":provincia", $provincia);
            $stmt->bindparam(":municipio", $municipio);
            $stmt->bindparam(":comuna", $comuna);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    
    public function selectAll() {
        $outdoors = Array();
        $stmt = $this->db->prepare("SELECT * FROM outdoor");
        $stmt->execute();
        $result = $stmt->fetchAll();

        foreach ($result as $outdoor) {
            $outdoors[] = new Outdoor($outdoor['id'], $outdoor['preco'], $outdoor['tipodeoutdoor'], $outdoor['provincia'], $outdoor['municipio'], $outdoor['comuna'], $outdoor['estado']);
        }
        return $outdoors;
    }
    
    public function selectById($id) {
        $stmt = $this->db->prepare("SELECT * FROM outdoor WHERE id =:id");
        $stmt->execute(['id' => $id]);
        $outdoor = $stmt->fetch();
            return new Outdoor($outdoor['id'], $outdoor['preco'], $outdoor['tipodeoutdoor'], $outdoor['provincia'], $outdoor['municipio'], $outdoor['comuna'], $outdoor['estado']);
    }
    
    public function updateByID($id, $provincia, $municipio, $comuna, $tipo, $estado, $preco) {
        try {
            $stmt = $this->db->prepare("UPDATE outdoor SET tipodeoutdoor=:tipo, preco=:preco, estado=:estado, provincia=:provincia, municipio=:municipio, comuna=:comuna WHERE id=:id");
            $stmt->bindparam(":id", $id);
            $stmt->bindparam(":provincia", $provincia);
            $stmt->bindparam(":municipio", $municipio);
            $stmt->bindparam(":comuna", $comuna);
            $stmt->bindparam(":tipo", $tipo);
            $stmt->bindparam(":estado", $estado);
            $stmt->bindparam(":preco", $preco);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    
    public function delete($id) {
        try {
            $stmt = $this->db->prepare("DELETE FROM outdoor WHERE id=:id");
            $stmt->bindparam(":id", $id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
}
