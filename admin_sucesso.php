<?php
include('conexao.php');

$user = $_GET['user'];

$sql = "SELECT * FROM users WHERE id = $user";
$result= mysqli_query($conn, $sql);
if ($result) {
    while ($assoc = mysqli_fetch_assoc($result)) {
        $funcao = $assoc['funcao'];
        if($funcao == 2){
            $texto = "professor";
        } else if($funcao == 3){
            $texto = "atendente";
        }
        $query = "SELECT * FROM $texto WHERE id_user = $user";
        $resultado= mysqli_query($conn, $query);
        if ($resultado) {
            while ($row = mysqli_fetch_assoc($resultado)) {
                $nome = $row['nome'];
                $email = $row['email'];
                $id_user = $user;
            }
        }
    }
}

$sql = "INSERT INTO administrador(nome, email, id_user, old_funcao) VALUES ('$nome','$email','$user','$funcao');";
    $result1 = mysqli_query($conn, $sql);

    $query = "UPDATE users SET funcao = 1 WHERE id = $user";
    $result2 = mysqli_query($conn, $query);

    if ($result2) {
        session_start();
        header("location: listausuarios.php");
    }
    
    else {
        echo 'ERRO';
    }
    

$conn->commit();

?>