<?php

include('conexao.php');

$user = $_POST['user'];
$datashow = $_POST['datashow'];
$data = $_POST['data'];
$turno = $_POST['turno'];

echo $datashow."<br>";
echo $data."<br>";
echo $turno."<br>";

$queryVerifica = "SELECT * FROM agendamentodatashow WHERE ativo = 1 AND equipamento = ".$datashow." AND dataturno = '".$data."' AND turno = '".$turno."'";
$resultVerifica = mysqli_query($conn, $queryVerifica);
$rowVerifica = mysqli_num_rows($resultVerifica);

 if ($rowVerifica > 0) {
     session_start();
     $_SESSION['errodatashow'] = "Já existe um agendamento para esta data e turno.";
     header("location: agendadatashow.php");
 } else {
     $query = "INSERT INTO agendamentodatashow (dataturno, turno, equipamento, ativo, usuario) VALUES ('".$data."',".$turno.", ".$datashow.", 1, ".$user.");";
     $result = mysqli_query($conn, $query);

     if ($result) {
         session_start();
         $_SESSION['sucessodatashow'] = "Agendamento de Equipamento Datashow realizado com sucesso";
         header("location: agendadatashow.php");
     } else {
         echo 'ERRO';
     }
 }
 ?>
