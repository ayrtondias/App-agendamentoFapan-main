<?php
include('conexao.php');

$id_materia = $_GET['materia'];
$id_aluno = $_POST['id_aluno'];
$dataAtual  = $_POST['data'];
$turma = $_GET['turma'];


    foreach ($id_aluno as $id) {
        $sql = "INSERT INTO frequencia (data, idaluno, idmat, presenca) VALUES 
        ('$dataAtual','$id','$id_materia', TRUE)";
        $result = mysqli_query($conn, $sql);
    }
    
    if ($result) {      
            header("location: frequencia.php");          
        }        
        else {
            echo 'ERRO';
        }

$conn->close();
?>