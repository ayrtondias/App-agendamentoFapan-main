<?php

include('conexao.php');

$nome = $_POST['nome'];
$curso = $_POST['curso'];
$serie = $_POST['serie'];
$periodo = $_POST['periodo'];
$turno = $_POST['turno'];
$sala = $_POST['sala'];

$query = "insert into turma(nome,curso,serie,periodo,turno,id_sala) values ('$nome','$curso','$serie','$periodo','$turno','$sala');";
$result = mysqli_query($conn, $query);

if ($result) {
    echo 'Cadastro Realizado';
    session_start();
    $_SESSION['sucesso']= "Turma cadastrada com sucesso";
    header("location: cadastro_turma.php");
}

else {
    echo 'ERRO';
}


if ($turno == "manha") {
    $sql = "UPDATE salas SET disponivel_m = false WHERE id = $sala";
    
    
}
if ($turno == "tarde") {
    $sql = "UPDATE salas SET disponivel_t = false WHERE id = $sala";
    
}
if ($turno == "noite") {
    $sql = "UPDATE salas SET disponivel_n = false WHERE id = $sala";
    
}

if ($conn->query($sql) === TRUE) {
    echo "Atualizado com sucesso.";
} else {
    echo "Erro ao atualizar campo: " . $conn->error;
}

$conn->close();
?>