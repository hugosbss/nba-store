<?php
session_start();

if (!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = [];
}

$con = new mysqli("localhost", "root", "", "nb_store");
$result = $con->query("SELECT * FROM produtos");
$produtos = $result->fetch_all(MYSQLI_ASSOC);
$con->close();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['produto_id'])) {
    $produtoId = (int) $_POST['produto_id'];
    $encontrado = false;
    foreach ($_SESSION['carrinho'] as &$item) {
        if ($item['produto_id'] == $produtoId) {
            $item['quantidade']++;
            $encontrado = true;
            break;
        }
    }
    if (!$encontrado) {
        $_SESSION['carrinho'][] = [
            "produto_id" => $produtoId,
            "quantidade" => 1
        ];
    }
    header("Location: index.php?msg=added");
    exit();
}

$totalItens = array_reduce($_SESSION['carrinho'], fn($soma, $item) => $soma + $item['quantidade'], 0);
$msg = $_GET['msg'] ?? null;
?>

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
    <div class="logo">
        <a href="/nba-store/index.php" style="color: inherit; text-decoration: none;">🏀 NB STORE</a>
    </div>
    <div class="search-bar">
        <form action="/nba-store/routes/pesquisa.php" method="GET">
            <input type="text" name="nome" placeholder="Buscar produtos..." required>
            <button type="submit">🔍</button>
        </form>
    </div>
    <div class="admin-login">
        <a href="/nba-store/admin/login.php" class="login-btn" style="color: inherit; text-decoration: none; margin-right: 20px;">
            🔑 Login
        </a>
    </div>
    <div class="cart">
        <a href="/nba-store/carrinho.php" style="color: inherit; text-decoration: none;">
            🛒 <span id="cart-count"><?= $totalItens ?></span>
        </a>
    </div>
</header>

<section class="carousel">
    <div class="carousel-slide">
        <img src="/nba-store/images/bannerbrooklynnets.png" alt="Banner Brooklyn Nets">
        <img src="/nba-store/images/bannerlakers.png" alt="Banner Lakers">
        <img src="/nba-store/images/bannerceltics.png" alt="Banner Celtics">
    </div>
    <button class="prev" onclick="moveSlide(-1)">&#10094;</button>
    <button class="next" onclick="moveSlide(1)">&#10095;</button>
</section>

<section class="categories">
    <?php
    $categorias = [
        ["blusa", "blusa.webp", "Ver Blusas"],
        ["camiseta", "camiseta9.png", "Ver Camisetas"],
        ["bermuda", "bermuda4.png", "Ver Bermudas"],
        ["tenis", "tenis2.webp", "Ver Tênis"]
    ];
    foreach ($categorias as [$rota, $imagem, $texto]):
    ?>
        <div class="product-item">
            <img src="/nba-store/images/<?= $imagem ?>" alt="<?= ucfirst($rota) ?>">
            <a href="/nba-store/routes/<?= $rota ?>.php" class="buy-btn"><?= $texto ?></a>
        </div>
    <?php endforeach; ?>
</section>

<section class="products">
    <div class="product-list">
        <?php foreach ($produtos as $produto): ?>
            <div class="product-item">
                <img src="/nba-store/images/<?= $produto['imagem'] ?>" alt="<?= $produto['nome'] ?>">
                <p><?= $produto['nome'] ?></p>
                <p>R$ <?= number_format($produto['preco'], 2, ',', '.') ?></p>
                <form method="POST" action="/nba-store/routes/adicionar.php">
                    <input type="hidden" name="produto_id" value="<?= $produto['id'] ?>">
                    <input type="hidden" name="quantidade" value="1">
                    <button class="buy-btn" type="submit">Comprar</button>
                </form>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<script>
    let currentSlide = 0;
    const slides = document.querySelectorAll('.carousel-slide img');

    function showSlide(index) {
        slides.forEach((img, i) => img.style.display = i === index ? 'block' : 'none');
    }

    function moveSlide(direction) {
        currentSlide = (currentSlide + direction + slides.length) % slides.length;
        showSlide(currentSlide);
    }

    document.addEventListener('DOMContentLoaded', () => showSlide(currentSlide));
</script>

</body>
</html>