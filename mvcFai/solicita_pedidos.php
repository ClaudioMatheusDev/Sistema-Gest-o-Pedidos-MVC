<?php
require '../Model/model.php';
require '../Controller/controller.php';

$database = new Database();
$pdo = $database->connect();

$controller = new Controller($pdo);



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cliente_id = $_POST['cliente_id'];
    $data_ocorrencia = $_POST['data_ocorrencia'];
    $controller->model->criarPedido($cliente_id, $data_ocorrencia);
    echo "<div class='alert alert-success' role='alert'>Pedido registrado com sucesso!</div>";
}


// Exibe o formulário de solicitação de pedido
$clientes = $controller->model->listarClientes();


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
        $view->renderiza_form_solicita_pedido($clientes);
        ?>
    </div>
    </body>
</html>