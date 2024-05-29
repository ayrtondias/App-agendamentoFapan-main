<?php
include("conexao.php");
session_start();
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
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="d-flex" id="wrapper">
    <?php include("menulateral.php"); ?>
        
        <div id="page-content-wrapper" class="container-fluid">
            
            <div class="card">
                <div class="card-body">
                <h1 class="mt-4 mb-4" style="text-align: center;">Relatorio de Frequência</h1>

                    <form action="listar_relatorio_frequencia.php" method="GET">

                                <label for = "curso">
                                        Curso
                                </label>
                                <select name="curso" class="form-control" id="curso" onchange="getTurmas() , getMateria()">
                                    <option value=''>Selecione o curso</option>
                                    <?php
                                    $sql = "SELECT * FROM curso ORDER BY nome ASC";
                                    $resultado = $conn->query($sql);                       

                                    if ($resultado->num_rows > 0) {
                                        while ($row = $resultado->fetch_assoc()) {
                                            echo "<option value='" . $row['id'] . "'>"  . $row['nome'] . "</option>";
                                        }
                                    } else {
                                        echo "<option value=''>Nenhum curso encontrado</option>";
                                    }
                                    ?>
                                </select>
                                <br>
                                <label for = "turma">
                                            Turma
                                    </label>
                                    <select name="turma" required class="form-control" id="turma">
                                        <option value=''>Selecione uma turma</option>                                        
                                    </select>
                                <br>
                                <label for = "materia">
                                            Materia
                                    </label>
                                    <select name="materia" required class="form-control" id="materia">
                                        <option value=''>Selecione uma materia</option>                                        
                                    </select>
                                <br>
                            <br>
                            <button type="submit" class="form-control btn-primary">Gerar</button>

                </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        function getTurmas() {
            var cursoId = document.getElementById("curso").value;

            // Limpar o select de turmas
            var turmaSelect = document.getElementById("turma");
            turmaSelect.innerHTML = '<option value="">Selecione uma Turma</option>';

            if (cursoId !== "") {
                // Requisição AJAX para obter as turmas correspondentes ao curso selecionado
                var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    document.getElementById("turma").innerHTML = xhr.responseText;
                }
            };
            xhr.open("GET", "buscar_turmas.php?curso_id=" + cursoId, true);
            xhr.send();
            }
        }
        function getMateria() {
            var cursoId = document.getElementById("curso").value;

            // Limpar o select de turmas
            var turmaSelect = document.getElementById("materia");
            turmaSelect.innerHTML = '<option value="">Selecione uma materia</option>';

            if (cursoId !== "") {
                // Requisição AJAX para obter as turmas correspondentes ao curso selecionado
                var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    document.getElementById("materia").innerHTML = xhr.responseText;
                }
            };
            xhr.open("GET", "buscar_materia.php?curso_id=" + cursoId, true);
            xhr.send();
            }
        }
        
    </script>    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>