<?php
include('conexao.php');
$user = $_GET['user'];
echo $user;
$query = "update users set ativo = 1 where id = ".$user.";";
$result = mysqli_query($conn, $query);
if ($result) {
    session_start();
    $_SESSION['sucessouser']= "Usuário desbloqueado";
    header("location: listausuarios.php");
}
else {
    echo 'ERRO';
}
?>