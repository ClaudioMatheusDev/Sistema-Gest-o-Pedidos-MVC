<?php
require '../src/Model.php';
require '../src/Controller.php';

include('conexao_bd.php');

$controlador = new Controller();

$database = new Database();
$pdo = $database->connect();

?>
<html>
    <head>  
        <!-- Compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

        <!-- Compiled and minified JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
         
    </head>
    <body>
     <div class="container mt-4">
        <?php
        require '../View/view.php';
        $view = new View();
        $view->renderiza_tabela_pedidos($pedidos);
        ?>
    </div>
    </body>
</html>