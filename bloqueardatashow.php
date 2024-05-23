<?php
include('conexao.php');
$datashow = $_GET['datashow'];
echo $datashow;
$query = "update equipamentos set disponibilidade = false where id = ".$datashow.";";
$result = mysqli_query($conn, $query);
if ($result) {
    session_start();
    $_SESSION['sucessoliberacaodatashow']= "Bloqueio de Equipamento realizado com sucesso";
    header("location: listadatashow.php");
}
else {
    echo 'ERRO';
}
?>