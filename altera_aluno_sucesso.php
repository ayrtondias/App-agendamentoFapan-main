<?php

include('conexao.php');

$id_aluno = $_GET['id_aluno'];
$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$data = $_POST['data'];
$email = $_POST['email'];
$curso = $_POST['curso'];
$turma = $_POST['turma'];

$query = "UPDATE aluno SET
nome = '$nome',
cpf = '$cpf',
data_nasc = '$data',
email = '$email',
curso = '$curso',
turma = '$turma'
WHERE id_aluno = $id_aluno;";
$result = mysqli_query($conn, $query);

if ($result) {

    header("location: alunos.php");
  
}

else {
    echo 'ERRO';
}

?>