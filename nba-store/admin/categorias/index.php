<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit;
}

$con = new mysqli("localhost", "root", "", "nb_store");

$sql = "SELECT * FROM categorias";
$resultado = $con->query($sql);

$categorias = [];
if ($resultado->num_rows > 0) {
    while ($linha = $resultado->fetch_assoc()) {
        $categorias[] = $linha;
    }
}
$con->close();

if (isset($_GET['nome']) && !empty($_GET['nome'])) {
    $nomeBuscado = $_GET['nome'];
    $categorias = array_filter($categorias, function ($categoria) use ($nomeBuscado) {
        return stripos($categoria['nome'], $nomeBuscado) !== false;
    });
    $categorias = array_values($categorias);
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>ADMIN - Categorias</title>
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
            <input type="text" name="nome" placeholder="Buscar produtos...">
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
    <h1 class="mb-4">📂 Categorias</h1>

    <form method="GET" class="mb-4 d-flex flex-column flex-sm-row gap-2 align-items-start align-items-sm-center">
        <label for="nome" class="form-label mb-1 mb-sm-0">Buscar por nome:</label>
        <input type="text" id="nome" name="nome" class="form-control" placeholder="Ex: Camisetas" value="<?= isset($_GET['nome']) ? $_GET['nome'] : '' ?>">
        <button type="submit" class="btn btn-primary">Buscar</button>
        <a href="cadastrar.php" class="btn btn-success">Cadastrar Nova Categoria</a>
    </form>

    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (count($categorias) > 0) {
                foreach ($categorias as $categoria) {
                    echo "<tr>";
                    echo "<td>{$categoria['id']}</td>";
                    echo "<td>{$categoria['nome']}</td>";
                    echo "<td>{$categoria['descricao']}</td>";
                    echo "<td>
                        <a href='editar.php?id={$categoria['id']}' class='btn btn-warning btn-sm'>✏️ Editar</a>
                        <a href='excluir.php?id={$categoria['id']}' class='btn btn-danger btn-sm' onclick='return confirm(\"Tem certeza que deseja excluir esta categoria?\")'>🗑 Excluir</a>
                    </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4' class='text-center'>Nenhuma categoria encontrada.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>
</body>
</html>