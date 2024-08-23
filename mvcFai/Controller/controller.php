<?php
require './Model/model.php';
require './View/view.php';

class Controller {
    public $model;

    public function __construct($pdo) {
        $this->model = new Model($pdo);
    }


    public function listagem_pedidos() {
        return $this->model->listarPedidos();
    }

    public function criarPedido($cliente_id, $data_ocorrencia) {
        $this->model->criarPedido($cliente_id, $data_ocorrencia);
    }

    public function adicionarItem($produto, $quantidade) {
        $this->model->adicionarItem($produto, $quantidade);
    }
}
?>
