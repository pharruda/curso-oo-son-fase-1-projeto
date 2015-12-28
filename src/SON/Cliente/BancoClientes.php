<?php

namespace SON\Cliente;

class BancoClientes
{
    private $pdo;

    public function __construct()
    {
        try{
            $this->pdo = new \PDO("mysql:host=localhost;dbname=dbteste", "root", "123");
        }catch (\PDOException $e) {
            return $e->getMessage();
        }
    }

    public function persist(Cliente $cliente)
    {
        try {
            $stmt = $this->pdo->prepare("INSERT INTO Cliente(nome,endereco, telefone, tipo, grau_importancia, endereco_cobranca)
                                        VALUES (:nome, :endereco, :telefone, :tipo, :grau_importancia, :endereco_cobraca)");
            $stmt->bindParam(':nome', $cliente->getNome());
            $stmt->bindParam(':endereco', $cliente->getEndereco());
            $stmt->bindParam(':telefone', $cliente->getTelefone());
            $stmt->bindParam(':tipo', $cliente->getTipo());
            $stmt->bindParam(':grau_importancia', $cliente->getGrauImportancia());
            $stmt->bindParam(':endereco_cobraca', $cliente->getEnderecoCobranca());
            $stmt->execute();
        }catch (\PDOException $e) {
            return $e->getMessage();
        }
    }

    public function flush()
    {
        try{
            $stmt = $this->pdo->prepare("select * from Cliente");
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (\PDOException $e) {
            return $e->getMessage();
        }
    }


    /**
     * Mostra apenas um cliente
     * @param $key
     * @return mixed
     */
    public function showCliente($key)
    {
        try{
            $stmt = $this->pdo->prepare("select * from Cliente where id = :id");
            $stmt->bindParam(':id', $key);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (\PDOException $e) {
            return $e->getMessage();
        }
    }

}