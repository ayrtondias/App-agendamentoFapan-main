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
    <title>Cadastro Turma</title>
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
                    <h1 class="mt-4 mb-4" style="text-align: center;">Cadastro de Turma</h1>

                    <form action="cadastro_turma_sucesso.php" method="POST">
                    <input type="hidden" name="user" value="<?=$_SESSION['id']?>">
                    <label for = "nome_da_turma">
                        Nome da turma
                    </label>
                <input type="text" required class="form-control" name="nome">
                <br>
                <label for = "curso">
                        Curso
                </label>
                <select id="curso" class="form-control" name="curso">
                    <option value="">Selecione o Curso</option>
                    <?php 
                    $sql = "SELECT * FROM curso ORDER BY nome ASC";
                    $result = $conn->query($sql);                 
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row['id'] . "'>" . $row['nome'] . "</option>";
                        }
                    } else {
                        echo "<option value=''>Nenhuma curso encontrado</option>";
                    }
                    
                    ?>                    
                </select>
                <br>
                <label for = "serie">
                        Serie
                </label>
                <input type = "number" required class="form-control" id = "serie" name = "serie">
                <br>
                <label for = "período">
                        Período
                </label>
                <select id="periodo" required class="form-control" name="periodo">
                    <option value="">Selecione periodo</option>
                    <option value="1"><?php echo date('Y'); ?>/1</option>  
                    <option value="2"><?php echo date('Y'); ?>/2</option>                      
                </select>
                <br>
                <label for = "turno">
                        Turno
                </label>
                <br>
                
                <input type="radio" id="manha" name="turno" value="manha" onclick="atualizarSalas(this.value)">
                <label for="manha" style="margin-right: 10px;">Manhã</label>
                <input type="radio" id="tarde" name="turno" value="tarde" onclick="atualizarSalas(this.value)">
                <label for="tarde" style="margin-right: 10px;">Tarde</label>
                <input type="radio" id="noite" name="turno" value="noite" onclick="atualizarSalas(this.value)">
                <label for="noite" style="margin-right: 10px;">Noite</label>
                <br><br>

                <label for = "sala">
                        Sala
                </label>
                <select id="sala" class="form-control" name="sala">
                    <option value="">Selecione um turno</option>                    
                </select>
                
                <br>
                <br>
                <button type="submit" class="form-control btn-primary">Cadastrar</button>
                </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        function atualizarSalas(turno) {
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    document.getElementById("sala").innerHTML = xhr.responseText;
                }
            };
            xhr.open("GET", "obter_salas.php?turno=" + turno, true);
            xhr.send();
        }
    </script>        
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>