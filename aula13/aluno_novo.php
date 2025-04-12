<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</head>
<body>
    <form action="aluno_novo_salvar.php" methdod="post">
        <div>
            <span>Nome do Aluno</span>
            <input type="text" name="nome" />
        </div>
        <div>
            <span>Curso</span>
            <input type="text" name="nome" />
        </div>
        <div>
            <input type="submit" value="Salvar" class="btn btn-primary" />
            <a href="aluno_consulta.php" class="btn btn-default">Voltar</a>
        </div>
    </form>
</body>
</html>