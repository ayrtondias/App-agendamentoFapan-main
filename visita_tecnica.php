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
    <title>Visita Técnica</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" type="image/png" href="../assets/fapan.png">
    <script type="text/javascript" src="script.js"></script>
</head>
<body>
    <div class="d-flex" id="wrapper">
    <?php include("menulateral.php"); ?>
        
        <div id="page-content-wrapper" class="container-fluid">
            
            <div class="card">
                <div class="card-body">
                    <h1 class="mt-4 mb-4" style="text-align: center;">Visita Técnica</h1>

                    <form action="visita_tecnica_sucesso.php" method="POST">

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
                                <label for = "materia">
                                            Materia
                                    </label>
                                    <select name="materia" required class="form-control" id="materia">
                                        <option value=''>Selecione uma materia</option>                                        
                                    </select>
                                <br>
                                <label for = "turma">
                                            Turma
                                    </label>
                                    <select name="turma" required class="form-control" id="turma">
                                        <option value=''>Selecione uma turma</option>                                        
                                    </select>
                                <br>
                                <label for = "data_visita">
                                        Data da visita
                                </label>
                                <input type = "date" required class="form-control" id = "data_visita" name = "data_visita">
                                <br>
                                <label for = "local">
                                        Local da visita
                                </label>
                                <input type = "text" required class="form-control" id = "local" name = "local">
                                <br>
                                <label for = "endereco">
                                        Endereço
                                </label>
                                <input type = "text" required class="form-control" id = "endereco" name = "endereco">
                                <br>
                                <div class="row g-2">
                                    <div class="col-sm-3 col-auto">
                                        <label for = "inicio">
                                            Inicio da visita
                                        </label>
                                        <select id = "inicio" name = "inicio" class="form-control">
                                            <?php
                                                for ($hora = 8; $hora <= 21; $hora++) {
                                                    if($hora == 21){
                                                        echo "<option value='21:00'>21:00</option>";
                                                    }else {
                                                        for ($minuto = 0; $minuto < 60; $minuto += 30) {
                                                            $horaFormatada = sprintf("%02d:%02d", $hora, $minuto);
                                                            echo "<option value=\"$horaFormatada\">$horaFormatada</option>";
                                                        }
                                                    }
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-3 col-auto">
                                        <label for = "fim">
                                            Fim da visita
                                        </label>
                                        <select id = "fim" name = "fim" class="form-control">
                                            <?php
                                                for ($hora = 9; $hora <= 22; $hora++) {
                                                    if($hora == 22){
                                                        echo "<option value='22:00'>22:00</option>";
                                                    }else {
                                                        for ($minuto = 0; $minuto < 60; $minuto += 30) {
                                                            $horaFormatada = sprintf("%02d:%02d", $hora, $minuto);
                                                            echo "<option value=\"$horaFormatada\">$horaFormatada</option>";
                                                        }
                                                    }
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            <br>
                            <button type="submit" class="form-control btn-primary">Agendar Visita</button>

                </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        function getTurmas() {
            var cursoId = document.getElementById("curso").value;

            var turmaSelect = document.getElementById("turma");
            turmaSelect.innerHTML = '<option value="">Selecione uma Turma</option>';

            if (cursoId !== "") {
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

            var turmaSelect = document.getElementById("materia");
            turmaSelect.innerHTML = '<option value="">Selecione uma materia</option>';

            if (cursoId !== "") {
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