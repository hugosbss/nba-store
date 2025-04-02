<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercicio</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
</head>
<body>

    <h1>Consulta de Alunos</h1>

    <form method="GET" class="mb-3">
        <label for="nome">Digite um nome:</label>
        <input type="text" id="nome" name="nome" class="form-control" required>
        <button type="submit" class="btn btn-primary mt-2">Buscar</button>
    </form>

    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Nome</th>
                <th>RA</th>
                <th>Curso</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $conexao = new mysqli("localhost", "root", "", "faculdade");

                if (isset($_GET['nome'])) {
                    $nome = $conexao->real_escape_string($_GET['nome']);
                    $sql = "SELECT * FROM alunos WHERE nome LIKE '%$nome%'";
                    $resultado = $conexao->query($sql);

                    if ($resultado->num_rows > 0) {
                        foreach ($resultado as $linha) {
                            echo "
                                <tr>
                                    <td>{$linha['nome']}</td>
                                    <td>{$linha['ra']}</td>
                                    <td>{$linha['curso']}</td>
                                </tr>
                            ";
                        }
                    } else {
                        echo "Nenhum aluno encontrado";
                    }
                }
            ?>
        </tbody>
    </table>
    
</body>
</html>