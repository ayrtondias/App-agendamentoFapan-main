<?php
include('conexao.php');

$nome_sala = $_POST['nome_sala'];
$cadeiras = intval($_POST['cadeiras']);

echo $nome_sala;
echo $cadeiras;

$query = "insert into laboratorios (Nome_Sala, cadeiras, disponibilidade) values ('".$nome_sala."', ".$cadeiras.", true);";
$result = mysqli_query($conn, $query);
if ($result) {
    echo 'Cadastro Realizado';
    session_start();
    $_SESSION['sucessolab']= "laboratorio cadastrado com sucesso";
    echo $_SESSION['sucessolab'];
    header("location: cadastro.php");
}

else {
    echo 'ERRO';
}

?>