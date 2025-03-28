<?php

    $conexao = new mysqli(
        "localhost", //servidor
        "root", //usuario
        "", //senha
        "faculdade" //banco de dados
    );

    //variavel para armazenar a query
    $sql = "Select  * From alunos Where nome = 'Lucas' OR nome = 'Maria' OR nome = 'Silva'";
    $resultado = $conexao->query($sql);

    echo $resultado ->num_rows;
    
    foreach ($resultado as $linha)
    {
        echo $linha['nome'] . "<br>";
        echo $linha['ra'] . "<br>";
        echo $linha['curso'] . "<br>";
    } 

?>