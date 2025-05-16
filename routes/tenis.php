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

<script>
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