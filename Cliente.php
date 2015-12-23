<?php


class Cliente
{
    public $id;
    public $nome;
    public $cpf;
    public $endereco;
    public $telefone;

    public function __construct($id, $nome, $cpf, $endereco, $telefone)
    {
        $this->id       = $id;
        $this->nome     = $nome;
        $this->cpf      = $cpf;
        $this->endereco = $endereco;
        $this->telefone = $telefone;
    }
}