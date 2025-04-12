<?php
    //10. Um formulário que recebe um número e verifica se ele é positivo, negativo ou zero utilizando o método GET.
    if (isset($_GET['numero'])) {
        $numero = $_GET['numero'];
        if ($numero > 0) {
            echo "O número $numero é positivo.";
        } elseif ($numero < 0) {
            echo "O número $numero é negativo.";
        } else {
            echo "O número é zero.";
        }
    }
    echo "<br><hr />";
?>