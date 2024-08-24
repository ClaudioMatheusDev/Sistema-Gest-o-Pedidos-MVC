<?php
class Model{

    public function listarPedidos() {
        $stmt = $this->pdo->prepare("SELECT p.id, c.nome, p.data_ocorrencia FROM pedido p JOIN cliente c ON p.cliente_id = c.id");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}
?>