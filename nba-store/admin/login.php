<?php
session_start();

if (isset($_SESSION['admin'])) {
    header('Location: dashboard.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    if ($usuario === 'admin' && $senha === 'admin123') {
        $_SESSION['admin'] = true;
        header('Location: dashboard.php');
        exit;
    } else {
        $erro = "Usuário ou senha inválidos!";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - ADMIN 💼</title>
    <link rel="stylesheet" href="/nba-store/style.css">
    <link rel="stylesheet" href="/nba-store/admin/estilo.css">
    <style>
        body.admin {
            background: #f7f8fa;
        }
        .admin-container {
            max-width: 400px;
            margin: 60px auto;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 2px 16px rgba(0,0,0,0.10);
            padding: 36px 32px 28px 32px;
        }
        .admin-container h2 {
            margin-bottom: 28px;
            text-align: center;
            font-weight: 700;
        }
        .admin-container form {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 18px;
        }
        .admin-container input[type="text"],
        .admin-container input[type="password"] {
            width: 90%;
            max-width: 260px;
            padding: 8px 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            text-align: center;
        }
        .admin-container button {
            width: 90%;
            max-width: 260px;
            padding: 8px 0;
            border-radius: 5px;
            border: none;
            background: #007bff;
            color: #fff;
            font-weight: 600;
            font-size: 1rem;
            transition: background 0.2s;
        }
        .admin-container button:hover {
            background: #0056b3;
        }
        .erro-login {
            color: #d9534f;
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>
<body class="admin">

<div class="admin-container">
    <h2>Login de Administrador</h2>

    <form method="post">
        <input type="text" name="usuario" class="form-control" placeholder="Usuário" required>
        <input type="password" name="senha" class="form-control" placeholder="Senha" required>
        <button type="submit">Entrar</button>
        <?php if (isset($erro)) echo "<div class='erro-login'>$erro</div>"; ?>
    </form>
</div>

</body>
</html>