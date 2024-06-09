<?php
include("conexao.php");

$nome_turma = $_POST['nome'];

$query = "UPDATE aluno SET turma = '' WHERE turma = '$nome_turma'";
    if ($conn->query($query) === TRUE) {
        echo "Atualizado com sucesso.";
    } else {
        echo "Erro ao atualizar sala: " . $conn->error;
    }

$sql = "SELECT * FROM turma WHERE nome = '$nome_turma'";
$resultado = $conn->query($sql);

    if ($resultado->num_rows > 0) {
        while ($row = $resultado->fetch_assoc()) {
            $id_sala = $row['id_sala'];
            $turno = $row['turno'];
            if($turno == "manha"){
                $turno_livre = "disponivel_m = TRUE";
            } else if($turno == "tarde"){
                $turno_livre = "disponivel_t = TRUE";
            } else if($turno == "noite"){
                $turno_livre = "disponivel_n = TRUE";
            } else {
                $turno_livre = "disponivel_m = TRUE, 
                disponivel_t = TRUE, 
                disponivel_n = TRUE";
            }
            $query = "UPDATE salas SET $turno_livre WHERE id = $id_sala";
            if ($conn->query($query) === TRUE) {
                echo "Atualizado com sucesso.";
            } else {
                echo "Erro ao atualizar sala: " . $conn->error;
            }
        }
    } else {
        echo "<td colspan='6'>Nenhuma turma encontrado para este curso.</td>";
        }

$delete_sql = "DELETE FROM turma WHERE nome = '$nome_turma'";
if (mysqli_query($conn, $delete_sql)) {
    mysqli_commit($conn);
    echo "Turma removido com sucesso!";
    header("Location: listar_turmas.php");
} else {
    mysqli_rollback($conn);
    echo "Erro ao remover agendamento: " . mysqli_error($conn);
    echo "Erro na exclusão: " . $delete_sql;
}



$conn->close();

?>