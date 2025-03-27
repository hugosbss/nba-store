<?php
    //14. Um formulário que recebe uma data de nascimento e calcula a idade da pessoa utilizando o método GET.
    if (isset($_GET['data_nascimento'])) {
        $dataNascimento = $_GET['data_nascimento'];
        $dataAtual = date('Y-m-d');
        $idade = date_diff(date_create($dataNascimento), date_create($dataAtual))->y;
        echo "A idade da pessoa é: $idade anos";
    }
    echo "<br><hr />";
?>