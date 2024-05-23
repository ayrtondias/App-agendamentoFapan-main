<?php

include('conexao.php');

$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$data = $_POST['data'];
$email = $_POST['email'];
$curso = $_POST['curso'];

$query = "insert into aluno(nome,cpf,data_nasc,email,curso) values ('$nome','$cpf','$data','$email','$curso');";
$result = mysqli_query($conn, $query);

if ($result) {
    echo 'Cadastro Realizado';
    session_start();
    header("location: cadastro_aluno.php");
    $_SESSION['sucesso']= "Aluno cadastrado com sucesso";
}

else {
    echo 'ERRO';
}

?>