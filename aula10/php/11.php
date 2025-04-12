<?php
    //11. Um formulário que recebe o preço de um produto e aplica um desconto de 10% utilizando o método POST.
    if (isset($_POST['preco'])) {
        $preco = $_POST['preco'];
        $desconto = $preco * 0.1;
        $precoComDesconto = $preco - $desconto;
        echo "O preço com desconto é: R$$precoComDesconto";
    }
    echo "<br><hr />";
?>