<?php
include("banco.php");

$ra = @$_POST["ra"];
$nome = @$_POST["nome"];
$curso = @$_POST["curso"];

$sql = "INSERT INTO alunos (ra, nome, curso) 
   VALUES 
   ('$ra', '$nome', '$curso')";
$con->query($sql);

header("location:aluno_consulta.php");
?>