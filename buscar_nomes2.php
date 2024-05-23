<?php
include('conexao.php');

$nomeMat = $_POST['nome_materia'];


$sql2 = "SELECT nome FROM materia WHERE nome LIKE '$nomeMat%'";
$result2 = $conn->query($sql2);

$nomesRelacionados2 = array();

if ($result2->num_rows > 0) {
    while ($row = $result2->fetch_assoc()) {
        $nomesRelacionados2[] = $row['nome'];
    }
}

echo json_encode($nomesRelacionados2);

$conn->close();
?>