<?php
include("banco.php");

$ra = @$_POST["ra"];
$nome = @$_POST["nome"];
$curso = @$_POST["curso"];

$sql = "UPDATE alunos
            set nome='$nome',
                curso='$curso'
        WHERE ra='$ra'";

$con->query($sql);

header("location:aluno_consulta.php");
?>