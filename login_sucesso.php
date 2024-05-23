<?php
include("conexao.php");

$email = $_POST['email'];
$senha = $_POST['senha'];

$sql = "select * from users where ativo = 1 and email = '".$email."' and senha = '".$senha."';";

$result = mysqli_query($conn, $sql);
$assoc = mysqli_fetch_assoc($result);

$rows = mysqli_num_rows($result);

if ($rows>0) {
    session_start();
    $_SESSION['id'] = $assoc['id'];
    $_SESSION['nome'] = $assoc['nome'];
    $_SESSION['email'] = $assoc['email'];
    $_SESSION['admin'] = $assoc['admin'];
    
    header("Location: menu.php");
}

else {
    session_start();
    $_SESSION['errologin'] = 'Essa conta não existe ou está bloqueada.';
    header("location: index.php");
}