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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['acao'])) {
        if ($_POST['acao'] === 'selecionar' && !empty($_POST['categoria_existente'])) {
            header('Location: editar.php?id=' . $_POST['categoria_existente']);
            exit;
        }

        if ($_POST['acao'] === 'criar') {
            $id = $_POST['id'];
            $nome = $_POST['nome'];
            $descricao = $_POST['descricao'];
            $sql = "INSERT INTO categorias (id, nome, descricao) VALUES ('$id', '$nome', '$descricao')";
            $con->query($sql);
            header('Location: index.php');
            exit;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Categoria</title>
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
    <h1 class="mb-4">➕ Nova Categoria</h1>

    <form method="post" class="mb-3">
        <div class="mb-3">
            <label for="categoria_existente" class="form-label">Selecionar categoria existente:</label>
            <select id="categoria_existente" name="categoria_existente" class="form-select">
                <option value="">Selecione...</option>
                <?php foreach ($categorias as $categoria) { ?>
                    <option value="<?= $categoria['id'] ?>"><?= $categoria['nome'] ?></option>
                <?php } ?>
            </select>
        </div>
        <button type="submit" name="acao" value="selecionar" class="btn btn-primary mb-3">Editar Categoria Selecionada</button>
    </form>

    <form method="post">
        <div class="mb-3">
            <label for="id" class="form-label">ID da Categoria</label>
            <input type="number" class="form-control" id="id" name="id" required>
        </div>

        <div class="mb-3">
            <label for="nome" class="form-label">Nome da Categoria</label>
            <input type="text" class="form-control" id="nome" name="nome" required>
        </div>

        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <textarea class="form-control" id="descricao" name="descricao" rows="3" required></textarea>
        </div>

        <button type="submit" name="acao" value="criar" class="btn btn-success">Salvar Nova Categoria</button>
        <a href="index.php" class="btn btn-secondary">Voltar</a>
    </form>
</div>

</body>
</html>