<?php
session_start();
include('conexao.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_lab = $_POST['id_lab'];
    $nome_sala = $_POST['nome_sala'];
    $cadeiras = intval($_POST['cadeiras']);

    $sql = "UPDATE laboratorios SET nome_sala='$nome_sala', cadeiras=$cadeiras  WHERE id=$id_lab";

    if (mysqli_query($conn, $sql)) {
        $_SESSION['sucesso'] = "Laboratório atualizado com sucesso!";
    } else {
        $_SESSION['erro'] = "Erro ao atualizar laboratório: " . mysqli_error($conn);
    }

    mysqli_close($conn);
} else {
    $_SESSION['erro'] = "Método de requisição inválido.";
}

header("Location: editarlaboratorio.php?laboratorio=$id_lab");
exit();
?>
