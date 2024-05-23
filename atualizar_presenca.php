<?php
include('conexao.php');

$alunoId = $_POST['aluno_id'];
$data = $_POST['data'];
$presente = $_POST['presente'];
$materia = $_POST['materia'];

if($presente == 0){
    $sql = "DELETE FROM frequencia WHERE idaluno = $alunoId AND data = '$data'";

    if ($conn->query($sql) === TRUE) {
        echo "Aluno excluído com sucesso.";
    } else {
        echo "Erro ao excluir aluno: " . $conn->error;
    }

} else {

$sql = "INSERT INTO frequencia (data, idaluno, idmat,  presenca) VALUES ( '$data', '$alunoId', '$materia', '$presente')
        ON DUPLICATE KEY UPDATE presenca = '$presente'";
if ($conn->query($sql) === TRUE) {
    echo "Presença atualizada com sucesso.";
} else {
    echo "Erro ao atualizar presença: " . $conn->error;
}
}

$conn->close();
?>