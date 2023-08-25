<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of IOutdoor
 *
 * @author Ngola
 */
interface IOutdoor {
    function inserir($tipoOutdoor, $preco,$estado, $provincia, $municipio, $comuna);
    function atualizarOutdoor($id ,$estado, $tipodeoutdoor, $preco, $comuna, $municipio, $provincia);
    function removerOutdoor($id);
}
