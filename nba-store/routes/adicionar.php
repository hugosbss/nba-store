<?php
session_start();
if (!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = [];
}
$produto_id = (int)$_POST['produto_id'];
$quantidade = (int)$_POST['quantidade'];

$encontrado = false;
foreach ($_SESSION['carrinho'] as &$item) {
    if ($item['produto_id'] == $produto_id) {
        $item['quantidade'] += $quantidade;
        $encontrado = true;
        break;
    }
}
if (!$encontrado) {
    $_SESSION['carrinho'][] = [
        'produto_id' => $produto_id,
        'quantidade' => $quantidade
    ];
}
header('Location: /nba-store/carrinho.php');
exit;
?>