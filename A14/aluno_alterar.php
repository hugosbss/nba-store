<?php

include("banco.php");

$ra = @$_GET["ra"];

$sql = "SELECT * FROM alunos
        WHERE ra = '$ra'";

$resultado = $con-> query($sql);

$dados = mysqli_fetch_assoc($resultado);

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        
    Alteração do aluno <?php echo $dados["nome"]; ?>

    </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+"crossorigin="anonymous"></script>

</head>
<body>
    <form action="aluno_alterar_salvar.php" method="post">
        <div>
            <span> RA </span>
            <input type="text" name="ra" value="<?php echo $dados["ra"]; ?>" />
        </div>

        <div>
            <span> Nome do aluno </span>
            <input type="text" name="nome" value="<?php echo $dados["nome"]; ?>" />        
        </div>

        <div>
            <span> Curso </span>
            <input type="text" name="curso" value="<?php echo $dados["curso"]; ?>" />
        </div>
        
        <div>
            <form action="aluno_consulta.php" method="post">
                <input type="submit" value="Salvar" class="btn btn-primary" />
            </form>
            <a href="aluno_consulta.php" class="btn btn-secondary"> Voltar </a>
        </div>
    </form>
</body>
</html>