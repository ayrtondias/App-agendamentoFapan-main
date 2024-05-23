<?php

include('conexao.php');

$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$data = $_POST['data'];
$email = $_POST['email'];

$query = "insert into atendente(nome,cpf,data_nasc,email) values ('$nome','$cpf','$data','$email');";
$result = mysqli_query($conn, $query);

if ($result) {
    echo 'Cadastro Realizado';
    session_start();
    header("location: cadastro_aten.php");
    $_SESSION['sucesso']= "Atendente cadastrado com sucesso";
}

else {
    echo 'ERRO';
}

?>