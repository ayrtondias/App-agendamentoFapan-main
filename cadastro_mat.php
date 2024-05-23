<?php
session_start();
include('conexao.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Materia</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" type="image/png" href="../assets/fapan.png">
    <script type="text/javascript" src="script.js"></script>

    <style>
        .accordion{
    width:70%;
}
    </style>
</head>
<body>
    <div class="d-flex" id="wrapper">
        <?php include("menulateral.php"); ?>        
        <div id="page-content-wrapper" class="container-fluid">
            
            <div class="accordion" id="cadastroAccordion">
                <!-- Cadastro de Equipamento -->
                <div class="card">
                    <div class="card-header" id="equipamentoHeading">
                        <h2 class="mb-0">
                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#equipamentoCollapse" aria-expanded="true" aria-controls="equipamentoCollapse">
                                Cadastro Materia
                            </button>
                        </h2>
                    </div>
                    <div id="equipamentoCollapse" class="collapse show" aria-labelledby="equipamentoHeading" data-parent="#cadastroAccordion">
                        <div class="card-body">

                            <form method="post" action="cadastro_mat_sucesso.php" class="form">
                                <div class="form-group">
                                    <label for="nome_materia">Nome da Materia</label>
                                    <input type="text" id="nome_mat" name="nome_mat" class="form-control" required>
                                </div>
                                <br>
                                <label for="curso">Escolha um curso:</label>
                                    <select id="curso" name="curso" class="form-control" >
                                    <option value=''>Selecione um curso</option>
                                        <?php
                                        $sql = "SELECT * FROM curso ORDER BY nome ASC";
                                        $resultado = $conn->query($sql);                       

                                        if ($resultado->num_rows > 0) {
                                            while ($row = $resultado->fetch_assoc()) {
                                                echo "<option value=' ". $row['id'] ." '>" . $row['nome'] . "</option>";
                                            }
                                        } else {
                                            echo "<option value=''>Nenhum curso encontrado</option>";
                                        }
                                        ?>
                                    </select>
                                    <br>
                                <button type="submit" class="btn btn-primary btn-block">Cadastrar Materia</button>
                            </form>
                        </div>
                    </div>
                </div>
                
                <div class="card">
                    <div class="card-header" id="salaHeading">
                        <h2 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#salaCollapse" aria-expanded="false" aria-controls="salaCollapse">
                                Professor Responsável
                            </button>
                        </h2>
                    </div>
                    <div id="salaCollapse" class="collapse" aria-labelledby="salaHeading" data-parent="#cadastroAccordion">
                        <div class="card-body">
                            
                            <form method="post" action="responsavel_mat.php" class="form">
                                <div class="form-group">
                                    <label for="nome_materia">Nome da Materia</label>
                                    <input type="text" id="nome_materia" name="nome_materia" class="form-control" required>
                                    <div id="nomes-relacionados2"></div>

                                </div>
                                <div class="form-group">
                                    <label for="nome_professor">Nome do professor</label>
                                    <input type="text" id="nome_professor" name="nome_professor" class="form-control"  required>
                                    <div id="nomes-relacionados"></div>
                                    
                                </div>
                                <button type="submit" class="btn btn-primary btn-block">Cadastrar Sala</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
    document.getElementById('nome_professor').addEventListener('input', function() {
        var nomeDigitado = this.value;
        if (nomeDigitado.length > 0) {
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'buscar_nomes.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        var nomesRelacionados = JSON.parse(xhr.responseText);
                        var nomesHTML = '';
                        for (var i = 0; i < nomesRelacionados.length; i++) {
                            nomesHTML += '<div class="nome-relacionado">' + nomesRelacionados[i] + '</div>';
                        }
                        document.getElementById('nomes-relacionados').innerHTML = nomesHTML;
                    } else {
                        console.error('Erro ao buscar nomes relacionados');
                    }
                }
            };
            xhr.send('nome_professor=' + nomeDigitado);
        } else {
            document.getElementById('nomes-relacionados').innerHTML = '';
        }
    });

    document.addEventListener('click', function(e) {
        if (e.target && e.target.classList.contains('nome-relacionado')) {
            document.getElementById('nome_professor').value = e.target.textContent;
            document.getElementById('nomes-relacionados').innerHTML = '';
        }
    });
    </script>
    <script>
    document.getElementById('nome_materia').addEventListener('input', function() {
        var nomeDigitado = this.value;
        if (nomeDigitado.length > 0) {
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'buscar_nomes2.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        var nomesRelacionados = JSON.parse(xhr.responseText);
                        var nomesHTML = '';
                        for (var i = 0; i < nomesRelacionados.length; i++) {
                            nomesHTML += '<div class="nome-relacionado2">' + nomesRelacionados[i] + '</div>';
                        }
                        document.getElementById('nomes-relacionados2').innerHTML = nomesHTML;
                    } else {
                        console.error('Erro ao buscar nomes relacionados');
                    }
                }
            };
            xhr.send('nome_materia=' + nomeDigitado);
        } else {
            document.getElementById('nomes-relacionados2').innerHTML = '';
        }
    });

    document.addEventListener('click', function(e) {
        if (e.target && e.target.classList.contains('nome-relacionado2')) {
            document.getElementById('nome_materia').value = e.target.textContent;
            document.getElementById('nomes-relacionados2').innerHTML = '';
        }
    });
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
   
</body>
</html>
