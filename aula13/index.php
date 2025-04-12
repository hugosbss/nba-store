<?php

    //conectar com banco de dados
    $conexao = new mysqli(
        "localhost", //servidor
        "root", //usuario
        "", //senha
        "faculdade" //banco de dados
    );

    //variavel para armazenar a query
    $sql = "Select  * From alunos";
    $resultado = $conexao->query($sql);

    echo $resultado ->num_rows;
    
    foreach ($resultado as $linha)
    {
        echo $linha['nome'] . "<br>";
        echo $linha['ra'] . "<br>";
        echo $linha['curso'] . "<br>";
    } 
    /*if ($resultado->num_rows > 0) {
    foreach ($resultado as $linha) {
        echo "<p><span>RA: {$linha['ra']}</span> <span>Nome: {$linha['nome']}</span> <span>Data de Nascimento: {$linha['data_nasc']}</span> <span>Curso: {$linha['curso']}</span></p>";
    }
    } else {
    echo "Nenhum registro encontrado.";
    }

    $ra = $_POST['ra'];
    $nome = $_POST['nome'];
    $data_nasc = $_POST['data_nasc'];
    $curso = $_POST['curso'];

    $query = "INSERT INTO alunos (ra, nome, data_nasc, curso) VALUES ('$ra', '$nome', '$data_nasc', '$curso')";
    if ($conexao->query($query) === TRUE) {
    echo "Novo registro inserido com sucesso!";
    } else {
        echo "Erro ao inserir registro: " . $conexao->error;
    }
    */
?>