<?php


class Cliente
{
    public $id;
    public $nome;
    public $cpf;
    public $endereco;
    public $telefone;

    //array onde vai armazena os clientes
    public $clientes = array();

    public function __construct($id, $nome, $cpf, $endereco, $telefone)
    {
        $this->id       = $id;
        $this->nome     = $nome;
        $this->cpf      = $cpf;
        $this->endereco = $endereco;
        $this->telefone = $telefone;
    }

    /**
     * método onde adiciona o cliente
     * @param $cliente
     */
    public function addCliente($cliente)
    {
        $this->clientes[] = $cliente;
    }

    /**
     * Método onde retorna todos os clientes
     * @return array
     */
    public function allClientes()
    {
        return $this->clientes;
    }

    /**
     * Ordena em forma crescente
     * @return bool
     */
    public function clientesCrescente()
    {
        return asort($this->clientes);
    }

    /**
     * Ordena em forma descrescente
     * @return bool
     */
    public function clientesDescrescente()
    {
        return arsort($this->clientes);
    }

}