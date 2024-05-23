<?php 

include('conexao.php');

$nome_materia = $_POST['nome_materia'];
$nome_professor = $_POST['nome_professor'];

$sql = "SELECT idprof FROM professor WHERE nome LIKE '$nome_professor%'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // Output dos nomes relacionados como um array JSON
    while ($row = $result->fetch_assoc()) {
        $id_professor = $row['idprof'];
    }
}

$sql2 = "SELECT idmateria FROM materia WHERE nome LIKE '$nome_materia%'";
$result2 = $conn->query($sql2);
if ($result2->num_rows > 0) {
    // Output dos nomes relacionados como um array JSON
    while ($row2 = $result2->fetch_assoc()) {
        $id_materia = $row2['idmateria'];
    }
}


$query = "insert into prof_mat (id_professor,id_materia) values ($id_professor,$id_materia);";
$result = mysqli_query($conn, $query);
if ($result) {
    echo 'Cadastro Realizado';
    session_start();
    $_SESSION['sucesso']= "Materia cadastrada com sucesso";
    header("location: cadastro_mat.php");
}

else {
    echo 'ERRO';
}

?>