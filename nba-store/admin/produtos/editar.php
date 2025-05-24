<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header('Location: ../../login.php');
    exit;
}

include("../../database/banco.php");

$id = @$_GET['id'];

if (!$id) {
    echo "ID da categoria não fornecido.";
    exit;
}

$sql = "SELECT * FROM produtos WHERE id = '$id'";
$resultado = $con->query($sql);

if ($resultado->num_rows == 0) {
    echo "Categoria não encontrada.";
    exit;
}

$produto = $resultado->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Editar Produto - <?= $produto['nome'] ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
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
            <a href="/nba-store/nba-store/carrinho.php" style="color:inherit;text-decoration:none;">
                🛒 <span id="cart-count">0</span>
            </a>
        </div>
    </header>

    <div class="admin-container">
        <h1 class="mb-4">Editar Produto: <?= $produto['nome'] ?></h1>

        <form action="editar_salvar.php" method="post">
            <input type="hidden" name="id" value="<?= $produto['id'] ?>" />

            <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" id="nome" name="nome" class="form-control" value="<?= $produto['nome'] ?>" required />
            </div>

            <div class="mb-3">
                <label for="descricao" class="form-label">Descrição</label>
                <textarea id="descricao" name="descricao" class="form-control" rows="3" required><?= $produto['descricao'] ?></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Salvar Alterações</button>
            <a href="/nba-store/admin/produtos/index.php" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</body>
</html>