<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Description of OutdoorController
 *
 * @author Ngola
 */
include_once '/xampp/htdocs/PF_20200446/services/ServiceClasses/OutdoorService.php';
include_once '/xampp/htdocs/PF_20200446/services/ServiceClasses/gestorService.php';
include_once '/xampp/htdocs/PF_20200446/services/ServiceClasses/userService.php';
include_once '/xampp/htdocs/PF_20200446/services/ServiceClasses/aluguerService.php';
include_once '/xampp/htdocs/PF_20200446/model/Outdoor.php';
class OutdoorController {
    private $outdoor = NULL;
    
    function __construct() {
        $this->outdoor = new OutdoorService();
    }

    public function inserirAluguer(){
        $gestor = new GestorService();
        $userS = new UserService();
        $aluguer = new AluguerService();
        $fk_gestor = $gestor->gestorMenosSolicitado();
        $outdoorRES = $this->recuperarOutdoor($_SESSION['outdoor']);

        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            $ficheiro = filter_input(INPUT_POST, 'ficheiro');
            $datainicio = filter_input(INPUT_POST, 'datainicio');
            $datafim = filter_input(INPUT_POST, 'datafim');
            $imagem = filter_input(INPUT_POST, 'imagem');
            $calcula = filter_input(INPUT_POST, 'calculaPreco');
            $preco = filter_input(INPUT_POST, 'precoInicial');
            $ficheiro = filter_input(INPUT_POST, 'ficheiro');

            //imprimindo o ficheiro escolhido pelo user
            //definindo as propriedades
            #$clien = new ClienteService();
            $file = $_FILES['ficheiro'];
            $file_name = $file['name'];
            $tmp_name = $file['tmp_name'];
            #$User = $userS->apresentarUser($_SESSION['user']);

            if($imagem === 'nao'){
                $this->service->alugarOutdoor($datainicio, $datafim, 'nenhuma', $_SESSION['idcliente'], $_SESSION['outdoor'], $fk_gestor, $preco);
                $outdoor->atualizarOutdoor($_SESSION['outdoor'], 'A aguardar pagamento', $outdoorRES->getTipodeoutdoor(), $outdoorRES->getPreco(), $outdoorRES->getComuna(), $outdoorRES->getMunicipio(), $outdoorRES->getProvincia());
                $gestor->aumentarSolicitacoes($fk_gestor);
                #echo "<script> alert('Aluguer feito com sucesso!!'); </script>";
            }else{
                
                $path = $_SERVER['DOCUMENT_ROOT'].'/PF_20200446/ficheiros/imagens/';
                move_uploaded_file($tmp_name, $path.$file_name);
                $aluguer->alugarOutdoor($datainicio, $datafim, $file_name, $_SESSION['idcliente'], $_SESSION['outdoor'], $fk_gestor, $preco);
                $this->atualizarOutdoor($_SESSION['outdoor'], 'A aguardar pagamento', $outdoorRES->getTipodeoutdoor(), $outdoorRES->getPreco(), $outdoorRES->getComuna(), $outdoorRES->getMunicipio(), $outdoorRES->getProvincia());
                $gestor->aumentarSolicitacoes($fk_gestor);
                #echo "<script> alert('Aluguer feito com sucesso!!'); </script>";
            }
            header('location: index.php');
        }
    }
    #esse acima é teste
    
    public function inserirOutdoor($tipodeoutdoor, $preco, $estado, $provincia, $municipio, $comuna){
        $this->outdoor->inserir($tipodeoutdoor, $preco, $estado, $provincia, $municipio, $comuna);
    }
    
    public function recuperarOutdoor($id){
        return $this->outdoor->recuperarOutdoor($id);
    }
    
    public function recuperarTodosOutdoors(){
        return $this->outdoor->recuperartodosOutdoor();
    }
    
    public function removerOutdoorById($id){
        $this->outdoor->removerOutdoor($id);
    }

    public function atualizarOutdoor($id, $estado, $tipodeoutdoor, $preco, $comuna, $municipio, $provincia){
        $this->outdoor->atualizarOutdoor($id, $estado, $tipodeoutdoor, $preco, $comuna, $municipio, $provincia);
    }
    
    public function gestorDeOutdoor($tipodeoutdoor, $preco, $comuna, $municipio, $provincia){
        $filterOp = filter_input(INPUT_GET, 'op');
        $filterId = filter_input(INPUT_GET, 'id');
        $op = isset($filterOp) ? $filterOp : NULL;
        $id = isset($filterId) ? $filterId : NULL;
        $out = $this->outdoor->recuperarOutdoor($id);
        try {
            if (!$op || $op == 'atualizar') {
                $this->atualizarOutdoor($id, $out->getEstado(), $tipodeoutdoor, $preco, $comuna, $municipio, $provincia);
            } else if ($op == 'remover') {
                $this->removerOutdoorById($id);
            } else {
                $this->showError("Page not found", "Page for operation " . $op . " was not found!");
            }
        } catch (Exception $e) {
            $this->showError("Erro", $e->getMessage());
        }
    }
    
}
