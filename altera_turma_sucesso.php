<?php

include('conexao.php');

$nome_turma = $_GET['nome_turma'];

$curso = $_POST['curso'];
$serie = $_POST['serie'];
$periodo = $_POST['periodo'];
$turno = $_POST['turno'];
$sala = $_POST['sala'];

$query = "UPDATE turma SET
serie = '$serie',
periodo = '$periodo',
turno = '$turno',
id_sala = '$sala'
WHERE nome = '$nome_turma';";
$result = mysqli_query($conn, $query);

if ($result) {

    header("location: listar_turmas.php");
    echo 'nome turma: '. $nome_turma . '<br>';
    echo 'curso: '. $curso .'<br>';
    echo 'serie: '. $serie .'<br>';
    echo 'periodo: '. $periodo .'<br>';
    echo 'turno: '. $turno .'<br>';
    echo 'sala: '. $sala.'<br>';
  
}

else {
    echo 'ERRO';
}

if ($turno == "manha") {
    $sql = "UPDATE salas SET disponivel_m = false WHERE id = $sala";    
} else if ($turno == "tarde") {
    $sql = "UPDATE salas SET disponivel_t = false WHERE id = $sala";    
} else if ($turno == "noite") {
    $sql = "UPDATE salas SET disponivel_n = false WHERE id = $sala";    
} else {
    $sql = "UPDATE salas SET 
    disponivel_m = false, 
    disponivel_t = false, 
    disponivel_n = false
    WHERE id = $sala";
}

if ($conn->query($sql) === TRUE) {
    echo "Atualizado com sucesso.";
} else {
    echo "Erro ao atualizar campo: " . $conn->error;
}

$conn->close();
?>