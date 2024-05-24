<?php
session_start();
include("conexao.php");

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
                    <h1 class="mt-4 mb-4" style="text-align: center;">Lista de visitas técnica</h1>
                    
                    <form action="" method="POST">                                        
                    <table>
                        <thead>
                            <tr>                                
                                <th>Dia da visita</th>
                                <th>Curso</th>
                                <th>Materia</th>
                                <th>Turma</th>
                                <th colspan="2" style="text-align: center;">Ação</th>
                            </tr>
                        </thead>
                        <tbody>                           
                                <?php 
                                    $sql = "SELECT
                                    v.id,
                                    v.data_visita,
                                    v.turma,
                                    v.frequencia,
                                    c.nome AS nome_curso,
                                    m.nome AS nome_materia
                                    FROM visita_tecnica v
                                    JOIN curso c ON v.curso = c.id
                                    JOIN materia m ON v.materia = m.idmateria
                                    ORDER BY v.id DESC";
                                    $result = $conn->query($sql);                       

                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                                $id = $row['id'];
                                                echo "<tr>                                               
                                                <td>" . date('d/m/Y', strtotime($row['data_visita'])) ."</td>
                                                <td>" . $row['nome_curso'] ."</td>
                                                <td>" . $row['nome_materia'] ."</td>
                                                <td>" . $row['turma'] ."</td>
                                                <td class='centro'>";
                                                if($row['data_visita'] <= date('Y-m-d')){
                                                    if($row['frequencia'] == 0){
                                                        echo "<a href='frequencia_vt.php?id=" . $id . "')'><button type='button' class='btn btn-primary'>Gerar Frequencia</button></a>";
                                                    } else{
                                                        echo "<a href='frequencia_vt.php?id=" . $id . "')'><button type='button' class='btn btn-primary'>Alterar</button></a>";
                                                    }
                                                }else{
                                                    echo "Disponivel dia <br>"  . date('d/m/Y', strtotime($row['data_visita']));
                                                }
                                                    echo "</td>
                                                    <td><a href='lista_vt_delete.php?id=" . $id . "')'><button type='button' class='btn btn-danger'>Delete</button></a>
                                                    </td>
                                                    </tr>";
                                                }
                                                
                                    } else {
                                        echo '<tr>
                                        <td colspan="5">Não há visita técnica agendada</td>
                                        </tr>';
                                    }
                                ?>                            
                        </tbody>
                    </table>
                    
                </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>