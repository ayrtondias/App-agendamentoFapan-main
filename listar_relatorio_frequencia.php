<?php
session_start();
include("conexao.php");
$curso = $_GET['curso'];
$turma = $_GET['turma'];
$materia = $_GET['materia'];
$mes = isset($_GET['mes']) ? $_GET['mes'] : 1;
setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'portuguese');
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
</head>
<body>
<div class="d-flex" id="wrapper">
    <?php include("menulateral.php"); ?>
        
        <div id="page-content-wrapper" class="container-fluid">
            
            <div class="card">
                <h1 class="mt-4 mb-4" style="text-align: center;">Relatorio de Frequência</h1>

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
                                    <select name="mes" id="mes" style="border: none;" onchange="updateMes()">
                                    <option value="">Selecione Mes</option>
                                        <option value="01">Janeiro</option>
                                        <option value="02">Fevereiro</option>
                                        <option value="03">Março</option>
                                        <option value="04">Abril</option>
                                        <option value="05">Maio</option>
                                        <option value="06">Junho</option>
                                        <option value="07">Julho</option>
                                        <option value="08">Agosto</option>
                                        <option value="09">Setembro</option>
                                        <option value="10">Outubro</option>
                                        <option value="11">Novembro</option>
                                        <option value="12">Dezembro</option>
                                    </select>
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
                    
                <div class="card-body" style="overflow-y: auto;">         
                  <div id="resultado-php"></div>
                </div>
        </div>
    </div>
</div>
<script>
    function updateMes() {
    var mesSelecionado = document.getElementById("mes").value;
    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            document.getElementById("resultado-php").innerHTML = xhr.responseText;
        }
    };

    // Abre a conexão com o PHP para enviar os dados
    xhr.open("GET", "atualiza_relatorio.php?curso=<?php echo $curso;?>&turma=<?php echo $turma;?>&materia=<?php echo $materia;?>&mes=" + mesSelecionado, true);

    // Envia a requisição
    xhr.send();
}

function atualizar(alunoId, data) {
    // Verifica o select
    var select = document.getElementById(alunoId + "_" + data);
    var presente = select.checked ? 1 : 0; // 1 se estiver presente, 0 se não

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "atualizar_presenca.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            
        }
    };
    xhr.send("aluno_id=" + alunoId + "&data=" + data + "&presente=" + presente + "&materia=" + <?php echo $materia;?>);
}
</script>

</body>
</html>
