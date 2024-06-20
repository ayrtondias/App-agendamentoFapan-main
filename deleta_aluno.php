<?php
include("conexao.php");

$id_aluno = $_GET['id_aluno'];

$delete_sql = "DELETE FROM aluno WHERE id_aluno = $id_aluno";
if (mysqli_query($conn, $delete_sql)) {
    mysqli_commit($conn);
    echo "Aluno removido com sucesso!";
    header("Location: alunos.php");
} else {
    mysqli_rollback($conn);
    echo "Erro ao excluir aluno: " . mysqli_error($conn);
    echo "Erro na exclusão: " . $delete_sql;
}



$conn->close();

?>