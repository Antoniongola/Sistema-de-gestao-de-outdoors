<?php
include_once '/xampp/htdocs/PF_20200446/services/ServiceClasses/UserService.php';
include_once '/xampp/htdocs/PF_20200446/services/ServiceClasses/clienteService.php';
#aqui abaixo vou meter o outdoor controller
include_once '/xampp/htdocs/PF_20200446/controllers/outdoorcontroller.php';
include_once '/xampp/htdocs/PF_20200446/model/User.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '/xampp/htdocs/PF_20200446/PHPMailer/src/Exception.php';
require '/xampp/htdocs/PF_20200446/PHPMailer/src/PHPMailer.php';
require '/xampp/htdocs/PF_20200446/PHPMailer/src/SMTP.php';

class UserController {
    private $service = NULL;
    
    function __construct() {
        $this->service = new UserService();
    }
    
    public function criarConta(){
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $servico = new UserService();
            $nome = filter_input(INPUT_POST, 'nome');
            $username = filter_input(INPUT_POST, 'username');
            $email = filter_input(INPUT_POST, 'email');
            $morada = filter_input(INPUT_POST, 'morada');
            $tipodecliente = filter_input(INPUT_POST, 'tipodecliente');
            $atividadedaempresa = filter_input(INPUT_POST, 'atividadedaempresa');
            $provincia = filter_input(INPUT_POST, 'provincia');
            $municipio = filter_input(INPUT_POST, 'municipio');
            $comuna = filter_input(INPUT_POST, 'comuna');
            $nacionalidade = filter_input(INPUT_POST, 'nacionalidade');
            $telemovel = filter_input(INPUT_POST, 'telemovel');
            $password = filter_input(INPUT_POST, 'password');

            $tema = 'Solicitação de ativação da minha conta';
            $msg = 'Olá, sou o ' . $nome . ', gostaria que o administrador ativasse a minha conta para que eu possa começar a usar a plataforma Outdoors Angola da XPTO Solutions.';
            $headers = 'De: ' . $nome . '\nReponda aqui: ' . $email;

            $mail = new PHPMailer(true);
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = '20200446@isptec.co.ao';
            $mail->Password = 'Fatima1$';
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;
            $mail->setFrom('20200446@isptec.co.ao');
            $mail->addAddress($email);
            $mail->isHTML(true);
            $mail->Subject = $tema;
            $mail->Body = $msg;

            if (!($this->service->verificarConta($email)) && !($this->service->verificarUsername($username))) {
                $mail->send();
                echo "<script> alert('Email enviado com sucesso'); </script>";
                $this->service->inserirUser($nome, $provincia, $municipio, $comuna, $nacionalidade, $morada, $email, $telemovel, $username, $password, 'user', 'por ativar');
                $_SESSION['user'] = $email;

                $clientela = new ClienteService();
                $user = $this->service->apresentarUser($_SESSION['user']);
                $clientela->inserirCliente($tipodecliente, $atividadedaempresa, $user->getId());
                echo "<script> alert('Utilizador criado com sucesso & Email enviado com sucesso para o administrador ativar a conta do mesmo!'); </script>";
                header('Location: index.php');
            } else {
                echo "<script> alert('Conta inacessível, já existe uma conta com o email: ".$email." nos nosssos registros'); </script>";
            }
        }
    }
    
    public function inserirUtilizador($nome, $provincia, $municipio, $comuna, $nacionalidade, $morada, $email, $telemovel, $username, $password, $perfil, $estadoConta){
        $this->service->inserirUser($nome, $provincia, $municipio, $comuna, $nacionalidade, $morada, $email, $telemovel, $username, $password, $perfil, $estadoConta);
    }
    
    public function atualizarDados(){
        $user = $this->service->apresentarUser($_SESSION['user']);
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            $nome = filter_input(INPUT_POST, 'nome');
            $username = filter_input(INPUT_POST, 'username');
            $email = filter_input(INPUT_POST, 'email');
            $morada = filter_input(INPUT_POST, 'morada');
            $tipodecliente = filter_input(INPUT_POST, 'tipodecliente');
            $atividadedaempresa = filter_input(INPUT_POST, 'atividadedaempresa');
            $provincia = filter_input(INPUT_POST, 'provincia');
            $municipio = filter_input(INPUT_POST, 'municipio');
            $comuna = filter_input(INPUT_POST, 'comuna');
            $nacionalidade = filter_input(INPUT_POST, 'nacionalidade');
            $telemovel = filter_input(INPUT_POST, 'telemovel');
            $password = filter_input(INPUT_POST, 'password');
            $_SESSION['user'] = $email;
            $this->service->alterarDados($user->getId(), $nome, $provincia, $municipio, $comuna, $nacionalidade, $morada, $email, $telemovel, $username, $password,$tipodecliente, $atividadedaempresa, 'cliente', $user->getEstadoConta());
            header('location: index.php');
        }
    }
    
    public function alugarOutdoor(){
        $gestor = new GestorController();
        $userS = new UserService();
        $fk_gestor = $gestor->gestorMenosSolicitado();
        $outdoor = new OutdoorController();
        $outdoorRES = $outdoor->recuperarOutdoor($_SESSION['outdoor']);

        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            $ficheiro = filter_input(INPUT_POST, 'ficheiro');
            #$tipodeoutdoor = filter_input(INPUT_POST, 'tipodeoutdoor'); 
            $datainicio = filter_input(INPUT_POST, 'datainicio');
            $datafim = filter_input(INPUT_POST, 'datafim');
            $imagem = filter_input(INPUT_POST, 'imagem');
            $calcula = filter_input(INPUT_POST, 'calculaPreco');
            $preco = filter_input(INPUT_POST, 'precoInicial');
            $ficheiro = filter_input(INPUT_POST, 'ficheiro');

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
                echo "<script> alert('Aluguer sem imagem feito com sucesso!!'); </script>";
            }else{
                
                $path = $_SERVER['DOCUMENT_ROOT'].'/PF_20200446/ficheiros/imagens/';
                move_uploaded_file($tmp_name, $path.$file_name);
                $this->service->alugarOutdoor($datainicio, $datafim, $file_name, $_SESSION['idcliente'], $_SESSION['outdoor'], $fk_gestor, $preco);
                $outdoor->atualizarOutdoor($_SESSION['outdoor'], 'A aguardar pagamento', $outdoorRES->getTipodeoutdoor(), $outdoorRES->getPreco(), $outdoorRES->getComuna(), $outdoorRES->getMunicipio(), $outdoorRES->getProvincia());
                $gestor->aumentarSolicitacoes($fk_gestor);
                echo "<script> alert('Aluguer com imagem feito com sucesso!!'); </script>";
            }
            #header('location: index.php');
        }
    }
    
    public function carregarComprovativo(){
        if ($_SERVER['REQUEST_METHOD'] === "POST"){
            $ficheiro = filter_input(INPUT_POST, 'ficheiro'); 
            $outdoor = new OutdoorController();
            $ficheiro = filter_input(INPUT_POST, 'ficheiro'); 
            #$teste = new AluguerRepository();
            $compro = new ComprovativoRepository();

            $utilizador = $this->recuperarUserByEmail($_SESSION['user']);
            $outdoorRES = $outdoor->recuperarOutdoor($_SESSION['outdoor']);
            //imprimindo o ficheiro escolhido pelo user
            /*echo "<pre>";
            print_r($_FILES);
            echo "</pre>";*/
            //definindo as propriedades
            $file = $_FILES['ficheiro'];
            $file_name = $_SESSION['idsolicitacao'].'.pdf';
            $tmp_name = $file['tmp_name'];

            //definindo o caminho para o qual os comprovativos serão guardados
            $path = $_SERVER['DOCUMENT_ROOT'].'/PF_20200446/ficheiros/comprovativos/';
            $compro->inserir($file_name, $utilizador->getId());
            $outdoor->atualizarOutdoor($_SESSION['outdoor'], 'por validar pagamento', $outdoorRES->getTipodeoutdoor(), $outdoorRES->getPreco(), $outdoorRES->getComuna(), $outdoorRES->getMunicipio(), $outdoorRES->getProvincia());

            move_uploaded_file($tmp_name, $path.$file_name);
            header('location: index.php');
        }
    }
    
    public function caregarImagem(){
        $outdoor = new OutdoorController();
        $ficheiro = filter_input(INPUT_POST, 'ficheiro'); 
        #$teste = new AluguerRepository();
        $compro = new ComprovativoRepository();
        $utilizador = $this->recuperarUserByEmail($_SESSION['user']);
        $outdoorRES = $outdoor->recuperarOutdoor($_SESSION['outdoor']);
            
        $file = $_FILES['ficheiro'];
        $file_name = $file['name'];
        $tmp_name = $file['tmp_name'];
            echo "<pre>";
                print_r($_FILES);
            echo "</pre>";
        //definindo o caminho para o qual as imagens serão guardados
        $path = $_SERVER['DOCUMENT_ROOT'].'/PF_20200446/ficheiros/imagens/';
        $envio = $compro->inserir($file_name, $utilizador->getId());
        $outdoor->atualizarOutdoor($_SESSION['outdoor'], 'por validar pagamento', $outdoorRES->getTipodeoutdoor(), $outdoorRES->getPreco(), $outdoorRES->getComuna(), $outdoorRES->getMunicipio(), $outdoorRES->getProvincia());
        
        if(move_uploaded_file($tmp_name, $path.$file_name)){
            if($envio){
                echo 'ENVIOU NA BD';
            }else{
                echo 'FICHEIRO CARREGADO MAS NÃO ENVIOU NA BASE DE DADOS';
            }
        }else{
            echo 'ERRO AO CARREGAR O COMPROVATIVO';
        }
    }
    
    public function login(){
        if(($_SERVER['REQUEST_METHOD'] == "POST")){
            $email = filter_input(INPUT_POST, 'email');
            $password= filter_input(INPUT_POST, 'password');
            $servicos = new UserService();
            $_SESSION['user'] = $email;
            $this->service->validarLogin($email, $password);
        }
    }
    
    public function removerUser($id){
        $this->service->apagarUser($id);
    }
    
    public function recuperarUserByEmail($email){
        return $this->service->apresentarUser($email);
    }
    
    public function recuperarTodosUsers(){
        return $this->service->apresentarTodosUsers();
    }
    
    public function validarLogin($email, $password){
        $this->service->validarLogin($email, $password);
    }
}
