<?php

namespace SON\Cliente;

use SON\Cliente\Cliente;

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