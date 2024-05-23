<?php
session_start();
include('conexao.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_datashow = $_POST['id_datashow'];
    $numero_identificacao = $_POST['numero_identificacao'];
    $numero_serie = $_POST['numero_serie'];
    $marca = $_POST['marca'];

    $sql = "UPDATE equipamentos SET numero_identificacao='$numero_identificacao', numero_serie='$numero_serie', marca='$marca' WHERE id=$id_datashow";

    if (mysqli_query($conn, $sql)) {
        $_SESSION['sucesso'] = "Datashow atualizado com sucesso!";
    } else {
        $_SESSION['erro'] = "Erro ao atualizar datashow: " . mysqli_error($conn);
    }

    mysqli_close($conn);
} else {
    $_SESSION['erro'] = "Método de requisição inválido.";
}

header("Location: editardatashow.php?datashow=$id_datashow");
exit();
?>
