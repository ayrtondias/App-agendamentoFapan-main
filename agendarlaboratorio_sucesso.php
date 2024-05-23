<?php 

include('conexao.php');

$user = $_POST['user'];
$nomesala = $_POST['nome_sala'];
$data = $_POST['data'];
$turno = $_POST['turno'];

echo $nomesala."<br>";
echo $data."<br>";
echo $turno."<br>";

$queryVerifica = "SELECT * FROM agendamentolaboratorio WHERE ativo = 1 AND laboratorio = ".$nomesala." AND dataturno = '".$data."' AND turno = ".$turno.";";
$resultVerifica = mysqli_query($conn, $queryVerifica);
$rowVerifica = mysqli_num_rows($resultVerifica);

 if ($rowVerifica > 0) {
     session_start();
     $_SESSION['errolaboratorio'] = "Já existe um agendamento para esta data e turno.";
     header("location: agendarlaboratorio.php");
 } else {
        $query = "insert into agendamentolaboratorio (dataturno , laboratorio, turno, ativo, usuario) values ('".$data."',".$nomesala.",".$turno.", 1, ".$user.");";
        $result = mysqli_query($conn, $query);
        if ($result) {
            echo 'Cadastro Realizado';
            session_start();
            $_SESSION['sucessolaboratorio']= "Agendamento de laboratorio efetuado com sucesso";
            header("location: agendarlaboratorio.php");
        }
        
        else { 
            echo 'ERRO';
        }
}

?>