<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>🏀 NB STORE</title>
  <link rel="stylesheet" href="/nba-store/style.css">
</head>

<body>

  <header>
    <div class="logo"> <a href="/nba-store/index.php" style="color: inherit; text-decoration: none;"> 🏀 NB STORE </a> </div>
    <div class="search-bar">
      <form action="/nba-store/routes/pesquisa.php" method="GET">
        <input type="text" name="nome" placeholder="Buscar produtos..." required>
        <button type="submit">🔍</button>
      </form>
    </div>
    <div class="cart">
      <a href="/nba-store/carrinho.php" style="color:inherit;text-decoration:none;">
        🛒 <span id="cart-count">0</span>
      </a>
    </div>
  </header>

  <section class="carousel">
    <div class="carousel-slide">
      <img src="/nba-store/images/bannerbrooklynnets.png" alt="Baner Brooklyn Nets">
      <img src="/nba-store/images/bannerlakers.png" alt="Baner Los Angeles Lakers">
      <img src="/nba-store/images/bannerceltics.png" alt="Baner Boston Celtics">
    </div>
    <button class="prev" onclick="moveSlide(-1)">&#10094;</button>
    <button class="next" onclick="moveSlide(1)">&#10095;</button>
  </section>

  <section class="categories">
    <div class="product-item">
      <img src="/nba-store/images/blusa.webp" alt="Blusa">
      <a href="/nba-store/routes/blusa.php" class="buy-btn">Ver Blusas</a>
    </div>
    
    <div class="product-item">
      <img src="/nba-store/images/camiseta9.png" alt="Camiseta">
      <a href="/nba-store/routes/camiseta.php" class="buy-btn">Ver Camisetas</a>
    </div>
    
    <div class="product-item">
      <img src="/nba-store/images/bermuda4.png" alt="Bermuda">
      <a href="/nba-store/routes/bermuda.php" class="buy-btn">Ver Bermudas</a>
    </div>

    <div class="product-item">
      <img src="/nba-store/images/tenis2.webp" alt="Tênis 4">
      <a href="/nba-store/routes/tenis.php" class="buy-btn">Ver Tênis</a>
    </div>
  </section>

  <section class="products">
    <div class="product-list">
      <div class="product-item">
        <img src="/nba-store/images/tenis1.png" alt="Tênis 1">
        <p>Tênis Air Max</p>
        <p>R$ 100,00</p>
        <button class="buy-btn" onclick="adicionarCarrinho('Tênis Air Max', 100)">Comprar</button>
      </div>
      <div class="product-item">
        <img src="/nba-store/images/tenis2.webp" alt="Tênis 2">
        <p>Tênis NBA Pro</p>
        <p>R$ 120,00</p>
        <button class="buy-btn" onclick="adicionarCarrinho('Tênis NBA Pro', 120)">Comprar</button>
      </div>
      <div class="product-item">
        <img src="/nba-store/images/tenis3.png" alt="Tênis 3">
        <p>Tênis Jordan</p>
        <p>R$ 150,00</p>
        <button class="buy-btn" onclick="adicionarCarrinho('Tênis Jordan', 150)">Comprar</button>
      </div>
      <div class="product-item">
        <img src="/nba-store/images/tenis4.png" alt="Tênis 4">
        <p>Tênis Urban</p>
        <p>R$ 170,00</p>
        <button class="buy-btn" onclick="adicionarCarrinho('Tênis Urban', 170)">Comprar</button>
      </div>
    </div>
  </section>
  
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

  <script>
    let currentSlide = 0;
    const slides = document.querySelectorAll('.carousel-slide img');

    function showSlide(index) {
      slides.forEach((img, i) => {
        img.style.display = (i === index) ? 'block' : 'none';
      });
    }

    function moveSlide(direction) {
      currentSlide += direction;
      if (currentSlide < 0) currentSlide = slides.length - 1;
      if (currentSlide >= slides.length) currentSlide = 0;
      showSlide(currentSlide);
    }
    showSlide(currentSlide);

    function atualizarCarrinho() {
      const count = localStorage.getItem('cartCount') || 0;
      document.getElementById('cart-count').textContent = count;
    }
    function adicionarCarrinho(produto, preco) {
      let count = parseInt(localStorage.getItem('cartCount') || '0', 10);
      count++;
      localStorage.setItem('cartCount', count);
      atualizarCarrinho();

      let carrinho = JSON.parse(localStorage.getItem('carrinho') || '[]');
      carrinho.push({produto, preco});
      localStorage.setItem('carrinho', JSON.stringify(carrinho));
      alert(produto + " adicionado ao carrinho!");
    }
    document.addEventListener('DOMContentLoaded', atualizarCarrinho);
  </script>

</body>
</html>