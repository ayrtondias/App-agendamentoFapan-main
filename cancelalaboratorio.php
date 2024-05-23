<?php
include('conexao.php');
$agendamento = $_GET['agendamento'];
echo $agendamento;
$query = "update agendamentolaboratorio set ativo = 0 where id = ".$agendamento.";";
$result = mysqli_query($conn, $query);
if ($result) {
    session_start();
    $_SESSION['sucessolaboratorio']= "Agendamento cancelado com sucesso";
    header("location: liberacaolaboratorio.php");
}
else {
    echo 'ERRO';
}
?>