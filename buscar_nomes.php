<?php
include('conexao.php');

$nome = $_POST['nome_professor'];


$sql = "SELECT nome FROM professor WHERE nome LIKE '$nome%'";
$result = $conn->query($sql);

$nomesRelacionados = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $nomesRelacionados[] = $row['nome'];
    }
}


echo json_encode($nomesRelacionados);

$conn->close();
?>