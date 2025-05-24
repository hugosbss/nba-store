<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header('Location: /nba-store/admin/login.php');
    exit;
}

include("../../database/banco.php");

$categorias = [];
$sql = "SELECT id, nome FROM categorias";
$result = $con->query($sql);
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $categorias[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Produto</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/nba-store/style.css">
    <link rel="stylesheet" href="/nba-store/admin/estilo.css">
</head>
<body class="admin">

<header>
    <div class="logo">
        <a href="/nba-store/admin/dashboard.php" style="color: inherit; text-decoration: none;">
            🏀 Dashboard - administrativo
        </a>
    </div>
    <div class="search-bar">
        <form action="/nba-store/routes/pesquisa.php" method="GET">
            <input type="text" name="nome" placeholder="Buscar produtos..." required>
            <button type="submit">🔍</button>
        </form>
    </div>
    <div class="admin-actions">
        <a href="/nba-store/admin/dashboard.php" class="login-btn" style="color: inherit; text-decoration: none; margin-right: 20px;">
            📊 Dashboard
        </a>
        <a href="/nba-store/admin/logout.php" class="login-btn" style="color: inherit; text-decoration: none; margin-right: 20px;">
            🚪 Logout
        </a>
    </div>
    <div class="cart">
        <a href="/nba-store/carrinho.php" style="color:inherit;text-decoration:none;">
            🛒 <span id="cart-count">0</span>
        </a>
    </div>
</header>

<div class="admin-container">
    <h1 class="mb-4">➕ Novo Produto</h1>

    <form action="produto_novo_salvar.php" method="post" enctype="multipart/form-data" class="mb-3">

        <div class="mb-3">
            <label for="id" class="form-label">ID do Produto</label>
            <input type="number" class="form-control" id="id" name="id" required>
        </div>

        <div class="mb-3">
            <label for="nome" class="form-label">Nome do Produto</label>
            <input type="text" class="form-control" id="nome" name="nome" required>
        </div>

        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <textarea class="form-control" id="descricao" name="descricao" rows="3" required></textarea>
        </div>

        <div class="mb-3">
            <label for="preco" class="form-label">Preço</label>
            <input type="number" step="0.01" class="form-control" id="preco" name="preco" required>
        </div>

        <div class="mb-3">
            <label for="categoria_id" class="form-label">Categoria</label>
            <select class="form-control" id="categoria_id" name="categoria_id" required>
                <option value="">Selecione uma categoria</option>
                <?php foreach ($categorias as $c) { ?>
                    <option value="<?= $c['id'] ?>"><?= $c['nome'] ?></option>
                <?php } ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="imagem" class="form-label">Imagem do Produto</label>
            <input type="file" class="form-control" id="imagem" name="imagem" accept="image/*">
        </div>

        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="index.php" class="btn btn-secondary">Voltar</a>
    </form>
</div>

</body>
</html>