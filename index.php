<?php

define('CLASS_DIR', 'src/');
set_include_path(get_include_path().PATH_SEPARATOR.CLASS_DIR);

/**
 * a funcão spl_autoload_register() não queria funciona sem parametro, então eu coloquei o código do
 * php-fig e deu certo.
 **/

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

$clientes = new SON\Cliente\BancoClientes();

$fisico = new SON\Cliente\ClienteFisico();
$fisico->setNome("Paulo");
$fisico->setId(1);
$fisico->setTipo(1);
$fisico->setCpf('0606060606060');
$fisico->setEndereco('Teste Endereco');
$fisico->setTelefone('6599999999');
$fisico->setEnderecoCobranca('rua do pagamento físico 1');
$fisico->setGrauImportancia(5);


$clientes->addCliente($fisico);

$fisico = new SON\Cliente\ClienteFisico();
$fisico->setNome("Teste 2");
$fisico->setId(2);
$fisico->setTipo(1);
$fisico->setCpf('0606060606060');
$fisico->setEndereco('Teste Endereco 2');
$fisico->setTelefone('6599999999');
$fisico->setEnderecoCobranca('rua do pagamento físico 2');
$fisico->setGrauImportancia(3);

$clientes->addCliente($fisico);

$juridico = new SON\Cliente\ClienteJuridico();
$juridico->setNome("Teste 2");
$juridico->setId(3);
$juridico->setTipo(2);
$juridico->setCnpj('1111111111111');
$juridico->setEndereco('Teste Endereco 2');
$juridico->setTelefone('6599999999');
$juridico->setEnderecoCobranca('rua do pagamento juridico');
$juridico->setGrauImportancia(2);

$clientes->addCliente($juridico);

if(isset($_GET['ordena']) && $_GET['ordena'] == 'crescente')
    $clientes->clientesCrescente();

if(isset($_GET['ordena']) && $_GET['ordena'] == 'decrescente')
    $clientes->clientesDescrescente();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Curso POO SON - fase 1</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        .top {
            margin-top: 30px;
        }
    </style>
</head>
<body>
<div class="container top">
    <a class="btn btn-primary" href="index.php?ordena=crescente" role="button">Ordenar de forma crescente</a>
    <a class="btn btn-primary" href="index.php?ordena=decrescente" role="button">Ordenar de forma descrescente</a>
    <br>
    <br>
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>id</th>
                <th>Nome</th>
                <th>Tipo</th>
                <th>Endereço</th>
                <th>Telefone</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($clientes->allClientes() as $key => $cliente): ?>
            <tr>
                <td><?php echo $cliente->getId(); ?></td>
                <td><?php echo $cliente->getNome(); ?></td>
                <?php if($cliente->getTipo() == 1): ?>
                    <td>Pessoa Física</td>
                <?php elseif($cliente->getTipo() == 2):?>
                    <td>Pessoa Juridica</td>
                <?php endif; ?>
                <td><?php echo $cliente->getEndereco(); ?></td>
                <td><?php echo $cliente->getTelefone(); ?></td>
                <td>
                   <a class="btn btn-primary btn-sm"  href="index.php?id=<?php echo $key; ?>">
                        Ver Informações
                   </a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php if(isset($_GET['id'])): ?>
    <?php $cli = $clientes->showCliente($_GET['id']); ?>
    <div class="container">
        <div class="panel panel-success">
            <div class="panel-heading">Informações do Cliente : <?php echo $cli->getNome(); ?></div>
            <div class="panel-body">
                <p><strong>Id :</strong> <?php echo $cli->getId(); ?></p>
                <p><strong>Nome : </strong><?php echo $cli->getNome(); ?></p>
                <?php if($cli->getTipo() == 1): ?>
                    <p><strong>CPF: </strong><?php echo $cli->getCpf(); ?></p>
                <?php elseif($cli->getTipo() == 2):?>
                    <p><strong>CNPJ: </strong><?php echo $cli->getCnpj(); ?></p>
                <?php endif; ?>
                <p><strong>Endereço :</strong> <?php echo $cli->getEndereco(); ?></p>
                <p><strong>Telefone :</strong> <?php echo $cli->getTelefone(); ?></p>
                <p><strong>Grau Importância :</strong> <?php echo $cli->getGrauImportancia(); ?> estrelas</p>
                <p><strong>Endereço p/ cobrança :</strong> <?php echo $cli->getEnderecoCobranca(); ?></p>
            </div>
        </div>
    </div>
<?php endif; ?>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
<script>
    $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').focus()
    })
</script>
</body>
</html>