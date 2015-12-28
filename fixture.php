<?php
define('CLASS_DIR', 'src/');
set_include_path(get_include_path().PATH_SEPARATOR.CLASS_DIR);
spl_autoload_register(function($className)
{
    $className = ltrim($className, '\\');
    $fileName  = '';
    $namespace = '';
    if ($lastNsPos = strrpos($className, '\\')) {
        $namespace = substr($className, 0, $lastNsPos);
        $className = substr($className, $lastNsPos + 1);
        $fileName  = str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
    }
    $fileName .= str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';

    require $fileName;
});

$pdo = new \PDO("mysql:host=localhost;", "root", "123");

$criar_database_tabela = $pdo->exec( "CREATE DATABASE IF NOT EXISTS `dbteste`;
    GRANT ALL ON `dbteste`.* TO 'root'@'localhost';
    FLUSH PRIVILEGES;
    CREATE TABLE IF NOT EXISTS `dbteste`.`Cliente` (
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `nome` varchar(45) NOT NULL,
      `endereco` varchar(100) NOT NULL,
      `telefone` varchar(30) NOT NULL,
      `tipo` int(11) NOT NULL,
      `grau_importancia` int(11) NOT NULL,
      `endereco_cobranca` varchar(200) NOT NULL,
      PRIMARY KEY (`id`)
    )");

$clientes = new SON\Cliente\BancoClientes();

// eu não entendi muito bem se tem que criar um metodo ou é aqui mesmo que coloca
// as fixtures para povoar o banco de dados.

$fisico = new SON\Cliente\Cliente();
$fisico->setNome('Paulo ');
$fisico->setTipo(1);
$fisico->setEndereco('Rua Cliente');
$fisico->setTelefone('6599545555');
$fisico->setEnderecoCobranca('endereco cobranca');
$fisico->setGrauImportancia(5);
$clientes->persist($fisico);

$juridico = new SON\Cliente\Cliente();
$juridico->setNome('Empresa');
$juridico->setTipo(2);
$juridico->setEndereco('Rua Empresa');
$juridico->setTelefone('64444444445');
$juridico->setEnderecoCobranca('endereco cobranca empresa');
$juridico->setGrauImportancia(3);
$clientes->persist($juridico);

