<?php
include('conexao.php');

$cursoId = $_GET['curso_id'];

$sql = "SELECT * FROM turma WHERE curso = $cursoId";
$result = $conn->query($sql);

$turmas = array();
$optionsHTML = "";
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $optionsHTML .= "<option value='" . $row['nome'] . "'>" . $row['nome'] . "</option>";
    }
} else {
    $optionsHTML = "<option value=''>Nenhuma sala disponível para este horário</option>";
}


$conn->close();

echo $optionsHTML;
?>