<?php
require_once('Cliente.php');
require_once('BancoClientes.php');

$clientes = new BancoClientes();

$clientes->addCliente(new Cliente(8,'Teste 8','123.123.123.18', 'rua da casa 8', '6599434343'));
$clientes->addCliente(new Cliente(2,'Teste 2','123.123.123.12', 'rua da casa 2', '6599434343'));
$clientes->addCliente(new Cliente(3,'Teste 3','123.123.123.13', 'rua da casa 3', '6599434343'));
$clientes->addCliente(new Cliente(4,'Teste 4','123.123.123.14', 'rua da casa 4', '6599434343'));
$clientes->addCliente(new Cliente(6,'Teste 6','123.123.123.16', 'rua da casa 6', '6599434343'));
$clientes->addCliente(new Cliente(5,'Teste 5','123.123.123.15', 'rua da casa 5', '6599434343'));
$clientes->addCliente(new Cliente(7,'Teste 7','123.123.123.17', 'rua da casa 7', '6599434343'));
$clientes->addCliente(new Cliente(1,'Teste 1','123.123.123.11', 'rua da casa 1', '6599434343'));
$clientes->addCliente(new Cliente(9,'Teste 9','123.123.123.19', 'rua da casa 9', '6599434343'));
$clientes->addCliente(new Cliente(10,'Teste 10','123.123.123.10', 'rua da casa 10', '6599434343'));

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
                <th>Cpf</th>
                <th>Endereço</th>
                <th>Telefone</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($clientes->allClientes() as $key => $cliente): ?>
            <tr>
                <td><?php echo $cliente->id; ?></td>
                <td><?php echo $cliente->nome; ?></td>
                <td><?php echo $cliente->cpf; ?></td>
                <td><?php echo $cliente->endereco; ?></td>
                <td><?php echo $cliente->telefone; ?></td>
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
            <div class="panel-heading">Informações do Cliente : <?php echo $cli->nome; ?></div>
            <div class="panel-body">
                <p><strong>Id :</strong> <?php echo $cli->id; ?></p>
                <p><strong>Nome : </strong><?php echo $cli->nome; ?></p>
                <p><strong>CPF: </strong><?php echo $cli->cpf; ?></p>
                <p><strong>Endereço :</strong> <?php echo $cli->endereco; ?></p>
                <p><strong>Telefone :</strong> <?php echo $cli->telefone; ?></p>
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