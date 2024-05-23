<?php
session_start();
include('conexao.php');

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['agendashow'])) {
    $id_agendashow = mysqli_real_escape_string($conn, $_GET['agendashow']);
    echo $id_agendashow;

    mysqli_autocommit($conn, false);

    $check_sql = "SELECT * FROM agendamentodatashow WHERE equipamento = $id_agendashow";
    $result = mysqli_query($conn, $check_sql);

        $delete_sql = "DELETE FROM agendamentodatashow WHERE id = $id_agendashow";

        if (mysqli_query($conn, $delete_sql)) {
            mysqli_commit($conn);
            $_SESSION['sucessoliberacaodatashow'] = "Agendamento removido do histórico!";
        } else {
            mysqli_rollback($conn);
            $_SESSION['erro'] = "Erro ao remover agendamento: " . mysqli_error($conn);
            echo "Erro na exclusão: " . $delete_sql;
        }
    }
    
    mysqli_autocommit($conn, true);
    mysqli_close($conn);

header("Location: liberacaodatashow.php");
exit();
?>
