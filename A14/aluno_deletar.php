<?php
include("banco.php");

$ra = $_GET["ra"];

$sql = "DELETE FROM alunos WHERE ra = '$ra'";
$con->query($sql);

header("Location: http://localhost/aula14/aluno_consulta.php");
exit();

//$resultado = $con-> query($sql);

//$dados = mysqli_fetch_assoc($resultado);
//echo $dados["ra"];
?>