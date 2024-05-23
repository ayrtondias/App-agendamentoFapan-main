<?php
session_start();
include('conexao.php');

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['datashow'])) {
    $id_datashow = mysqli_real_escape_string($conn, $_GET['datashow']);
    echo $id_datashow;

    mysqli_autocommit($conn, false);

    $check_sql = "SELECT * FROM agendamentodatashow WHERE equipamento = $id_datashow";
    $result = mysqli_query($conn, $check_sql);

    if (mysqli_num_rows($result) > 0) {
        $delete_agendamento_sql = "DELETE FROM agendamentodatashow WHERE equipamento = $id_datashow";
        $delete_equipamento_sql = "DELETE FROM equipamentos WHERE id = $id_datashow";

        if (mysqli_query($conn, $delete_agendamento_sql) && mysqli_query($conn, $delete_equipamento_sql)) {
            mysqli_commit($conn);
            $_SESSION['sucesso'] = "Datashow e registros relacionados removidos com sucesso!";
        } else {
            mysqli_rollback($conn);
            $_SESSION['erro'] = "Erro ao remover datashow e registros relacionados: " . mysqli_error($conn);
            echo "Erro na exclusão: " . $delete_agendamento_sql . " | " . $delete_equipamento_sql;
        }
    } else {
        $delete_sql = "DELETE FROM equipamentos WHERE id = $id_datashow";

        if (mysqli_query($conn, $delete_sql)) {
            mysqli_commit($conn);
            $_SESSION['sucessoliberacaodatashow'] = "Datashow removido com sucesso!";
        } else {
            mysqli_rollback($conn);
            $_SESSION['erro'] = "Erro ao remover datashow: " . mysqli_error($conn);
            echo "Erro na exclusão: " . $delete_sql;
        }
    }
    
    mysqli_autocommit($conn, true);
    mysqli_close($conn);
} else {
    $_SESSION['erro'] = "Requisição inválida ou ID do datashow não fornecido.";
}

header("Location: listadatashow.php");
exit();
?>
