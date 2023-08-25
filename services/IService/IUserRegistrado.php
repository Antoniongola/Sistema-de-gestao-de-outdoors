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
interface IUserRegistrado {
    function solicitarAluguer($tipoOutdoor, $provincia, $municipio, $comuna, $dataInicioAluguer, $dataFimAluguer, $imagemOuNao);
    function alterarDados($id, $nome, $provincia, $municipio, $comuna, $nacionalidade, $morada, $email, $telemovel, $username, $password, $tipodecliente, $atividadedaempresa, $perfil, $estadoConta);
    function consultarSolicitacoes();
    function carregarComprovativoPagamento();
}
