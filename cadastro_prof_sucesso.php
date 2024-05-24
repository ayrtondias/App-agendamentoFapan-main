<?php

include('conexao.php');

$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$data = $_POST['data'];
$email = $_POST['email'];

$query = "INSERT INTO professor(nome,cpf,data_nasc,email) values ('$nome','$cpf','$data','$email');";
$result = mysqli_query($conn, $query);

if ($result) {
    echo 'Cadastro Realizado';
    session_start();
    $_SESSION['sucesso']= "Professor cadastrado com sucesso";
    header("location: cadastro_prof.php");
}

else {
    echo 'ERRO';
}

?>