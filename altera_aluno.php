<?php
session_start();
include("conexao.php");

$id_aluno = $_GET['id_aluno'];
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
</head>
<body>
    <div class="d-flex" id="wrapper">
    <?php include("menulateral.php"); ?>
        
        <div id="page-content-wrapper" class="container-fluid">
            
            <div class="card">
                <div class="card-body">
                    <h1 class="mt-4 mb-4" style="text-align: center;">Alterar dados do aluno</h1>

                    <form action="altera_aluno_sucesso.php?id_aluno= <?=$id_aluno?>" method="POST">

                    <?php
                        $sql = "SELECT * FROM aluno WHERE id_aluno = $id_aluno";
                        $resultado = $conn->query($sql);
                                                   

                        if ($resultado->num_rows > 0) {
                            while ($assoc = $resultado->fetch_assoc()) {
                                $nome_turma = $assoc['turma'];
                                $curso = "SELECT * FROM curso WHERE id = " . $assoc['curso'];
                                $resultado_curso = $conn->query($curso);
                                
                                while ($row = $resultado_curso->fetch_assoc()) {
                                    $id_curso = $row['id'];
                                    $nome_curso = $row['nome']; 
                                }
                                ?>          

                                <input type="hidden" name="user" value="<?=$_SESSION['id']?>">
                                <label for = "nome">
                                    Nome
                                    </label>
                                <input type="text" required class="form-control" name="nome" value="<?= $assoc['nome']?>">
                                <br>
                                <label for = "cpf">
                                        CPF
                                </label>
                                <input type="text" required class="form-control" name="cpf" value="<?= $assoc['cpf']?>">
                                <br>
                                <label for = "datanascimento">
                                        Data de Nascimento
                                </label>
                                <input type = "date" required class="form-control" id = "data" name = "data" value="<?= date('Y-m-d', strtotime($assoc['data_nasc']))?>">
                                <br>
                                <label for = "email">
                                        E-mail
                                </label>
                                <input type="text" required class="form-control" name="email" value="<?= $assoc['email']?>">
                                <br>
                                <label for = "curso">
                                        Curso
                                </label>
                                <select name="curso" class="form-control" id="curso" onchange="getTurmas()">
                                    <option value='<?= $id_curso ?>'><?= $nome_curso;?> - curso que o aluno esta matriculado </option>
                                    <?php
                                    $sql = "SELECT * FROM curso ORDER BY nome ASC";
                                    $resultado = $conn->query($sql);                       

                                    if ($resultado->num_rows > 0) {
                                        while ($row = $resultado->fetch_assoc()) {
                                            echo "<option value='" . $row['id'] . "'>" . $row['nome'] .  "</option>";
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
                                    <select name="turma" class="form-control" id="turma">
                                        <?php if($nome_turma){                    
                                        ?>
                                            <option value='<?= $nome_turma ?>'><?= $nome_turma;?></option>
                                            <?php
                                        } else {?>
                                        <option value=''>Selecione uma turma</option>
                                        <?php
                                        }
                                            $sql = "SELECT * FROM turma WHERE curso = $id_curso ORDER BY nome ASC";
                                            $resultado = $conn->query($sql);                       

                                            if ($resultado->num_rows > 0) {
                                                while ($row = $resultado->fetch_assoc()) {
                                                    echo "<option value='" . $row['nome'] . "'>" . $row['nome'] . "</option>";
                                                }
                                            } else {
                                                echo "<option value=''>Nenhum turma encontrado</option>";
                                            }                                        
                                        ?>
                                        <option value=''>Sem turma</option>
                                    </select>
                                <br>
                            <br>
                            <button type="submit" class="form-control btn-primary">Cadastrar</button>

                            <?php
                            
                        }
                    }
                ?>
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
    </script>    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>