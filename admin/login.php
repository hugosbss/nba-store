<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];
    // Exemplo simples, substitua por consulta ao banco
    if ($usuario === 'admin' && $senha === '1234') {
        $_SESSION['admin'] = true;
        header('Location: dashboard.php');
        exit;
    } else {
        $erro = "Usuário ou senha inválidos!";
    }
}
?>
<form method="post">
    <input type="text" name="usuario" placeholder="Usuário">
    <input type="password" name="senha" placeholder="Senha">
    <button type="submit">Entrar</button>
    <?php if (isset($erro)) echo "<p>$erro</p>"; ?>
</form>