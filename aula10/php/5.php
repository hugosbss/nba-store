<?php
    //5. Um formulário que recebe um número e calcula a tabuada de 1 a 10 utilizando o método POST.
    if (isset($_POST['numero'])) {
        $numero = $_POST['numero'];
        echo "Tabuada do $numero:<br>";
        for ($i = 1; $i <= 10; $i++) {
            echo "$numero x $i = " . ($numero * $i) . "<br>";
        }
    }
    echo "<br><hr />";
?>