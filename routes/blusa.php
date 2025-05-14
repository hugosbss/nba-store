<?php
    $con = new mysqli("localhost", "root", "", "nb_store");
      $produtos = $con->real_escape_string($_GET['nome']);
      $sql = "SELECT * FROM produtos";
      $resultado = $con->query($sql);

      if ($resultado->num_rows > 0) {
        foreach ($resultado as $linha) {
          echo "<tr>
                <td>" . $linha['nome'] . "</td>
                <td>" . $linha['preco'] . "</td>
                </tr>";
              }
        } else {
          echo "Nenhum resultado encontrado";
        }
      $con->close();            
  ?>
