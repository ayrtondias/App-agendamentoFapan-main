<?php
session_start();
include('conexao.php');

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['laboratorio'])) {
    $id_laboratorio = mysqli_real_escape_string($conn, $_GET['laboratorio']);
    echo $id_laboratorio;

    mysqli_autocommit($conn, false);

    $check_sql = "SELECT * FROM agendamentolaboratorio WHERE laboratorio = $id_laboratorio";
    $result = mysqli_query($conn, $check_sql);

    if (mysqli_num_rows($result) > 0) {
        $delete_agendamento_sql = "DELETE FROM agendamentolaboratorio WHERE laboratorio = $id_laboratorio";
        $delete_laboratorio_sql = "DELETE FROM laboratorios WHERE id = $id_laboratorio";

        if (mysqli_query($conn, $delete_agendamento_sql) && mysqli_query($conn, $delete_laboratorio_sql)) {
            mysqli_commit($conn);
            $_SESSION['sucessoliberacaolaboratorio'] = "Laboratório e registros relacionados removidos com sucesso!";
        } else {
            mysqli_rollback($conn);
            $_SESSION['erro'] = "Erro ao remover laboratório e registros relacionados: " . mysqli_error($conn);
            echo "Erro na exclusão: " . $delete_agendamento_sql . " | " . $delete_laboratorio_sql;
        }
    } else {
        $delete_sql = "DELETE FROM laboratorios WHERE id = $id_laboratorio";

        if (mysqli_query($conn, $delete_sql)) {
            mysqli_commit($conn);
            $_SESSION['sucessoliberacaolaboratorio'] = "Laboratório removido com sucesso!";
        } else {
            mysqli_rollback($conn);
            $_SESSION['erro'] = "Erro ao remover laboratório: " . mysqli_error($conn);
            echo "Erro na exclusão: " . $delete_sql;
        }
    }
    mysqli_autocommit($conn, true);
    mysqli_close($conn);
} else {
    $_SESSION['erro'] = "Requisição inválida ou ID do laboratório não fornecido.";
}

header("Location: listalaboratorio.php");
exit();
?>
