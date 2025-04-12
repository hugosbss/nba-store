<?php
    //7. Um formulário que recebe um valor em reais e converte para dólares (cotação fixa de R$5,00) utilizando o método POST.
    if (isset($_POST['reais'])) {
        $reais = $_POST['reais'];
        $dolares = $reais / 5;
        echo "R$$reais é igual a US$$dolares.";
    }
    echo "<br><hr />";
?>