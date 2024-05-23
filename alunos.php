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
    <title>Alunos</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" type="image/png" href="../assets/fapan.png">
    <script type="text/javascript" src="script.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<body>
    <div class="d-flex" id="wrapper">
    <?php include("menulateral.php"); ?>
        
        <div id="page-content-wrapper" class="container-fluid">
            
            <div class="card">
                <div class="card-body">
                <h1 class="mt-4 mb-4" style="text-align: center;">Alunos</h1>

                
                <form action="" method="POST">
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
                    <input type="checkbox" id="checkbox_turma">
                    <label for="checkbox_turma">Mostrar apenas alunos sem turma</label>
                    <br>
                    
                </form>
                <br>
                    
                <table class="table table-striped">
                    <thead>
                    <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">CPF</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">turma</th>
                    <th scope="col">Acão</th>
                    </tr>
                    </thead>
                    <tbody id="alunos-container">
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
         document.getElementById('curso').addEventListener('change', function() {
            var curso = this.value;
            fetch('pesquisar_alunos.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'curso=' + encodeURIComponent(curso),
            })
            .then(response => response.text())
            .then(data => {
                document.getElementById('alunos-container').innerHTML = data;
            })
            .catch(error => console.error('Erro:', error));
        });

        document.getElementById('checkbox_turma').addEventListener('change', function() {
            var semTurma = this.checked;
            var curso = document.getElementById('curso').value;
            fetch('pesquisar_alunos.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'mostrar_sem_turma=' + semTurma +'&curso=' + curso,
            })
            .then(response => response.text())
            .then(data => {
                document.getElementById('alunos-container').innerHTML = data;
            })
            .catch(error => console.error('Erro:', error));
        });
    </script>    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>