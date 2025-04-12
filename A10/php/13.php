<?php
    //13. Um formulário que recebe o peso e a altura de uma pessoa e calcula o IMC utilizando o método POST. Fórmula: IMC = peso / (altura²)
    if (isset($_POST['peso']) && isset($_POST['altura'])) {
        $peso = $_POST['peso'];
        $altura = $_POST['altura'];
        $imc = $peso / pow($altura, 2);
        echo "O IMC é: $imc";
    }
    echo "<br><hr />";
?>