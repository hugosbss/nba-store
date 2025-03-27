<?php
    //12. Um formulário que recebe a idade de uma pessoa e verifica se ela é maior de idade utilizando o método GET.
    if (isset($_GET['idade'])) {
        $idade = $_GET['idade'];
        if ($idade >= 18) {
            echo "A pessoa é maior de idade.";
        } else {
            echo "A pessoa é menor de idade.";
        }
    }
    echo "<br><hr />";
?>