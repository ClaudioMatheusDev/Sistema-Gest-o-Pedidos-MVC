<?php
include "./Controller/controller.php";
$controlador = new Controller();



?>
<html>
    <head>  
        <!-- Compiled and minified CSS -->
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap JS, Popper.js, e jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="CSS/styles.css">
    </head>
    <body>



        <div class="container">
            <?php 
                $controlador->monta_home();
            ?>
            
        </div>
    </body>
</html>