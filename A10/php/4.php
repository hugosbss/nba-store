<?php
    //4. Um formulário que recebe uma temperatura em Fahrenheit e converte para Celsius utilizando o método GET. Fórmula: C = (F - 32) * 5/9 
    if (isset($_GET['fahrenheit'])) {
        $fahrenheit = $_GET['fahrenheit'];
        $celsius = ($fahrenheit - 32) * 5 / 9;
        echo "$fahrenheit °F é igual a $celsius °C.";
    }
    echo "<br><hr />";
?>