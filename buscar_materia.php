<?php
include('conexao.php');

$cursoId = $_GET['curso_id'];

$sql = "SELECT * FROM materia WHERE curso = $cursoId";
$result = $conn->query($sql);

$turmas = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $optionsHTML = "<option value='" . $row['idmateria'] . "'>" . $row['nome'] . "</option>";
    }
} else {
    $optionsHTML = "<option value=''>Nenhuma materia disponível para esta turma</option>";
}


$conn->close();

echo $optionsHTML;
?>