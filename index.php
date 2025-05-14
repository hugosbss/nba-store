<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>🏀 NB STORE</title>
  <link rel="stylesheet" href="style.css">
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

  <section class="carousel">
    <div class="carousel-slide">
      <img src="/nba-store/images/blusa.webp" alt="Blusa">
      <img src="/nba-store/images/camiseta9.png" alt="Camiseta">
      <img src="/nba-store/images/bermuda4.png" alt="Bermuda">
      <img src="/nba-store/images/tenis2.webp" alt="Tênis">
    </div>
    <button class="prev" onclick="moveSlide(-1)">&#10094;</button>
    <button class="next" onclick="moveSlide(1)">&#10095;</button>
  </section>

  <section class="categories">
    <a href="/routes/blusa.php">
      <div class="category-banner">BLUSAS
        <img src="/nba-store/images/blusa.webp" alt="Blusa" style="width:100%; height: 150px;">
      </div>
    </a>

    <a href="/routes/camiseta.php">
      <div class="category-banner">CAMISETAS
        <img src="/nba-store/images/camiseta9.png" alt="Camiseta" style="width:100%; height: 150px;">
      </div>
    </a>

    <a href="/routes/bermuda.php">
      <div class="category-banner">BERMUDAS
        <img src="/nba-store/images/bermuda4.png" alt="Bermuda" style="width:100%; height: 150px;">
      </div>
    </a>

    <a href="/routes/tenis.php">
      <div class="category-banner">
        <img src="/nba-store/images/tenis2.webp" alt="Tênis" style="width:100%; height:auto;">
      </div>
    </a>
  </section>

</body>
</html>