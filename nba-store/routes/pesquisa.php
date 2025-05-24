<?php
session_start();
include_once __DIR__ . '/../database/banco.php';
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
    <div class="logo"> <a href="/nba-store/index.php" style="color: inherit; text-decoration: none;"> 🏀 NB STORE </a> </div>
    <div class="search-bar">
        <form action="pesquisa.php" method="GET">
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

<div>
    <a href="/nba-store/index.php" class="btn-voltar">Voltar ao Início</a>
</div>

<?php
$con = new mysqli("localhost", "root", "", "nb_store");

if (isset($_GET['nome'])) {
    $produto_nome = $con->real_escape_string($_GET['nome']);
    $sql = "
    SELECT p.* FROM produtos p
    JOIN categorias c ON p.categoria_id = c.id
    WHERE 
        p.nome LIKE '%$produto_nome%' 
        OR p.descricao LIKE '%$produto_nome%' 
        OR c.nome LIKE '%$produto_nome%' 
        OR c.descricao LIKE '%$produto_nome%'
    ";
    $resultado = $con->query($sql);
    if ($resultado->num_rows > 0) {

        echo "<div class='product-list'>";

        while ($linha = $resultado->fetch_assoc()) {
            ?>
            <div class='product-item'>
                <img src='/nba-store/images/<?= $linha['imagem'] ?>' alt='<?= $linha['nome'] ?>'>
                <p><?= $linha['nome'] ?></p>
                <p>R$ <?= number_format($linha['preco'], 2, ',', '.') ?></p>
                <form method="POST" action="/nba-store/routes/adicionar.php">
                    <input type="hidden" name="produto_id" value="<?= $linha['id'] ?>">
                    <input type="hidden" name="quantidade" value="1">
                    <button class="buy-btn" type="submit">Comprar</button>
                </form>
            </div>
            <?php
        }

        echo "</div>";
    } else {
        echo "<p>Nenhum produto encontrado para o termo de pesquisa '$produto_nome'.</p>";
    }
} else {
    echo "<p>Digite um termo de pesquisa para encontrar produtos.</p>";
}

$con->close();

?>

<script>
document.addEventListener('DOMContentLoaded', function() {
    <?php if (isset($_SESSION['carrinho'])): ?>
        document.getElementById('cart-count').textContent = <?= array_sum(array_column($_SESSION['carrinho'], 'quantidade')) ?>;
    <?php else: ?>
        document.getElementById('cart-count').textContent = 0;
    <?php endif; ?>
});
</script>

</body>
</html>