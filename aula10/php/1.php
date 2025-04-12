<?php
    // O método GET envia os dados do formulário anexados à URL.
    // Os dados enviados pelo método GET podem ser acessados através da superglobal $_GET.
    // A superglobal $_GET é um array associativo onde os índices são os nomes dos campos do formulário.
    // Exemplo: Para acessar o valor do campo 'name', usamos $_GET['name'].
  
    //1. Um formulário que recebe dois números e calcula a soma deles utilizando o método GET.
    if (isset($_GET['num1']) && isset($_GET['num2'])) {
        $num1 = $_GET['num1'];
        $num2 = $_GET['num2'];
        $soma = $num1 + $num2;
        echo "A soma de $num1 e $num2 é: $soma";
    }    
    echo "<br><hr />";
?>