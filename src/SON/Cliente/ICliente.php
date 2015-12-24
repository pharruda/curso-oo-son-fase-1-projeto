<?php

namespace SON\Cliente;

interface ICliente
{
    public function getGrauImportancia();
    public function setGrauImportancia($estrelas);

    public function getEnderecoCobranca();
    public function setEnderecoCobranca($enderecoCobranca);

}