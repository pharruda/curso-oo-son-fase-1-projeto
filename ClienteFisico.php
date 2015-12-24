<?php

/**
 * Created by PhpStorm.
 * User: paulo
 * Date: 24/12/15
 * Time: 12:05
 */
class ClienteFisico extends Cliente
{
    private $cpf;

    /**
     * @return mixed
     */
    public function getCpf()
    {
        return $this->cpf;
    }

    /**
     * @param mixed $cpf
     */
    public function setCpf($cpf)
    {
        $this->cpf = $cpf;
        return $this;
    }



}