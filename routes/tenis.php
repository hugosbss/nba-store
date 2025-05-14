<?php
    $con = new mysqli("localhost", "root", "", "nb_store");
      $produtos = $con->real_escape_string($_GET['nome']);
      $sql = "SELECT * FROM produtos";
      $resultado = $con->query($sql);

      if ($resultado->num_rows > 0) {
        foreach ($resultado as $linha) {
          echo "<tr>
                <td>" . $linha['nome'] . "</td>
                <td>" . $linha['preco'] . "</td>
                </tr>";
              }
        } else {
          echo "Nenhum resultado encontrado";
        }
      $con->close();            
  ?>
    <section class="products">
        <h2>TÊNIS</h2>
        <div class="product-list">
        <div class="product-item">
            <img src="/nba-store/images/tenis1.png" alt="Tênis 1">
            <p>Nome do Produto 1</p>
            <p>R$ 100,00</p>
        </div>
        <div class="product-item">
            <img src="/nba-store/images/tenis2.webp" alt="Tênis 2">
            <p>Nome do Produto 2</p>
            <p>R$ 120,00</p>
        </div>
        <div class="product-item">
            <img src="/nba-store/images/tenis3.png" alt="Tênis 3">
            <p>Nome do Produto 3</p>
            <p>R$ 150,00</p>
        </div>
        <div class="product-item">
            <img src="/nba-store/images/tenis4.png" alt="Tênis 4">