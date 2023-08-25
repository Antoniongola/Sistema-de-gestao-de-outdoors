<?php
include_once '/xampp/htdocs/PF_20200446/services/ServiceClasses/AdministradorService.php';
include_once '/xampp/htdocs/PF_20200446/services/ServiceClasses/userService.php';
include_once '/xampp/htdocs/PF_20200446/services/ServiceClasses/GestorService.php';
include_once '/xampp/htdocs/PF_20200446/services/ServiceClasses/aluguerService.php';
include_once '/xampp/htdocs/PF_20200446/model/User.php';

class AdminController {
    private $servico = NULL;
    private $userservico = NULL;
    
    function __construct() {
        $this->servico = new AdministradorService();
        $this->userservico = new UserService();
    }
    
    public function criarGestor(){
        if($_SERVER['REQUEST_METHOD'] == "POST"){
        $nome = filter_input(INPUT_POST, 'nome');
        $username = filter_input(INPUT_POST, 'username');
        $email = filter_input(INPUT_POST, 'email');
        $morada = filter_input(INPUT_POST, 'morada');
        $provincia = filter_input(INPUT_POST, 'provincia');
        $municipio = filter_input(INPUT_POST, 'municipio');
        $comuna = filter_input(INPUT_POST, 'comuna');
        $nacionalidade = filter_input(INPUT_POST, 'nacionalidade');
        $telemovel = filter_input(INPUT_POST, 'telemovel');
        $password = filter_input(INPUT_POST, 'password');
            try{
                if(!($this->userservico->verificarConta($email)) && !($this->userservico->verificarUsername($username))){
                    echo "<script> alert('Gestor criado com sucesso & Email enviado com sucesso para o mesmo!'); </script>";
                    $this->servico->registrarGestor($nome, $provincia, $municipio, $comuna, $nacionalidade, $morada, $email, $telemovel, $username, $password, 'gestor', 'autenticar');
                    $user = $this->userservico->apresentarUser($email);
                    $gestor = new GestorService();
                    $gestor->inserirGestor(0, $user->getId());
                }else{
                    echo "Conta inacessível";
                }
            } catch (Exception $ex) {
                echo $ex->getMessage();
            }
        }
    }
    
    public function mudarGestorDaSolicitacao(){
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            $aluguer = new AluguerService();
            $gestor = new GestorService();
            #$gestor->diminuirSolicitacoes();
            $novogestor = filter_input(INPUT_POST, 'novogestor'); 
            $aluguer->alterarDados($_SESSION['idaluguer'], $novogestor);
            $gestor->aumentarSolicitacoes($novogestor);
            header('location: mudarGestorDaSolicitacao.php');
        }
    }
    
    public function gestorDeUtilizador(){
        $filterOp = filter_input(INPUT_GET, 'op');
        $filterId = filter_input(INPUT_GET, 'id');
        $op = isset($filterOp) ? $filterOp : NULL;
        $id = isset($filterId) ? $filterId : NULL;
        try {
            if (!$op || $op === 'ativar') {
                $this->servico->ativarConta($id);
                header('location: index.php');
            } else if ($op === 'bloquear') {
                $this->servico->bloquearConta($id);
                header('location: index.php');
            } else if ($op === 'desbloquear') {
                $this->servico->desbloquearConta($id);
                header('location: index.php');
            } else {
                echo '"<script> alert("Page not found, Page for operation " '. $op . '" was not found!");</script>';
            }
        } catch (Exception $e) {
            $this->showError("Erro", $e->getMessage());
        }
    }
    
    public function apresentarGestores() {
        $gestor = new GestorService();
        $gestor->apresentarTodosGestores();
    }
    
}
