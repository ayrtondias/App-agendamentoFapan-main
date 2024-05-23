<?php
include('conexao.php');
$laboratorio = $_GET['laboratorio'];
echo $laboratorio;
$query = "update laboratorios set disponibilidade = false where id = ".$laboratorio.";";
$result = mysqli_query($conn, $query);
if ($result) {
    session_start();
    $_SESSION['sucessoliberacaolaboratorio']= "Bloqueio de Laboratório realizado com sucesso";
    header("location: listalaboratorio.php");
}
else {
    echo 'ERRO';
}
?>