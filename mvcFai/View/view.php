<?php

class View{

  // HEADER NAV
  public function render_header() {
    echo "
  <ul class='nav nav-pills'>
  <li class='nav-item'>
    <a class='nav-link active' aria-current='page' href='index.php'>Home</a>
  </li>
  <li class='nav-item'>
    <a class='nav-link' href='listagem_pedidos.php'>Pedidos</a>
  </li>
  <li class='nav-item'>
    <a class='nav-link' href='registra_itens.php'>Produtos</a>
  </li>
  <li class='nav-item'>
    <a class='nav-link' href='solicita_pedido.php'>Criar Pedidos</a>
  </li>
</ul>
    ";
  }

 // HEADER NAV

  
 public function render_listagemPe($results) { // PAGINA LISTAGEM_PEDIDOS.PHP
  echo "
  <ul class='nav nav-pills'>
  <li class='nav-item'>
    <a class='nav-link active' aria-current='page' href='index.php'>Home</a>
  </li>
  <li class='nav-item'>
    <a class='nav-link' href='listagem_pedidos.php'>Pedidos</a>
  </li>
  <li class='nav-item'>
    <a class='nav-link' href='registra_itens.php'>Produtos</a>
  </li>
  <li class='nav-item'>
    <a class='nav-link' href='solicita_pedido.php'>Criar Pedidos</a>
  </li>
</ul>
    ";

  echo "<div class='container mt-4'>";
  echo "<h2>Listagem de Pedidos</h2>";
  echo "<table class='table table-striped'>";


  echo "<thead>
	<tr>
	<th>ID Pedido</th>
	<th>ID Cliente</th>
	<th>Data</th>
  <th>Nome do Produto</th>
	</tr>
	</thead>";

  echo "<tbody>";

  $db = new Database();
  $conn = $db->connect();

  if ($conn) {
    try {
        $query = "SELECT p.id AS pedido_id, p.cliente_id, p.data_ocorrencia, i.produto AS nome_item, i.quantidade
            FROM pedido p
            JOIN itens_do_pedido i ON p.id = i.pedido_id
            ORDER BY p.id, i.id";
        $stmt = $conn->prepare($query); // Transforma o texto em um comando SQL
        $stmt->execute(); // Executa o comando SQL
        $results = $stmt->fetchAll(); // Captura o retorno do banco e converte para um array

        if ($results) {
            foreach ($results as $linha) {
                echo "<tr>
                    <td>" . htmlspecialchars($linha['pedido_id']) . "</td>
                    <td>" . htmlspecialchars($linha['cliente_id']) . "</td>
                    <td>" . htmlspecialchars($linha['data_ocorrencia']) . "</td>
                    <td>" . htmlspecialchars($linha['nome_item']) . "</td>
                    <td>" . htmlspecialchars($linha['quantidade']) . "</td>
                </tr>";
            }
        } else {
            echo "Nenhum pedido cadastrado";
        }
    } catch (PDOException $e) {
        echo "Erro na consulta: " . $e->getMessage();
    }
} else {
    echo "Falha na conexão.";
}

}// PAGINA LISTAGEM_PEDIDOS.PHP

public function form_solicitaPedi($conn) { // PAGINA SOLICITA_PEDIDOS.PHP

  echo "
  <ul class='nav nav-pills'>
  <li class='nav-item'>
    <a class='nav-link active' aria-current='page' href='index.php'>Home</a>
  </li>
  <li class='nav-item'>
    <a class='nav-link' href='listagem_pedidos.php'>Pedidos</a>
  </li>
  <li class='nav-item'>
    <a class='nav-link' href='registra_itens.php'>Produtos</a>
  </li>
  <li class='nav-item'>
    <a class='nav-link' href='solicita_pedido.php'>Criar Pedidos</a>
  </li>
</ul>
    ";

  echo "<div class='container mt-4'>";

  echo "<h2>Registrar um Novo Pedido</h2>";
  echo "<form method='post' action=''>";
  echo "<div class='form-group'>";
  echo "<label for='item_pedido'>Nome do Produto:</label>";
  echo "<input type='text' class='form-control' id='nome_item' name='nome_item' required>";
  echo "</div>";
  echo "<div class='form-group'>";
  echo "<label for='quantidade'>Quantidade:</label>";
  echo "<input type='number' class='form-control' id='quantidade' name='quantidade' min='1' required>";
  echo "</div>";
  echo "<div class='form-group'>";
  echo "<label for='id_cliente'>ID cliente:</label>";
  echo "<input type='text' class='form-control' id='id_cliente' name='idDocliente' required>";
  echo "</div>";
  echo "<button type='submit' name='btn-registrapedidos' class='btn btn-primary'>Adicionar Produto</button>";
  echo "</form>";


  if(isset($_POST['btn-registrapedidos'])){
    if(isset($_POST["nome_item"]) && isset($_POST["quantidade"]) && isset($_POST["id_cliente"])){
        $nameItem = $_POST["nome_item"];
        $qteItem = $_POST["quantidade"];
        $idCliente = $_POST["id_cliente"];

  if($conn){
    try{
      $query = "INSERT INTO pedido (cliente_id, data_ocorrencia) VALUES (:idCliente, CURDATE())";
      $stmt = $conn->prepare($query);
      $stmt->bindParam(':idCliente', $idCliente);
      $stmt->execute();

      $pedidoId = $conn->lastInsertId();
      
      $query_itens = "INSERT INTO itens_do_pedido (pedido_id, produto, quantidade) VALUES (:pedidoId, :itemNome, :qteItens)";
     
      $stmt_itens = $conn->prepare($query_itens);
      $stmt_itens->bindParam(':pedidoId', $pedidoId);
      $stmt_itens->bindParam(':itemNome', $nameItem);
      $stmt_itens->bindParam(':qteItens', $qteItem);
      $stmt_itens->execute();

      echo "Produto cadastrado com sucesso! <br>";
                echo "<a href='solicita_pedido.php'>Ir para a pagina de solicitar pedido</a>";
    }catch (PDOException $e) {
      echo "Erro: " . $e->getMessage();
    }
  }  else {
    echo "Falha na conexão.";   
  }
}else {
echo "Campos do formulário não foram preenchidos.";
}
}
  
}// PAGINA SOLICITA_PEDIDOS.PHP

