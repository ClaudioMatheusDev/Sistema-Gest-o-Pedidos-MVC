<?php
class Model {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function listarPedidos() {
        $stmt = $this->pdo->prepare("SELECT p.id, c.nome, p.data_ocorrencia FROM pedidos p JOIN clientes c ON p.cliente_id = c.id");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function listarClientes() {
        $stmt = $this->pdo->prepare("SELECT id, nome FROM clientes");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function listarItens() {
        $stmt = $this->pdo->prepare("SELECT id, produto, quantidade FROM itens");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function criarPedido($cliente_id, $data_ocorrencia) {
        $stmt = $this->pdo->prepare("INSERT INTO pedidos (cliente_id, data_ocorrencia) VALUES (:cliente_id, :data_ocorrencia)");
        $stmt->bindParam(':cliente_id', $cliente_id);
        $stmt->bindParam(':data_ocorrencia', $data_ocorrencia);
        $stmt->execute();
    }

    public function adicionarItem($produto, $quantidade) {
        $stmt = $this->pdo->prepare("INSERT INTO itens (produto, quantidade) VALUES (:produto, :quantidade)");
        $stmt->bindParam(':produto', $produto);
        $stmt->bindParam(':quantidade', $quantidade);
        $stmt->execute();
    }
}
?>
