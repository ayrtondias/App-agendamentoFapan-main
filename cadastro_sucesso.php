<?php 

include('conexao.php');

$numero_identificacao = $_POST['numero_identificacao'];
$numero_serie = $_POST['numero_serie'];
$marca = $_POST['marca'];

echo $numero_identificacao;
echo "<br>";
echo $numero_serie;
echo "<br>";
echo $marca;

$query = "insert into equipamentos (numero_identificacao,numero_serie, disponibilidade, marca) values ('".$numero_identificacao."','".$numero_serie."',true,'".$marca."');";
$result = mysqli_query($conn, $query);
if ($result) {
    echo 'Cadastro Realizado';
    session_start();
    $_SESSION['sucesso']= "Datashow cadastrado com sucesso";
    header("location: cadastro.php");
}

else {
    echo 'ERRO';
}

?>