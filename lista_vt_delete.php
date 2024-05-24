<?php 
include('conexao.php');

$id = $_GET['id'];

$sql = "DELETE FROM visita_tecnica WHERE id = $id";
$result = mysqli_query($conn, $sql);    
    if ($result) {      
            header("location: lista_vt.php");          
        }        
        else {
            echo 'ERRO';
        }

$conn->close();
?>