<?php
include("banco.php");

$ra = isset($_GET["ra"]) ? $_GET["ra"] : "";

$sql = "SELECT * FROM alunos WHERE ra = '$ra'";
$resultado = $con->query($sql);
$dados = mysqli_fetch_assoc($resultado);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Novo aluno <?php echo $dados["nome"] ?? "Novo"; ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>
<body>
    <form action="aluno_novo_salvar.php" method="post">
        <div>
            <span>RA</span>
            <input type="text" name="ra" required value="<?php echo $dados["ra"] ?? ""; ?>"/>
        </div>

        <div>
            <span>Nome do aluno</span>
            <input type="text" name="nome" required value="<?php echo $dados["nome"] ?? ""; ?>" />
        </div>

        <div>
            <span>Curso</span>
            <input type="text" name="curso" required value="<?php echo $dados["curso"] ?? ""; ?>" />
        </div>

        <input type="submit" value="Salvar" class="btn btn-primary" />
        <a href="aluno_consulta.php" class="btn btn-secondary">Voltar</a>
    </form>
</body>
</html>
