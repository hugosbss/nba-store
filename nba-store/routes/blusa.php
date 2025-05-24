<?php include_once __DIR__ . '/../database/banco.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>🏀 NB STORE - Blusas</title>
  <link rel="stylesheet" href="/nba-store/style.css">
</head>
<body>
  <header>
    <div class="logo"><a href="/nba-store/index.php" style="color: inherit; text-decoration: none;">🏀 NB STORE</a></div>
    <div class="search-bar">
      <form action="/nba-store/routes/pesquisa.php" method="GET">
        <input type="text" name="nome" placeholder="Buscar produtos..." required>
        <button type="submit">🔍</button>
      </form>
    </div>
        <div class="cart">
        <a href="/nba-store/carrinho.php" style="color: inherit; text-decoration: none;">
            🛒 <span id="cart-count"><?= $totalItens ?></span>
        </a>
    </div>
  </header>

    <section class="products">
    <div class="product-list">
      <?php
      $result = $con->query(" SELECT p.* FROM produtos p JOIN categorias c ON p.categoria_id = c.id WHERE LOWER(c.nome) = 'blusas'");
      while ($row = $result->fetch_assoc()) {
        echo '
        <div class="product-item">
          <img src="/nba-store/images/' . $row['imagem'] . '" alt="' . $row['nome'] . '">
          <p>' . $row['nome'] . '</p>
          <p>R$ ' . number_format($row['preco'], 2, ',', '.') . '</p>
          <form method="POST" action="/nba-store/routes/adicionar.php">
              <input type="hidden" name="produto_id" value="' . $row['id'] . '">
              <input type="hidden" name="quantidade" value="1">
              <button class="buy-btn" type="submit">Comprar</button>
          </form>
        </div>';
      }
      ?>
    </div>
  </section>
</body>
</html>