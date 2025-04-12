<?php
    //9. Um formulário que recebe o raio de um círculo e calcula a área utilizando o método POST. Fórmula: Área = π * raio²
    if (isset($_POST['raio'])) {
        $raio = $_POST['raio'];
        $area = M_PI * pow($raio, 2);
        echo "A área do círculo é: $area";
    }
    echo "<br><hr />";
?>