<?php

include('conexao.php');

$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$data = $_POST['data'];
$email = $_POST['email'];

$senha = $cpf;

$criptosenha= md5($senha);

$sql = "INSERT INTO users(email, senha, funcao, ativo) VALUES  ('$email', '$criptosenha',3, TRUE)";
$result = mysqli_query($conn, $sql);

$id_user = mysqli_insert_id($conn);

$query = "INSERT INTO atendente(nome,cpf,data_nasc,email,id_user) VALUES ('$nome','$cpf','$data','$email','$id_user');";
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