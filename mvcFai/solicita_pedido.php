<?php
include "./Controller/controller.php";
$controlador = new Controller();

include_once('conexao_bd.php');

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
        <div class="container">
            <?php 
                $controlador->form_solicitaPedid();
            ?>
            
        </div>
    </body>
</html>
