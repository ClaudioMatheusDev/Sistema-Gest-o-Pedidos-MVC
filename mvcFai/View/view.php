<?php

class View{

    public function render_header() {
        
        echo "
          <nav class='header'>
            <ul>
              <li><a href='index.php'>Home</a></li>
              <li><a href='listagem_pedidos.php'>Pedidos</a></li>
              <li><a href='registra_itens.php'>Produtos</a></li>
              <li><a href='solicita_pedido.php'>Criar Pedido</a></li>
            </ul>
          </nav>
        ";
      }

    public function render_listagemPe(){

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

    }

    public function form_solicitaPedi(){
      echo "<div class='container mt-4'>";
      echo "<h2>Solicitar Pedido</h2>";
      echo "<form method='post' action='solicita_pedido.php'>";
      echo "<div class='form-group'>";
      echo "<label for='cliente_id'>Cliente:</label>";
      echo "<select class='form-control' id='cliente_id' name='cliente_id' required>";
      echo "<option value=''>Selecione um cliente</option>";;
      echo "</select>";
      echo "</div>";
      echo "<div class='form-group'>";
      echo "<label for='data_ocorrencia'>Data da Ocorrência:</label>";
      echo "<input type='date' class='form-control' id='data_ocorrencia' name='data_ocorrencia' required>";
      echo "</div>";
      
      echo "<h4>Itens do Pedido</h4>";
      echo "<div id='itens-container'>";
      echo "<div class='form-group item'>";
      echo "<label for='produto_1'>Produto:</label>";
      echo "<input type='text' class='form-control' id='produto_1' name='itens[produto][]'>";
      echo "</div>";
      echo "<div class='form-group'>";
      echo "<label for='quantidade_1'>Quantidade:</label>";
      echo "<input type='number' class='form-control' id='quantidade_1' name='itens[quantidade][]' min='1'>";
      echo "</div>";
      echo "</div>";
    
      echo "<button type='submit' class='btn btn-primary'>Registrar Pedido</button>";
      echo "</form>";
      echo "</div>";
      

    }

    public function form_RegistraItens(){
      echo "<div class='container mt-4'>";
      echo "<h2>Registrar Novo Produto</h2>";
      echo "<form method='post' action='registra_produto.php'>";
      echo "<div class='form-group'>";
      echo "<label for='nome_item'>Nome do Produto:</label>";
      echo "<input type='text' class='form-control' id='nome_item' name='nome_item' required>";
      echo "</div>";
      echo "<div class='form-group'>";
      echo "<label for='quantidade'>Quantidade:</label>";
      echo "<input type='number' class='form-control' id='quantidade' name='quantidade' min='1' required>";
      echo "</div>";
      echo "<button type='submit' class='btn btn-primary'>Adicionar Produto</button>";
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


    }




}








?>