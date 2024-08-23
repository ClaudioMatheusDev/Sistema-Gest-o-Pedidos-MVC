<?php
class View {

    public function renderizador($string) {
        echo "<div class='container mt-4'>";
        echo "<h1>" . htmlspecialchars($string) . "</h1>";
        echo "</div>";
    }


    public function renderiza_tabela_pedidos($pedidos) {
        echo "<div class='container mt-4'>";
        echo "<h2>Listagem de Pedidos</h2>";
        echo "<table class='table table-striped'>";

        echo "<thead>
	<tr>
	<th>ID</th>
	<th>Cliente</th>
	<th>Data</th>
	</tr>
	</thead>";

        echo "<tbody>";
        foreach ($pedidos as $pedido) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($pedido['id']) . "</td>";
            echo "<td>" . htmlspecialchars($pedido['nome']) . "</td>";
            echo "<td>" . htmlspecialchars($pedido['data_ocorrencia']) . "</td>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
        echo "</div>";
    }

    public function renderiza_form_solicita_pedido($clientes) {
        echo "<div class='container mt-4'>";
        echo "<h2>Solicitar Pedido</h2>";
        echo "<form method='post'>";
        echo "<div class='form-group'>";
        echo "<label for='cliente_id'>Cliente:</label>";
        echo "<select class='form-control' id='cliente_id' name='cliente_id'>";
        foreach ($clientes as $cliente) {
            echo "<option value='" . htmlspecialchars($cliente['id']) . "'>" . htmlspecialchars($cliente['nome']) . "</option>";
        }
        echo "</select>";
        echo "</div>";
        echo "<div class='form-group'>";
        echo "<label for='data_ocorrencia'>Data da Ocorrência:</label>";
        echo "<input type='date' class='form-control' id='data_ocorrencia' name='data_ocorrencia' required>";
        echo "</div>";
        echo "<button type='submit' class='btn btn-primary'>Registrar Pedido</button>";
        echo "</form>";
        echo "</div>";
    }

    public function renderiza_tabela_itens($itens) {
        echo "<div class='container mt-4'>";
        echo "<h2>Itens Disponíveis</h2>";
        echo "<table class='table table-striped'>";
        echo "<thead><tr><th>ID</th><th>Produto</th><th>Quantidade</th></tr></thead>";
        echo "<tbody>";
        foreach ($itens as $item) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($item['id']) . "</td>";
            echo "<td>" . htmlspecialchars($item['produto']) . "</td>";
            echo "<td>" . htmlspecialchars($item['quantidade']) . "</td>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";

        echo "<h3>Adicionar Novo Item</h3>";
        echo "<form method='post'>";
        echo "<div class='form-group'>";
        echo "<label for='produto'>Produto:</label>";
        echo "<input type='text' class='form-control' id='produto' name='produto' required>";
        echo "</div>";
        echo "<div class='form-group'>";
        echo "<label for='quantidade'>Quantidade:</label>";
        echo "<input type='number' class='form-control' id='quantidade' name='quantidade' required>";
        echo "</div>";
        echo "<button type='submit' class='btn btn-primary'>Adicionar Item</button>";
        echo "</form>";
        echo "</div>";
    }
}
?>
