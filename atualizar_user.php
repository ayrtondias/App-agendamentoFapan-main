<?php
session_start();
include('conexao.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_user = $_POST['id_user'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];

    $sql = "UPDATE users SET nome='$nome', email='$email' WHERE id=$id_user";

    if (mysqli_query($conn, $sql)) {
        $_SESSION['sucesso'] = "Usuário atualizado com sucesso!";
    } else {
        $_SESSION['erro'] = "Erro ao atualizar usuário: " . mysqli_error($conn);
    }

    mysqli_close($conn);
} else {
    $_SESSION['erro'] = "Método de requisição inválido.";
}

header("Location: editaruser.php?user=$id_user");
exit();
?>
