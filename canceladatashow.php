<?php
include('conexao.php');
$agendamento = $_GET['agendamento'];
echo $agendamento;
$query = "update agendamentodatashow set ativo = 0 where id = ".$agendamento.";";
$result = mysqli_query($conn, $query);
if ($result) {
    session_start();
    $_SESSION['sucessodatashow']= "Agendamento cancelado com sucesso";
    header("location: liberacaodatashow.php");
}
else {
    echo 'ERRO';
}
?>