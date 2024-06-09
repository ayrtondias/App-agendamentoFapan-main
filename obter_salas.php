<?php
include("conexao.php");

    $turno = $_GET['turno'];
    if ($turno == "manha") {
        $sql = "SELECT id, nome FROM salas WHERE disponivel_m = true ";
        $result = $conn->query($sql);
    }else if ($turno == "tarde") {
        $sql = "SELECT id, nome FROM salas WHERE disponivel_t = 1 ";
        $result = $conn->query($sql);
    } else
    if ($turno == "noite") {
        $sql = "SELECT id, nome FROM salas WHERE disponivel_n = 1 ";
        $result = $conn->query($sql);
    } else {
        $sql = "SELECT id, nome FROM salas WHERE disponivel_m = 1 
        AND disponivel_t = 1 
        AND disponivel_n = 1 ";
        $result = $conn->query($sql);
        
    }       

    $optionsHTML = "";

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $optionsHTML .= "<option value='" . $row['id'] . "'>" . $row['nome'] . "</option>";
        }
    } else {
        $optionsHTML = "<option value=''>Nenhuma sala disponível para este horário</option>";
    }
    
    
    $conn->close();
    
    echo $optionsHTML;
?>