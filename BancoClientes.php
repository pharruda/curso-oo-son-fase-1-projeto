<?php

class BancoClientes
{
    public $clientes = array();

    /**
     * método onde adiciona o cliente
     * @param $cliente
     */
    public function addCliente(Cliente $cliente)
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

    /**
     * Mostra apenas um cliente
     * @param $key
     * @return mixed
     */
    public function showCliente($key)
    {
        return $this->clientes[$key];
    }

}