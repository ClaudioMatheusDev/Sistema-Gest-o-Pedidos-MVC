<?php
require '../src/Model.php';
require '../src/Controller.php';

include('conexao_bd.php');

$database = new Database();
$pdo = $database->connect();

$controller = new Controller($pdo);
$controller->index();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Menu Principal</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href=".css/styles.css">
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Mecânica CL</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link active" aria-current="page" href="listagem_pedidos.php">Listar Pedidos</a>
        <a class="nav-link" href="solicita_pedido.php">Solicitar Novo Pedido</a>
        <a class="nav-link" href="registra_itens.php">Registrar Itens</a>
      </div>
    </div>
  </div>
</nav>




</body>
</html>
