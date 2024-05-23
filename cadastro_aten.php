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
    <title>Cadastro Atendente</title>
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
                    <h1 class="mt-4 mb-4" style="text-align: center;">Cadastro Atendente</h1>

                    <form action="cadastro_aten_sucesso.php" method="POST">
                    <input type="hidden" name="user" value="<?=$_SESSION['id']?>">
                    <label for = "nome">
                        Nome
                    </label>
                <input type="text" required class="form-control" name="nome">
                <br>
                <label for = "cpf">
                        CPF
                </label>
                <input type="text" required class="form-control" name="cpf">
                <br>
                <label for = "datanascimento">
                        Data de Nascimento
                </label>
                <input type = "date" required class="form-control" id = "data" name = "data">
                <br>
                <label for = "email">
                        E-mail
                </label>
                <input type="text" required class="form-control" name="email">
                <br><br>
                <button type="submit" class="form-control btn-primary">Cadastrar</button>
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