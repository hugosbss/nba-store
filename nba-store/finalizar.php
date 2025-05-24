<?php
session_start();
$con = new mysqli("localhost", "root", "", "nb_store");

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nome_cliente'])) {
    $data_venda = date("Y-m-d");
    $nome = $_POST['nome_cliente'];
    $carrinho = $_SESSION['carrinho'];
    $total = 0;

    foreach ($carrinho as $item) {
        $id = (int)$item['produto_id'];
        $qtd = (int)$item['quantidade'];
        $res = $con->query("SELECT preco FROM produtos WHERE id = $id");
        $preco = $res->fetch_assoc()['preco'];
        $total += $preco * $qtd;
    }

    $con->query("INSERT INTO vendas (data_venda, total) VALUES ('$data_venda', $total)");
    $venda_id = $con->insert_id;

    foreach ($carrinho as $item) {
        $id = (int)$item['produto_id'];
        $qtd = (int)$item['quantidade'];
        $res = $con->query("SELECT preco FROM produtos WHERE id = $id");
        $preco = $res->fetch_assoc()['preco'];
        $con->query("INSERT INTO vendas_itens (venda_id, produto_id, quantidade, preco) VALUES ($venda_id, $id, $qtd, $preco)");
    }

    $_SESSION['carrinho'] = [];
    $mensagem = "$nome, sua compra foi realizada com sucesso!";
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Compra Finalizada</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="admin">
    <div class="admin-container text-center mt-5">
        <h2>Obrigado pela sua compra! 🏀</h2>
        <?php if (isset($mensagem)) echo "<p class='mt-3 alert alert-success'>$mensagem</p>"; ?>
        <a href="/nba-store/index.php" class="btn btn-primary mt-3">Voltar à loja</a>
    </div>
</body>
</html>