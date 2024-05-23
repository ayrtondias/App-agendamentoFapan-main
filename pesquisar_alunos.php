<?php   
include("conexao.php");

        $curso_id = $_POST['curso'];
        $semTurma = "";

        if (isset($_POST['mostrar_sem_turma'])) {
            $curso_id = $_POST['curso'];
            $semTurma = $_POST['mostrar_sem_turma'] === 'true' ? true : false;
        }
        if ($semTurma != null) {
            $sql = "SELECT * FROM aluno WHERE turma IS NULL and curso = '$curso_id'";
        } else {
            $sql = "SELECT * FROM aluno WHERE curso = '$curso_id'";
        }
        $resultado = $conn->query($sql);

        // Exibir os resultados
        if ($resultado->num_rows > 0) {
            while ($row = $resultado->fetch_assoc()) {
                $id_aluno  = $row['id_aluno'];
                echo "<tr>";
                echo "<td>" . $row['nome'] . "</td>
                 <td>" . $row['cpf'] . "</td>
                 <td>" . $row['email'] . "</td>";
                echo "<td>" . ($row['turma'] ? $row['turma'] : 'Sem turma') . "</td>";
                echo "<td>" . 
                '<a href="altera_aluno.php?id_aluno=' . $id_aluno . '")"><button type="button" class="btn btn-danger">Alterar</button></a>'
                . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<td>Nenhum aluno encontrado para este curso.</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>";
        }

        // Fechar a conexão com o banco de dados
        $conn->close();

        function atualizaTurma($conn,$curso_id){
            $query = "SELECT * FROM turma WHERE curso = '$curso_id';";
            $resultado = $conn->query($query);
            if ($resultado->num_rows > 0) {
                while ($row = $resultado->fetch_assoc()) {
                    $turma = $row['nome'];
                    echo "<td><select name='att' class='form-control'>";
                    echo "<option value=' ". $row['nome'] ." '>" . $row['nome'] . "</option>";
                    echo "</select></td>";
                    
                }
            } else {
                echo "<td>Nenhum aluno encontrado para este curso.</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>";
            }
        }

        function updateTurma($conn,$turma, $id_aluno){
            $sql = "UPDATE aluno SET turma = '$turma' WHERE id = $id_aluno";
            if ($conn->query($sql) === TRUE) {
                echo "Atualizado com sucesso.";
            } else {
                echo "Erro ao atualizar campo: " . $conn->error;
            }
            $conn->close();
        }
?>
