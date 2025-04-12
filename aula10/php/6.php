<?php
    //6. Um formulário que recebe um valor em metros e converte para centímetros utilizando o método GET.
    if (isset($_GET['metros'])) {
        $metros = $_GET['metros'];
        $centimetros = $metros * 100;
        echo "$metros metros é igual a $centimetros centímetros.";
    }
    echo "<br><hr />";
?>