<?php
include("../../database/banco.php");

$id = @$_POST["id"];
$nome = @$_POST["nome"];
$descricao = @$_POST["descricao"];

$sql = "UPDATE produtos
            set nome='$nome',
                descricao='$descricao'
        WHERE id='$id'";

$con->query($sql);

header("Location: index.php");
?>