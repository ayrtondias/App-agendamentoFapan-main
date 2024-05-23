<?php
session_start();
include('conexao.php');

if(isset($_GET['datashow'])) {
    $id_datashow = $_GET['datashow'];

    $sql = "SELECT * FROM equipamentos WHERE id = $id_datashow";
    $result = mysqli_query($conn, $sql);

    if($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $numero_identificacao = $row['numero_identificacao'];
        $numero_serie = $row['numero_serie'];
        $marca = $row['marca'];
    } else {
        $_SESSION['erro'] = "Datashow não encontrado.";
        header("Location: pagina_de_erro.php");
        exit();
    }
} else {
    $_SESSION['erro'] = "ID do datashow não fornecido.";
    header("Location: pagina_de_erro.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Formulário</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" type="image/png" href="../assets/fapan.png">
    <script type="text/javascript" src="script.js"></script>
</head>
<body>
    <div class="d-flex" id="wrapper">
    <?php include("menulateral.php"); ?>
        
        <div id="page-content-wrapper" class="container-fluid">
            <h1 class="mt-4 mb-4">Editar Formulário</h1>
            <div class="card">
                <div class="card-body">
                    <?php if(isset($_SESSION['sucesso'])): ?>
                        <div class="alert alert-success" role="alert"><?=$_SESSION['sucesso']?></div>
                        <?php unset($_SESSION['sucesso']); endif; ?>
                    <h2 class="card-title text-center">Editar Equipamento</h2>
                    <form method="post" action="atualizar_equipamento.php" class="form">
                        <div class="form-group">
                            <label for="numero_identificacao">Número de Identificação</label>
                            <input type="text" id="numero_identificacao" name="numero_identificacao" class="form-control" required value="<?=$numero_identificacao?>">
                        </div>
                        <div class="form-group">
                            <label for="numero_serie">Número de Série</label>
                            <input type="text" id="numero_serie" name="numero_serie" class="form-control" required value="<?=$numero_serie?>">
                        </div>
                        <div class="form-group">
                            <label for="marca">Marca Datashow</label>
                            <input type="text" id="marca" name="marca" class="form-control" required value="<?=$marca?>">
                        </div>
                        <input type="hidden" name="id_datashow" value="<?=$id_datashow?>">
                        <button type="submit" class="btn btn-primary btn-block">Atualizar Datashow</button>
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