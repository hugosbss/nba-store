<?php   

$id = @$_POST['id'];
$nome = @$_POST['nome'];
$descricao = @$_POST['descricao'];

if ($id == '') 
{
    echo "ID é obrigatorio";
    exit;
}

if ($nome == '') 
{
    echo "Nome é obrigatorio";
    exit;
}

if ($descricao == '') 
{
    echo "Descrição é obrigatorio";
    exit;
}

include("../../database/banco.php");

$sql = "INSERT INTO categorias (id, nome, descricao) VALUES ($id, '$nome', '$descricao')";

$con->query($sql);
header('location: index.php');

?>