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
        <h2>BERMUDAS</h2>
        <div class="product-list">
        <div class="product-item">
            <img src="/nba-store/images/bermuda1.png" alt="Bermuda 1">
            <p>Nome do Produto 1</p>
            <p>R$ 100,00</p>
        </div>
        <div class="product-item">
            <img src="/nba-store/images/bermuda2.png" alt="Bermuda 2">
            <p>Nome do Produto 2</p>
            <p>R$ 120,00</p>
        </div>
        <div class="product-item">
            <img src="/nba-store/images/bermuda3.png" alt="Bermuda 3">
            <p>Nome do Produto 3</p>
            <p>R$ 150,00</p>
        </div>
        <div class="product-item">
            <img src="/nba-store/images/bermuda4.png" alt="Bermuda 4">
            <p>Nome do Produto 4</p>
            <p>R$ 130,00</p>
        </div>
        <div class="product-item">
            <img src="/nba-store/images/bermuda5.png" alt="Bermuda 5">
            <p>Nome do Produto 5</p>
            <p>R$ 140,00</p>
        </div>