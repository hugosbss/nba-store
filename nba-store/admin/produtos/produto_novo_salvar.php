<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header('Location: /nba-store/admin/login.php');
    exit;
}

include("../../database/banco.php");

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$id = $_POST['id'] ?? '';
$nome = $_POST['nome'] ?? '';
$descricao = $_POST['descricao'] ?? '';
$preco = $_POST['preco'] ?? '';
$categoria_id = $_POST['categoria_id'] ?? '';

if ($id == '' || $nome == '' || $descricao == '' || $preco == '' || $categoria_id == '') {
    echo "Todos os campos são obrigatórios!";
    exit;
}

$nomeImagem = '';
if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] == 0) {
    $nomeImagem = basename($_FILES['imagem']['name']);
    move_uploaded_file($_FILES['imagem']['tmp_name'], '../../images/' . $nomeImagem);
}

$sql = "INSERT INTO produtos (id, nome, descricao, preco, categoria_id, imagem) 
        VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $con->prepare($sql);
$stmt->bind_param("issdis", $id, $nome, $descricao, $preco, $categoria_id, $nomeImagem);

if ($stmt->execute()) {
    header('Location: index.php');
    exit;
} else {
    echo "Erro ao cadastrar produto: " . $con->error;
}

$stmt->close();
$con->close();
?>