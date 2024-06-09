<?php   
include("conexao.php");

    $curso_id = $_POST['curso'];


    $sql = "SELECT * FROM turma WHERE curso = '$curso_id'";
    $resultado = $conn->query($sql);

    // Exibir os resultados
    if ($resultado->num_rows > 0) {
        while ($row = $resultado->fetch_assoc()) {
            $nome_turma = $row['nome'];
            echo "<tr>";
            echo "<td>" . $row['nome'] . "</td>
            <td>" . $row['serie'] . "</td>
            <td>" . $row['periodo'] . "</td>
            <td>" . $row['turno'] . "</td>";
            $id_sala = $row['id_sala'];

            $query = "SELECT nome FROM salas WHERE id = $id_sala";
            $result = $conn->query($query);

            // Exibir os resultados
            if ($result->num_rows > 0) {
                while ($assoc = $result->fetch_assoc()) {
                    $nome_sala = $assoc['nome'];
                }
            }
            echo "<td>" . $nome_sala . "</td>";
            echo "<td><form method='POST' action='delete_turma.php'>
                    <input type='hidden' name='nome' value='" . $row["nome"] . "' />
                    <input type='submit' class='btn btn-danger' value='Delete' />
                  </form></td>";
            echo "<td>" . 
            '<a href="altera_turma.php?nome_turma=' . $nome_turma . '")"><button type="button" class="btn btn-primary">Alterar</button></a>'
            . "</td>";
            echo "</tr>";
        }
    } else {
        echo "<td colspan='6'>Nenhuma turma encontrado para este curso.</td>";
        }

