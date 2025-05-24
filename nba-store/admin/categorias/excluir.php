<?php
include("../../database/banco.php");

$id = $_GET["id"];

$sql = "DELETE FROM categorias WHERE id = '$id'";
$con->query($sql);

header("Location: http://localhost/nba-store/admin/categorias/index.php");
exit();

?>