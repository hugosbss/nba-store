<?php
    //8. Um formulário que recebe a base e a altura de um triângulo e calcula a área utilizando o método GET. Fórmula: Área = (base * altura) / 2
    if (isset($_GET['base']) && isset($_GET['altura'])) {
        $base = $_GET['base'];
        $altura = $_GET['altura'];
        $area = ($base * $altura) / 2;
        echo "A área do triângulo é: $area";
    }
    echo "<br><hr />";
?>