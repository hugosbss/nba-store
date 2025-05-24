<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit;
}

$con = new mysqli("localhost", "root", "", "nb_store");
if ($con->connect_error) {
    die("Erro de conexão: " . $con->connect_error);
}

$sql = "SELECT v.id, v.data_venda, p.nome AS produto_nome, vi.quantidade
        FROM vendas v
        JOIN vendas_itens vi ON v.id = vi.venda_id
        JOIN produtos p ON vi.produto_id = p.id";

$parametroBusca = '';
if (isset($_GET['produto']) && !empty($_GET['produto'])) {
    $parametroBusca = $_GET['produto'];
    $sql .= " WHERE p.nome LIKE '%" . $con->real_escape_string($parametroBusca) . "%'";
}

$sql .= " ORDER BY v.data_venda DESC, v.id DESC";

$resultado = $con->query($sql);

$vendas = [];
if ($resultado && $resultado->num_rows > 0) {
    while ($linha = $resultado->fetch_assoc()) {
        $vendas[] = $linha;
    }
}
$con->close();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>ADMIN - Vendas</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
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
    <h1 class="mb-4">📄 Vendas Realizadas</h1>

    <form method="GET" class="mb-4 d-flex flex-column flex-sm-row gap-2 align-items-start align-items-sm-center">
        <label for="produto" class="form-label mb-1 mb-sm-0">Buscar por produto vendido:</label>
        <input type="text" id="produto" name="produto" class="form-control" placeholder="Ex: Camiseta" value="<?= isset($_GET['produto']) ? $_GET['produto'] : '' ?>">
        <button type="submit" class="btn btn-primary">Buscar</button>
    </form>


    <div class="table-responsive">
    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>ID Venda</th>
                <th>Data da Venda</th>
                <th>Produto</th>
                <th>Quantidade</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($vendas)): ?>
                <?php foreach ($vendas as $venda): ?>
                    <tr>
                        <td><?= $venda['id'] ?></td>
                        <td><?= $venda['data_venda'] ?></td>
                        <td><?= $venda['produto_nome'] ?></td>
                        <td><?= $venda['quantidade'] ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="4" class="text-center">Nenhuma venda encontrada.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
    </div>
</body>
</html>