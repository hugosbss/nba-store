<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercicio</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</head>
<body>

    <h1>Alunos com nome: Lucas, Maria e Silva</h1>

    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Nome:</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $conexao = new mysqli(
                    "localhost",
                    "root",
                    "",
                    "faculdade"
                );

                $sql = "SELECT * FROM alunos Where nome = 'Lucas' OR nome = 'Maria' OR nome = 'Silva'";
                $resultado = $conexao->query($sql);

                if ($resultado->num_rows > 0) {
                    foreach ($resultado as $linha) {
                        echo "
                            <tr>
                                <td>" . $linha['nome'] . "</td>
                            </tr>
                        ";
                    }
                } else {
                    echo "<tr><td colspan='3' class='text-center'>Nenhum aluno encontrado</td></tr>";
                }
            ?>
        </tbody>
    </table>
    
</body>
</html>