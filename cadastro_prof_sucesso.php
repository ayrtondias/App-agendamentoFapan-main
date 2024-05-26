<?php

use LDAP\Result;

include('conexao.php');

$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$data = $_POST['data'];
$email = $_POST['email'];
$senha = $cpf;

$criptosenha= md5($senha);

$sql = "INSERT INTO users(email, senha, funcao, ativo) VALUES  ('$email', '$criptosenha',2, TRUE)";
$result = mysqli_query($conn, $sql);

$id_user = mysqli_insert_id($conn);

$query = "INSERT INTO professor(nome,cpf,data_nasc,email,id_user) VALUES ('$nome','$cpf','$data','$email','$id_user');";
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

$conn->commit();
?>