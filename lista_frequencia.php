<?php
session_start();
include("conexao.php");

$curso = $_GET['curso'];
$turma = $_GET['turma'];
$materia = $_GET['materia'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar dados do aluno</title>
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
                    <h1 class="mt-4 mb-4" style="text-align: center;">Lista de frequencia</h1>
                    
                    <form action="lista_frequencia_sucesso.php?materia=<?php echo $materia . '&turma=' . $turma?>" method="POST">
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
                                <td> <input type = "date" required class="form-control" id = "data" name = "data"  value="<?php echo date("Y-m-d"); ?>" style="border: none;"></td>
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
                        </tbody>
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
                                                <td colspan='3'>" . $row['nome'] ."</td>
                                                <td class='centro'>
                                                <input type='checkbox' id='id_aluno' name='id_aluno[]' value='" . $row['id_aluno'] ."'>
                                                </td>
                                                </tr>";
                                        }
                                    } 
                                ?>                            
                        </tbody>
                    </table>
                    <br>
                    <br>
                    <button type="submit" class="form-control btn-primary">Salvar</button>
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