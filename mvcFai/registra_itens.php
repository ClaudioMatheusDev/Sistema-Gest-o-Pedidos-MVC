<?php
require '../Model/model.php';
require '../Controller/controller.php';

$database = new Database();
$pdo = $database->connect();

$controller = new Controller($pdo);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $produto = $_POST['produto'];
    $quantidade = $_POST['quantidade'];
    $controller->model->adicionarItem($produto, $quantidade);
    echo "<div class='alert alert-success' role='alert'>Item adicionado com sucesso!</div>";
}

$itens = $controller->model->listarItens();

?>
<html>
    <head>  
       <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    </head>
    <body>
    <div class="container mt-4">
        <?php
        require '../View/view.php';
        $view = new View();
        $view->renderiza_tabela_itens($itens);
        ?>
    </div>
    </body>
</html>