<?php
/**
 * Description of UserService
 *
 * @author Ngola
 */

include_once '/xampp/htdocs/PF_20200446/services/IService/IUserRegistrado.php';
require_once '/xampp/htdocs/PF_20200446/repositories/UserRepository.php';
require_once '/xampp/htdocs/PF_20200446/repositories/ClienteRepository.php';

class UserService implements IUserRegistrado{
    private $user;
    private $userRepository = NULL;
    private $clienteRepository = NULL;
    
    public function __construct() {
        $this->userRepository = new UserRepository();
        $this->clienteRepository = new ClienteRepository();
    }
    //put your code here
    public function alterarDados($id, $nome, $provincia, $municipio, $comuna, $nacionalidade, $morada, $email, $telemovel, $username, $password, $tipodecliente, $atividadedaempresa, $perfil, $estadoConta) {
        try {
            $this->clienteRepository->updateById($tipodecliente, $atividadedaempresa, $id);
            $res = $this->userRepository->updateByID($id, $nome, $provincia, $municipio, $comuna, $nacionalidade, $morada, $email, $telemovel, $username, $password, $perfil, $estadoConta);
            return $res;
        } catch (PDOException $e) {
        }
    }
    
    public function inserirUser($nome, $provincia, $municipio, $comuna, $nacionalidade, $morada, $email, $telemovel, $username, $password, $perfil, $estadoConta) {
        try {
            $res = $this->userRepository->insert($nome, $provincia, $municipio, $comuna, $nacionalidade, $morada, $email, $telemovel, $username, $password, $perfil, $estadoConta);
            return $res;
        } catch (PDOException $e) {
        }
    }
    
    public function apresentarTodosUsers() {
        try {
            $res = $this->userRepository->selectAll();
            return $res;
        } catch (PDOException $e) {
        }
    }
    
    public function apresentarUser($email) {
        try {
            $res = $this->userRepository->selectByEmail($email);
            return $res;
        } catch (PDOException $e) {
        }
    }
    
    public function apagarUser($id) {
        try {
            $res = $this->userRepository->delete($id);
            return $res;
        } catch (PDOException $e) {
        }
    }
    
    public function verificarConta($email){
        $contador = 0;
        foreach($this->userRepository->selectAll() as $user){
            if ($user->getEmail() === $email) {
                $contador++;
            }
        }
        if ($contador != 0) {
            return true;
        } else{
            return false;
        }
    }
    
    public function verificarUsername($username){
        $contador = 0;
        foreach($this->userRepository->selectAll() as $user){
            if ($user->getUsername() === $username) {
                $contador++;
            }
        }
        if ($contador != 0) {
            return true;
        } else{
            return false;
        }
    }
    
    public function login($user, $password) {
        if(($password == $user->getPassword() && ($user->getPerfil()!== 'user' && $user->getPerfil()!== 'cliente'))){
            $this->redirect($user);
        } else if(($password == $user->getPassword() && ($user->getPerfil()==='cliente' || $user->getPerfil()==='user') && $user->getEstadoConta() !== 'ativo')){
            echo "<script> alert('NÃO PODE FAZER LOGIN ATÉ TER A SUA CONTA ATIVADA PELO ADMINISTRADOR!'); </script>";
        } else if(($password == $user->getPassword() && ($user->getPerfil()=== 'user' || $user->getPerfil()=== 'cliente') && $user->getEstadoConta()==='ativo')){
            $this->redirect($user);
        } else {
            echo "<script> alert('CREDENCIAIS INVÁLIDOS OU A SUA CONTA NÃO SE ENCONTRA ATIVA'); </script>";
        }
    }
    
    public function validarLogin($email, $password){
        try {
            if($this->verificarConta($email)){
                $user = $this->apresentarUser($email);
                $this->login($user, $password);
            }else{
                echo "<script> alert('CONTA INACESSÍVEL, NÃO EXISTE UMA CONTA COM O EMAIL: ".$email." NOS NOSSOS REGISTROS'); </script>";
            }
        } catch (PDOException $e) {
        }
    }
    
    public function redirect($user){
        if ($user->getPerfil() == 'administrador') {
            header('location: admin/index.php');
        } else if ($user->getPerfil() == 'cliente' || $user->getPerfil() == 'user') {
            header('location: index.php');
        } else if($user->getPerfil() == 'gestor'){
            header('location: gestor/index.php');
        }
    }
    
    public function carregarComprovativoPagamento() {
        
    }

    public function consultarSolicitacoes() {
        
    }

    public function solicitarAluguer($tipoOutdoor, $provincia, $municipio, $comuna, $dataInicioAluguer, $dataFimAluguer, $imagemOuNao) {
        
    }

}
