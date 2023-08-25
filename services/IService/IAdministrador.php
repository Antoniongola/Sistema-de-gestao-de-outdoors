<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author Ngola
 */

interface IAdministrador {
    //put your code here
    function ativarConta($email);
    function bloquearConta($email);
    function desbloquearConta($email);
    function registrarGestor($nome, $provincia, $municipio, $comuna, $nacionalidade, $morada, $email, $telemovel, $username, $password, $perfil, $estadoConta);
}
