<?php 

include('conexao.php');

$nome_mat = $_POST['nome_mat'];
$curso = $_POST['curso'];


$query = "insert into materia (nome, curso) values ('$nome_mat', '$curso');";
$result = mysqli_query($conn, $query);
if ($result) {
    echo 'Cadastro Realizado';
    session_start();
    $_SESSION['sucesso']= "Materia cadastrada com sucesso";
    header("location: cadastro_mat.php");
}

else {
    echo 'ERRO';
}

?>