<?php
include("../../database/banco.php");

$id = $_GET["id"];

$sql = "DELETE FROM produtos WHERE id = '$id'";
$con->query($sql);

header("Location: index.php");
exit();

?>