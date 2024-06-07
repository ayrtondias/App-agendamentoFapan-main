<?php
session_start();
include("conexao.php");
$curso = $_GET['curso'];
$turma = $_GET['turma'];
$materia = $_GET['materia'];
$mes = $_GET['mes'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatorio de Frequência</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" type="image/png" href="../assets/fapan.png">
    <script type="text/javascript" src="script.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            updateMes();
        });
    </script>
    
</head>
<body>
<div class="d-flex" id="wrapper">
        
        <div id="page-content-wrapper" class="container-fluid">
            
            <div class="card2 " style="display: inline-block; overflow: auto;background-color: white;">
                <h1 class="mt-4 mb-4" style="text-align: center;">Relatorio de Frequência Mensal</h1>

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
                            <th>Data/Mes</th>
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
                                <td>                                
                                    <label for="">
                                        <?php 
                                            if($mes == '01'){ echo "Janeiro";} else
                                            if($mes == '02'){ echo "Fevereiro";} else
                                            if($mes == '03'){ echo "Março";} else
                                            if($mes == '04'){ echo "Abril";} else
                                            if($mes == '05'){ echo "Maio";} else
                                            if($mes == '06'){ echo "Junho";} else
                                            if($mes == '07'){ echo "Julho";} else
                                            if($mes == '08'){ echo "Agosto";} else
                                            if($mes == '09'){ echo "Setembro";} else
                                            if($mes == '10'){ echo "Outubro";} else
                                            if($mes == '11'){ echo "Novembro";} else
                                            if($mes == '12'){ echo "Dezembro";} 
                                        ?></label>
                                </td>
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
                  <div id="resultado-php">
                </div>
                <br><br>
                <div style="text-align: center;">
                    <label for="">X_________________________________________</label>
                    <br>
                    <label for="">Assinatura do responsável</label>
                </div>
        </div>
    </div>
</div>
<script>
function updateMes() {
    var curso = "<?php echo $curso; ?>";
    var turma = "<?php echo $turma; ?>";
    var materia = "<?php echo $materia; ?>";
    var mes = <?php echo $mes?>;

    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            document.getElementById("resultado-php").innerHTML = xhr.responseText;
        }
    };
    // Abre a conexão com o PHP para enviar os dados
    xhr.open("GET", "atualiza_relatorio.php?curso=" + curso 
        + '&turma=' + turma + '&materia=' + materia + '&mes=' + mes, true);

    // Envia a requisição
    xhr.send();
}
</script>

</body>
</html>
