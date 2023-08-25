<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AdministradorService
 *
 * @author Ngola
 */
require '/xampp/htdocs/PF_20200446/PHPMailer/src/Exception.php';
require '/xampp/htdocs/PF_20200446/PHPMailer/src/PHPMailer.php';
require '/xampp/htdocs/PF_20200446/PHPMailer/src/SMTP.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
include_once '/xampp/htdocs/PF_20200446/services/IService/IAdministrador.php';
require_once '/xampp/htdocs/PF_20200446/repositories/AdminRepository.php';
require_once '/xampp/htdocs/PF_20200446/model/User.php';
class AdministradorService implements IAdministrador{
    private $user=NULL;
    private $adminRepository = NULL;
    
    public function __construct() {
        $this->adminRepository = new AdminRepository();
    }
    
    public function alterarDados($id, $nome, $provincia, $municipio, $comuna, $nacionalidade, $morada, $email, $telemovel, $username, $password, $perfil, $estadoConta) {
        try {
            $res = $this->adminRepository->updateByID($id, $nome, $provincia, $municipio, $comuna, $nacionalidade, $morada, $email, $telemovel, $username, $password, $perfil, $estadoConta);
            return $res;
        } catch (PDOException $e) {
        }
    }
    
    public function inserirUser($nome, $provincia, $municipio, $comuna, $nacionalidade, $morada, $email, $telemovel, $username, $password, $perfil, $estadoConta) {
        try {
            $res = $this->adminRepository->insert($nome, $provincia, $municipio, $comuna, $nacionalidade, $morada, $email, $telemovel, $username, $password, $perfil, $estadoConta);
            return $res;
        } catch (PDOException $e) {
        }
    }
    
    public function apresentarTodosUsers() {
        try {
            $res = $this->adminRepository->selectAll();
            return $res;
        } catch (PDOException $e) {
        }
    }
    
    public function apresentarUser($email) {
        try {
            $res = $this->adminRepository->selectByEmail($email);
            return $res;
        } catch (PDOException $e) {
        }
    }
    
    public function apagarUser($id) {
        try {
            $res = $this->adminRepository->delete($id);
            return $res;
        } catch (PDOException $e) {
        }
    }
    
    public function validarLogin($email, $password){
        try {
            $user = $this->apresentarUser($email);
            if(isset($user) && ($email == $user->getEmail() && $password == $user->getPassword())){
                $this->redirect($user);
            }else {
                echo 'CREDENCIAIS INVÁLIDOS';
            }
        } catch (PDOException $e) {
        }
    }
    
    public function redirect($user){
        if ($user->getPerfil() == 'administrador') {
            header('location: admin/index.php');
        } else if ($user->getPerfil() == 'cliente') {
            header('location: index.php');
        } else if($user->getPerfil() == 'gestor'){
            header('location: gestor/index.php');
        }
    }
    
    public function ativarConta($id) {
        $user = $this->adminRepository->selectById($id);
        $this->alterarDados($user->getId(), $user->getNome(), $user->getProvincia(), $user->getMunicipio(), $user->getComuna(), $user->getNacionalidade(), $user->getMorada(), $user->getEmail(), $user->getTelemovel(),
                $user->getUsername(), $user->getPassword(), $user->getPerfil(), 'ativo');
    
        $tema = 'Conta ativada';
        $msg = 'Querido utilizador da plataforma de gestão de outdoors, "Outdoors Angola XPTO," é com imensa alegria que lhe damos as boas-vindas! <br> Temos o prazer de informar que a sua conta foi ativada pelo nosso administrador (Ngola jr),<br> e agora você pode desfrutar de todos os recursos e possibilidades que a nossa plataforma oferece. <br>
Com a sua conta ativada, você está pronto para explorar as ferramentas intuitivas e eficientes que temos disponíveis. <br> A partir de agora, você pode gerenciar seus outdoors de forma prática, exibir suas campanhas com facilidade e alcançar um público amplo e diversificado. <br>
Estamos entusiasmados em tê-lo como parte da comunidade "Outdoors Angola XPTO". <br>Conte conosco para oferecer suporte e assistência em todas as suas necessidades. <br> Juntos, vamos transformar a maneira como você promove e divulga suas ideias, negócios e eventos. <br>
Aproveite ao máximo a sua experiência conosco! <br>Desejamos muito sucesso em todas as suas empreitadas e esperamos que a nossa plataforma seja uma aliada valiosa em sua jornada de sucesso.
Seja bem-vindo e obrigado por fazer parte da nossa família!<br> Estamos aqui para ajudá-lo a brilhar e alcançar grandes conquistas.<br>
Atenciosamente,<br>
A equipe "Outdoors Angola XPTO",<br>
António (O próprio Ngola)!!<br>';
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = '20200446@isptec.co.ao';
        $mail->Password = 'Fatima1$';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        $mail->setFrom('20200446@isptec.co.ao');
        $mail->addAddress($user->getEmail());
        $mail->isHTML(true);
        $mail->Subject = $tema;
        $mail->Body = $msg;
        $mail->send();
    }

