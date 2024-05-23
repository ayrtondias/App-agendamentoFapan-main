<?php
include('conexao.php');
$laboratorio = $_GET['laboratorio'];
echo $laboratorio;
$query = "update laboratorios set disponibilidade = true where id = ".$laboratorio.";";
$result = mysqli_query($conn, $query);
if ($result) {
    session_start();
    $_SESSION['sucessoliberacaolaboratorio']= "Liberação de Laboratório realizado com sucesso";
    header("location: listalaboratorio.php");
}
else {
    echo 'ERRO';
}
?>