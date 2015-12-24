<?php

/**
 * Created by PhpStorm.
 * User: paulo
 * Date: 24/12/15
 * Time: 12:26
 */
interface ICliente
{
    public function getGrauImportancia();
    public function setGrauImportancia($estrelas);

    public function getEnderecoCobranca();
    public function setEnderecoCobranca($enderecoCobranca);

}