<?php
include("conexao.php");

    $turno = $_GET['curso'];
    
    $sql = "SELECT * FROM curso";
    $result = $conn->query($sql);
            

    $optionsHTML = "";

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $optionsHTML .= "<option value='" . $row['id'] . "'>" . $row['nome'] . "</option>";
        }
    } else {
        $optionsHTML = "<option value=''>Nenhuma curso encontrado</option>";
    }
    
    
    $conn->close();
    
    echo $optionsHTML;
?>