    public function form_RegistraItens(){// PAGINA REGISTRA_ITENS.PHP
      echo "
      <ul class='nav nav-pills'>
      <li class='nav-item'>
        <a class='nav-link active' aria-current='page' href='index.php'>Home</a>
      </li>
      <li class='nav-item'>
        <a class='nav-link' href='listagem_pedidos.php'>Pedidos</a>
      </li>
      <li class='nav-item'>
        <a class='nav-link' href='registra_itens.php'>Produtos</a>
      </li>
      <li class='nav-item'>
        <a class='nav-link' href='solicita_pedido.php'>Criar Pedidos</a>
      </li>
    </ul>
        ";


      echo "<div class='container mt-4'>";

      echo "<h2>Registrar Novo Produto</h2>";
      echo "<form method='post' action=''>";
      echo "<div class='form-group'>";
      echo "<label for='nome_item'>Nome do Produto:</label>";
      echo "<input type='text' class='form-control' id='nome_item' name='nome_item' required>";
      echo "</div>";
      echo "<div class='form-group'>";
      echo "<label for='quantidade'>Quantidade:</label>";
      echo "<input type='number' class='form-control' id='quantidade' name='quantidade' min='1' required>";
      echo "</div>";
      echo "<button type='submit' name='btn-registrapedido' class='btn btn-primary'>Adicionar Produto</button>";
      echo "</form>";
      
      echo "<h2 class='mt-4'>Lista de Produtos</h2>";
      echo "<table class='table table-bordered'>";
      echo "<thead>";
      echo "<tr>";
      echo "<th>ID</th>";
      echo "<th>Nome do Produto</th>";
      echo "<th>Quantidade</th>";
      echo "</tr>";
      echo "</thead>";
      echo "<tbody>";

      $db = new Database();
      $conn = $db->connect();
    
      if ($conn) {
        try {
            $query = "SELECT * FROM `produto` ORDER BY `id`, `nome_item`, `quantidade`";
            $stmt = $conn->prepare($query); // Transforma o texto em um comando SQL
            $stmt->execute(); // Executa o comando SQL
            $results = $stmt->fetchAll(); // Captura o retorno do banco e converte para um array
    
            if ($results) {
                foreach ($results as $linha) {
                    echo "<tr>
                        <td>" . htmlspecialchars($linha['id']) . "</td>
                        <td>" . htmlspecialchars($linha['nome_item']) . "</td>
                        <td>" . htmlspecialchars($linha['quantidade']) . "</td>
                        </tr>";
                }
            } else {
                echo "Nenhum pedido cadastrado";
            }
        } catch (PDOException $e) {
            echo "Erro na consulta: " . $e->getMessage();
        }
    } else {
        echo "Falha na conexão.";
    } //CONEXÃO DO BANCO DE DADOS, MOSTRANDO A LISTA DE PRODUTOS

    echo "</tbody>";
    echo "</table>";
    echo "</div>";

    if(isset($_POST['btn-registrapedido'])){
        if(isset($_POST["nome_item"]) && isset($_POST["quantidade"])){
            $nameItem = $_POST["nome_item"];
            $qteItem = $_POST["quantidade"];

      if($conn){
        try{
          $query = "INSERT INTO produto (nome_item, quantidade) VALUES (:itemNome, :qteItens)";
          $stmt = $conn->prepare($query);
          $stmt->bindParam(':itemNome', $nameItem);
          $stmt->bindParam(':qteItens', $qteItem);
          $stmt->execute();

          echo "Produto cadastrado com sucesso! <br>";
                    echo "<a href='registra_itens.php'>Voltar para a lista de produtos</a>";
        }catch (PDOException $e) {
          echo "Erro: " . $e->getMessage();
        }
      }  else {
        echo "Falha na conexão.";   
      }
 }else {
  echo "Campos do formulário não foram preenchidos.";
}
}//CADASTRAR NOVO PRODUTO NO BANCO DE DADOS


    }// PAGINA REGISTRA_ITENS.PHP


}

?>