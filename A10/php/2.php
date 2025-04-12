<?php
    //2. Um formulário que recebe um nome e uma idade e exibe uma mensagem utilizando o método POST.
    if (isset($_POST['nome']) && isset($_POST['idade'])) {
        $nome = $_POST['nome'];
        $idade = $_POST['idade'];
        echo "Olá, $nome! Sua idade é $idade anos.";
        }
        echo "<br><hr />";    
?>