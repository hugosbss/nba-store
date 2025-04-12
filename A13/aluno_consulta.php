<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alunos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</head>
<body>
    <form action="alunos.php" method="get">
        <input type="text" name="nome">
        <input type="submit" value="Pesquisar">
    </form>
<div class="container mt-5">
    <h1 class="mb-4">Lista de Alunos</h1>
    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>RA</th>
                <th>Nome</th>
                <th>Curso</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $conexao = new mysqli(
                    "localhost", //servidor
                    "root", //usuario
                    "", //senha
                    "faculdade" //banco de dados
                );

                if ($conexao->connect_error) {
                    die("Erro de conexão: " . $conexao->connect_error);
                }

                $nome = "";
                if (isset($_GET ["nome"]))
                {
                    $nome = $_GET ["nome"];
                    $sql = "SELECT * FROM Alunos WHERE nome LIKE '%" . $nome . "%'";
                    $result = $conexao->query($sql);
                    echo "Foram encontrados $resultado->num_rows alunos <br>";
                }
                $sql = "SELECT * FROM Alunos WHERE nome LIKE '%" . $_GET['nome'] . "%'";
                $resultado = $conexao->query($sql);

                if ($resultado->num_rows > 0) {
                    foreach ($resultado as $linha) {
                        echo "
                            <tr>
                                <td>" . $linha['ra'] . "</td>
                                <td>" . $linha['nome'] . "</td>
                                <td>" . $linha['curso'] . "</td>
                            </tr>
                        ";
                    }
                } else {
                    echo "<tr><td colspan='3' class='text-center'>Nenhum aluno encontrado</td></tr>";
                }

                $conexao->close();
            ?>
        </tbody>
    </table>
</div>
</body>
</html>