
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>🏀 NB STORE - Tênis</title>
  <link rel="stylesheet" href="/nba-store/style.css">
</head>
<body>
  <header>
    <div class="logo">🏀 NB STORE</div>
    <div class="search-bar">
      <input type="text" placeholder="Buscar produtos...">
      <button type="submit">🔍</button>
    </div>
    <div class="cart">🛒 CARRINHO</div>
  </header>

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
    <div class="product-list">
      <div class="product-item">
        <img src="/nba-store/images/bermuda4.png" alt="Bermuda 1">
        <p>Bermuda NBA</p>
        <p>R$ 80,00</p>
        <button class="buy-btn" onclick="adicionarCarrinho('Bermuda NBA', 80)">Comprar</button>
      </div>
      <div class="product-item">
        <img src="/nba-store/images/bermuda5.png" alt="Bermuda 2">
        <p>Bermuda Street</p>
        <p>R$ 90,00</p>
        <button class="buy-btn" onclick="adicionarCarrinho('Bermuda Street', 90)">Comprar</button>
      </div>
      <div class="product-item">
        <img src="/nba-store/images/bermuda5.webp" alt="Bermuda 3">
        <p>Bermuda Casual</p>
        <p>R$ 100,00</p>
        <button class="buy-btn" onclick="adicionarCarrinho('Bermuda Casual', 100)">Comprar</button>
      </div>
      <div class="product-item">
        <img src="/nba-store/images/bermudaC.png" alt="Bermuda 4">
        <p>Bermuda Esportiva</p>
        <p>R$ 110,00</p>
        <button class="buy-btn" onclick="adicionarCarrinho('Bermuda Esportiva', 110)">Comprar</button>
      </div>
      <div class="product-item">
        <img src="/nba-store/images/bermudaC2.webp" alt="Bermuda 5">
        <p>Bermuda de Praia</p>
        <p>R$ 120,00</p>
        <button class="buy-btn" onclick="adicionarCarrinho('Bermuda de Praia', 120)">Comprar</button>
    </div>
  </section>
</body>
</html>