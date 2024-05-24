<?php
session_start();
include("conexao.php");

$id= $_GET['id'];

$sql = "SELECT * FROM visita_tecnica WHERE id = '$id'";
$resultado = $conn->query($sql);
    if ($resultado->num_rows > 0) {
        while ($row = $resultado->fetch_assoc()) {
            $curso = $row['curso'];
            $turma = $row['turma'];
            $materia = $row['materia'];
            $data_visita = $row['data_visita'];
            $local = $row['local'];
            $endereco = $row['endereco'];
            $inicio = $row['inicio'];
            $fim = $row['fim'];
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Frequencia visita técnica</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" type="image/png" href="../assets/fapan.png">
    <script type="text/javascript" src="script.js"></script>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            border: 2px solid #ddd;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .centro {
            width: 50;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="d-flex" id="wrapper">
    <?php include("menulateral.php"); ?>
        
        <div id="page-content-wrapper" class="container-fluid">
            
            <div class="card" id="card-body">
                <div class="card-body" >
                    <h1 class="mt-4 mb-4" style="text-align: center;">Frequencia visita técnica</h1>
                    
                    <table>
                        <thead>
                            <tr>
                               <th>Curso</th> 
                               <td colspan="2">
                                <?php 
                                    $sql = "SELECT * FROM curso WHERE id = $curso";
                                    $resultado = $conn->query($sql);                       

                                    if ($resultado->num_rows > 0) {
                                        while ($row = $resultado->fetch_assoc()) {
                                            echo $row['nome'] ;
                                        }
                                    } 
                                ?></td>
                            </tr>
                            <tr>
                            <th>Materia</th>                            
                            <th>Turma</th>
                            <th>Data</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                <?php 
                                    $sql = "SELECT * FROM materia WHERE idmateria = $materia";
                                    $resultado = $conn->query($sql);                       

                                    if ($resultado->num_rows > 0) {
                                        while ($row = $resultado->fetch_assoc()) {
                                                echo $row['nome'] ;
                                        }
                                    } 
                                    ?>
                                </td>
                                <td><?php echo $turma ?></td>
                                <td> <?php echo date('d/m/Y', strtotime($data_visita)); ?></td>
                            </tr>
                            <tr>
                            <th>Professor</th>
                                <td colspan="2">
                                <?php 
                                    $sql = "SELECT nome FROM professor 
                                    JOIN prof_mat ON idprof = id_professor 
                                    WHERE id_materia = $materia";
                                    $resultado = $conn->query($sql);                      
                                    if ($resultado->num_rows > 0) {
                                        while ($row = $resultado->fetch_assoc()) {
                                                echo $row['nome'] ;
                                        }
                                    } 
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Local</th>
                                <th colspan="2">Endereço</th>
                            </tr>
                            <tr>
                                <td><?php echo $local?></td>
                                <td colspan="2"><?php echo $endereco?></td>
                            </tr>
                        </tbody>
                    </table>
                    
                    <table>
                        <tr>
                            <th colspan="4" style="text-align: center;">Horario da visita</th>
                        </tr>
                        <tr>
                            <th>Inicio</th>
                            <td><?php echo $inicio?></td>
                            <th>Fim</th>
                            <td><?php echo $fim?></td>
                        </tr>
                    </table>
                    <br>                    
                    <table>
                        <thead>
                            <tr>                                
                                <th colspan="3">Nome do aluno</th>
                                <th width="50">Presença</th>
                            </tr>
                        </thead>
                        <tbody>                           
                                <?php 
                                    $sql = "SELECT * FROM aluno WHERE curso = $curso";
                                    $result = $conn->query($sql);                       

                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                                echo "<tr>                                               
                                                <td colspan='3'>" . $row['nome'] ."
                                                <input type='hidden'>
                                                </td>
                                                <td class='centro'>";
                                                $id_aluno = $row['id_aluno'];

                                                $select = "SELECT * FROM frequencia_vt where id_vt = $id AND id_aluno = $id_aluno";
                                                $resultado = $conn->query($select);
                                                if ($assoc = $resultado->fetch_assoc()) {
                                                if ($assoc['presenca'] == 1) {
                                                    echo "<input type='checkbox' id='".$id_aluno."_".$data_visita."' name='presenca' onchange='atualizar(\"$id_aluno\",\"$data_visita\")' checked>";
                                                } else{
                                                    echo "<input type='checkbox' id='".$id_aluno."_".$data_visita."' name='presenca' onchange='atualizar(\"$id_aluno\",\"$data_visita\")'>";
                                                }
                                                } else{
                                                    echo "<input type='checkbox' id='".$id_aluno."_".$data_visita."' name='presenca' onchange='atualizar(\"$id_aluno\",\"$data_visita\")'>";
                                                }
                                            
                                                echo "</td>
                                                </tr>";
                                        }
                                    } 
                                ?>                            
                        </tbody>
                    </table>
                    <br>
                    <br>
                    
                    <a href="lista_vt.php"><button type="submit" class="form-control btn-primary">Voltar</button></a>
                    
                
                </div>
            </div>
        </div>
    </div>
    <script>
        function atualizar(alunoId, data) {
    // Verifica o select
    var select = document.getElementById(alunoId + "_" + data);
    var presente = select.checked ? 1 : 0; // 1 se estiver presente, 0 se não

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "frequencia_vt_sucesso.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            console.log("Resposta do servidor: ", xhr.responseText);
        }
    };
    xhr.send("id_aluno=" + alunoId + "&id=" + <?php echo $id;?>  + "&presente=" + presente + "&data_visita=" + data);
    console.log();

}
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>