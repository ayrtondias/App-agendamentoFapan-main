<?php
include("conexao.php");

$user = $_GET['user'];
$funcao = "";
$old_funcao = "";

$sql = "SELECT funcao FROM users WHERE id = $user";
$result = mysqli_query($conn, $sql);
if ($result->num_rows > 0) {
    while ($assoc = mysqli_fetch_assoc($result)) {
        if($assoc['funcao'] == 1){
            $funcao = "administrador";

            $query = "SELECT old_funcao FROM administrador WHERE id_user = $user";
            $resultado = mysqli_query($conn, $query);
            if ($resultado->num_rows > 0) {
                while ($row = mysqli_fetch_assoc($resultado)) {
                    $id_funcao = $row['old_funcao'];
                    if($row['old_funcao'] == 2){
                        $old_funcao = "professor";
                    } else if($row['old_funcao'] == 3){
                        $old_funcao = "atendente";
                    }
                    echo $id_funcao . "<br>";
                }
            }
        } else if($assoc['funcao'] == 2){
            $funcao = "professor";
        } else if($assoc['funcao'] == 3){
            $funcao = "atendente";
        }
    }
}

echo $old_funcao . "<br>";
if($old_funcao !== ""){
    $delete_sql = "DELETE FROM $old_funcao WHERE id_user = $user";
    if (mysqli_query($conn, $delete_sql)) {
        mysqli_commit($conn);
        echo "Removido com sucesso!";
    } else {
        mysqli_rollback($conn);
        echo "Erro ao excluir aluno: " . mysqli_error($conn);
        echo "Erro na exclusão: " . $delete_sql;
    }
}
$delete_sql = "DELETE FROM users WHERE id = $user";
if (mysqli_query($conn, $delete_sql)) {
    mysqli_commit($conn);
    echo "Removido com sucesso!";
    $delete_sql = "DELETE FROM $funcao WHERE id_user = $user";
if (mysqli_query($conn, $delete_sql)) {
    mysqli_commit($conn);
    echo "Removido com sucesso!";
    header("Location: listausuarios.php");
} else {
    mysqli_rollback($conn);
    echo "Erro ao excluir: " . mysqli_error($conn);
    echo "Erro na exclusão: " . $delete_sql;
}

} else {
    mysqli_rollback($conn);
    echo "Erro ao excluir: " . mysqli_error($conn);
    echo "Erro na exclusão: " . $delete_sql;
}






$conn->close();

?>