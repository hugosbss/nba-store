<?php
    //3. Um formulário que recebe um número e verifica se ele é par ou ímpar utilizando o método GET.
    if (isset($_GET['numero'])) {
        $numero = $_GET['numero'];
        if ($numero % 2 == 0) {
            echo "O número $numero é par.";
        } else {
            echo "O número $numero é ímpar.";
        }
    }
    echo "<br><hr />";
?>