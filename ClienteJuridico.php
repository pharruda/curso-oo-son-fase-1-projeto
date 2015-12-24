<?php

/**
 * Created by PhpStorm.
 * User: paulo
 * Date: 24/12/15
 * Time: 12:05
 */
class ClienteJuridico extends Cliente
{

    private $cnpj;

    /**
     * @return mixed
     */
    public function getCnpj()
    {
        return $this->cnpj;
    }

    /**
     * @param mixed $cnpj
     */
    public function setCnpj($cnpj)
    {
        $this->cnpj = $cnpj;
        return $this;
    }

}