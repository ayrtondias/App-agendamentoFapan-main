<?php
include('conexao.php');

$id_user = $_POST['user'];
$funcao = $_POST['funcao'];

$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$data_nasc = $_POST['data_nasc'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$confirmasenha = $_POST['confirmasenha'];

if ($senha!=$confirmasenha) {
    session_start();
    $_SESSION['registererro'] = "Sua confirmação de senha não corresponde.";
    header("location: editaruser.php");
    exit();
} else{

$criptosenha= md5($senha);

//usuario
$query = "UPDATE users SET
email = '$email',
senha = 'criptosenha'
WHERE id_user = $id_user;";
$result = mysqli_query($conn, $query);

if($funcao == 1){
    $texto = "administrador";

    //função anterior 
    $sql = "SELECT * FROM administrador WHERE id = $id_user";
    $result= mysqli_query($conn, $sql);
    if ($result) {
        while ($assoc = mysqli_fetch_assoc($result)) {
            $old_funcao = $assoc['old_funcao'];
        }
    }
    if($old_funcao == 2){
        $old_texto = "professor";
    } else if($old_funcao == 3){
        $old_texto = "atendente";
    }
    $query = "UPDATE $old_texto SET
    nome = '$nome',
    cpf = '$cpf',
    data_nasc = '$data',
    email = '$email'
    WHERE id_user = $id_user;";
    $resultado = mysqli_query($conn, $query);

} else if($funcao == 2){
    $texto = "professor";
} else if($funcao == 3){
    $texto = "atendente";
}
//função
$query = "UPDATE $texto SET
nome = '$nome',
cpf = '$cpf',
data_nasc = '$data',
email = '$email'
WHERE id_user = $id_user;";
$result = mysqli_query($conn, $query);

if ($result) {

    header("location: alunos.php");
  
}

else {
    echo 'ERRO';
}

}

?>