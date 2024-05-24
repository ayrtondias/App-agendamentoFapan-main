<?php
include('conexao.php');

$id_aluno = $_POST['id_aluno'];
$id_vt = $_POST['id'];
$data_visita  = $_POST['data_visita'];
$presente = $_POST['presente'];

        $query = "UPDATE visita_tecnica SET frequencia = 1 WHERE id = $id_vt";
        $result = mysqli_query($conn, $query);

        if($presente == 0){
            $sql = "DELETE FROM frequencia_vt WHERE id_aluno = $id_aluno AND id_vt = $id_vt";
        
            if ($conn->query($sql) === TRUE) {
                echo "Aluno excluído com sucesso.";
            } else {
                echo "Erro ao excluir aluno: " . $conn->error;
            }
        
        } else {
            $sql = "INSERT INTO frequencia_vt (data_visita, id_aluno, id_vt, presenca) 
            VALUES ('$data_visita','$id_aluno','$id_vt', '$presente')
            ON DUPLICATE KEY UPDATE presenca = '$presente'";
            if ($conn->query($sql) === TRUE) {
                echo "Presença atualizada com sucesso.";
            } else {
                echo "Erro ao atualizar presença: " . $conn->error;
            }
            }    



$conn->close();
?>