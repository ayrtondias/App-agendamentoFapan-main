<?php
session_start();
include("conexao.php");
include("checkAdmin.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Recurso</title>
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
            <h1 class="mt-4 mb-4">Cadastro de Recurso</h1>
            <div class="accordion" id="cadastroAccordion">
                <!-- Cadastro de Equipamento -->
                <div class="card">
                    <div class="card-header" id="equipamentoHeading">
                        <h2 class="mb-0">
                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#equipamentoCollapse" aria-expanded="true" aria-controls="equipamentoCollapse">
                                Cadastro de Equipamento
                            </button>
                        </h2>
                    </div>
                    <div id="equipamentoCollapse" class="collapse show" aria-labelledby="equipamentoHeading" data-parent="#cadastroAccordion">
                        <div class="card-body">
                            <?php if(isset($_SESSION['sucesso'])): ?>
                                <div class="alert alert-success" role="alert"><?=$_SESSION['sucesso']?></div>
                                <?php unset($_SESSION['sucesso']); endif; ?>
                            <form method="post" action="cadastro_sucesso.php" class="form">
                                <div class="form-group">
                                    <label for="numero_identificacao">Número de Identificação</label>
                                    <input type="text" id="numero_identificacao" name="numero_identificacao" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="numero_serie">Número de Série</label>
                                    <input type="text" id="numero_serie" name="numero_serie" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="marca">Marca Datashow</label>
                                    <input type="text" id="marca" name="marca" class="form-control" required>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block">Cadastrar Datashow</button>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Cadastro de Sala -->
                <div class="card">
                    <div class="card-header" id="salaHeading">
                        <h2 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#salaCollapse" aria-expanded="false" aria-controls="salaCollapse">
                                Cadastro de Sala
                            </button>
                        </h2>
                    </div>
                    <div id="salaCollapse" class="collapse" aria-labelledby="salaHeading" data-parent="#cadastroAccordion">
                        <div class="card-body">
                            <?php if(isset($_SESSION['sucessolab'])): ?>
                                <div class="alert alert-success" role="alert"><?=$_SESSION['sucessolab']?></div>
                                <?php unset($_SESSION['sucessolab']); endif; ?>
                            <form method="post" action="laboratorio_sucesso.php" class="form">
                                <div class="form-group">
                                    <label for="nome_sala">Nome Da Sala</label>
                                    <input type="text" id="nome_sala" name="nome_sala" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="cadeiras">Número de Cadeiras</label>
                                    <input type="number" id="cadeiras" name="cadeiras" class="form-control" required>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block">Cadastrar Sala</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
