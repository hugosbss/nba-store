<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - NB STORE</title>
    <link rel="stylesheet" href="/nba-store/style.css">
    <link rel="stylesheet" href="/nba-store/admin/estilo.css">
    <style>
        .dashboard-content {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
            padding: 20px;
        }
        .stat-card {
            background-color: #f4f4f4;
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 20px;
            text-align: center;
            width: 200px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .stat-card:hover {
            background-color: #e0e0e0;
        }
        .stat-card a {
            text-decoration: none;
            color: inherit;
            display: block;
        }
    </style>
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

<main class="dashboard-content">
    <a href="/nba-store/admin/vendas/index.php" class="stat-card">
        <h2>Vendas 💲</h2>
    </a>

    <a href="/nba-store/admin/produtos/index.php" class="stat-card">
        <h2>Produtos 🧾</h2>
    </a>

    <a href="/nba-store/admin/categorias/index.php" class="stat-card">
        <h2> Categorias 🔍</h2>
    </a>
</main>
</body>
</html>