<?php
include('conexao.php');

$curso = $_POST['curso'];
$materia = $_POST['materia'];
$turma = $_POST['turma'];
$data_visita = $_POST['data_visita'];
$local = $_POST['local'];
$endereco = $_POST['endereco'];
$inicio = $_POST['inicio'];
$fim = $_POST['fim'];

$sql = "INSERT INTO visita_tecnica (curso, materia, turma, data_visita, local, endereco, inicio, fim) VALUES ('$curso','$materia','$turma','$data_visita','$local','$endereco','$inicio','$fim')";
        $result = mysqli_query($conn, $sql);
    
    if ($result) {      
            header("location: lista_vt.php");          
        }        
        else {
            echo 'ERRO';
        }

$conn->close();

?>