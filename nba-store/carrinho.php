<?php
session_start();
$con = new mysqli("localhost", "root", "", "nb_store");

function calcularDataEntrega($diasUteis) {
    $data = strtotime("+{$diasUteis} weekdays");
    return date("d-m-y", $data);
}

if (!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = [];
}

if (isset($_GET['cancelar'])) {
    $_SESSION['carrinho'] = [];
    header("Location: /nba-store/index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Carrinho de Compras 🛒</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/nba-store/admin/estilo.css">
</head>
<body class="admin">
<div class="admin-container">
    <h2>Carrinho de Compras</h2>

    <?php
    if (!empty($_SESSION['carrinho'])) {
    ?>
        <form method="POST" action="/nba-store/finalizar.php">
            <div class="mb-3">
                <label class="form-label">Nome do Cliente</label>
                <input type="text" class="form-control" name="nome_cliente" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Data estimada de entrega</label>
                <input type="text" class="form-control" value="<?= calcularDataEntrega(3) ?>" readonly>
            </div>

            <h3>Itens no Carrinho</h3>
            <table class="table">
                <thead><tr><th>Produto</th><th>Qtd</th><th>Preço</th><th>Total</th></tr></thead>
                <tbody>
                <?php
                $total = 0;
                foreach ($_SESSION['carrinho'] as $item) {
                    $id = (int)$item['produto_id'];
                    $qtd = (int)$item['quantidade'];
                    $res = $con->query("SELECT nome, preco FROM produtos WHERE id = $id");
                    $prod = $res->fetch_assoc();
                    $sub = $prod['preco'] * $qtd;
                    $total += $sub;
                ?>
                    <tr>
                        <td><?= $prod['nome'] ?></td>
                        <td><?= $qtd ?></td>
                        <td>R$ <?= number_format($prod['preco'], 2, ',', '.') ?></td>
                        <td>R$ <?= number_format($sub, 2, ',', '.') ?></td>
                    </tr>
                <?php } ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3"><strong>Total</strong></td>
                        <td><strong>R$ <?= number_format($total, 2, ',', '.') ?></strong></td>
                    </tr>
                </tfoot>
            </table>

            <button type="submit" class="btn btn-success">Finalizar Compra</button>
            <a href="/nba-store/index.php" class="btn btn-secondary">Voltar ao Início</a>
            <a href="/nba-store/carrinho.php?cancelar=1" class="btn btn-danger">Cancelar Compra</a>
        </form>
    <?php
    } else {
    ?>
        <div class="alert alert-info">Seu carrinho está vazio.</div>
        <a href="/nba-store/index.php" class="btn btn-primary">Voltar ao Início</a>
    <?php
    }
    ?>
</div>
</body>
</html>