    public function bloquearConta($id) {
        $user = $this->adminRepository->selectById($id);
        $this->alterarDados($user->getId(), $user->getNome(), $user->getProvincia(), $user->getMunicipio(), $user->getComuna(), $user->getNacionalidade(), $user->getMorada(), $user->getEmail(), $user->getTelemovel(),
                $user->getUsername(), $user->getPassword(), $user->getPerfil(), 'bloqueado');
    }

    public function desbloquearConta($id) {
        $user = $this->adminRepository->selectById($id);
        $this->alterarDados($user->getId(), $user->getNome(), $user->getProvincia(), $user->getMunicipio(), $user->getComuna(), $user->getNacionalidade(), $user->getMorada(), $user->getEmail(), $user->getTelemovel(),
                $user->getUsername(), $user->getPassword(), $user->getPerfil(), 'ativo');
    }

    public function registrarGestor($nome, $provincia, $municipio, $comuna, $nacionalidade, $morada, $email, $telemovel, $username, $password, $perfil, $estadoConta) {
        $tema = 'Gestor criado';
        $msg = '"Prezado Gestor da plataforma "Outdoors Angola XPTO,<br>
É com grande satisfação que informamos que suas credenciais de acesso foram enviadas para o seu e-mail registrado.<br>Seu compromisso em aderir à nossa plataforma de gestão de outdoors é extremamente apreciado, e estamos ansiosos para ver o seu sucesso com as possibilidades que oferecemos.<br>
Para garantir a segurança de sua conta, recomendamos enfaticamente que você proceda com a alteração de sua senha imediatamente. <br> Dessa forma, você estará protegendo suas informações e garantindo o controle total sobre seu perfil. <br>
Nossa plataforma oferece uma ampla gama de recursos que permitirão que você gerencie seus outdoors de maneira eficiente e eficaz. <br> Além disso, você poderá analisar as solicitações recebidas, obter insights valiosos e tomar decisões estratégicas para otimizar suas campanhas.<br>
Estamos à sua disposição para ajudá-lo em qualquer etapa do processo. <br> Caso precise de auxílio para configurar sua conta, definir estratégias ou tirar dúvidas sobre nossas funcionalidades, não hesite em entrar em contato com nossa equipe de suporte dedicada.<br>
Aproveite essa oportunidade para ampliar a visibilidade de sua empresa, alcançar novos públicos e fortalecer a sua marca. <br> Estamos confiantes de que a sua presença na plataforma "Outdoors Angola XPTO" será marcada pelo sucesso e pelos resultados positivos.<br>
Bem-vindo ao nosso time de gestores! Estamos empolgados em caminhar ao seu lado rumo ao crescimento e à excelência.<br>
Atenciosamente, <br>
A equipe "Outdoors Angola XPTO", <br>
António (O próprio Ngola)!!';
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
        $mail->send();
        $this->inserirUser($nome, $provincia, $municipio, $comuna, $nacionalidade, $morada, $email, $telemovel, $username, $password, $perfil, $estadoConta);
    }
}
