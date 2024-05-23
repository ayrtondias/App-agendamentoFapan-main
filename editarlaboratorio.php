<?php
session_start();
include('conexao.php');

if(isset($_GET['laboratorio'])) {
    $id_lab = $_GET['laboratorio'];

    $sql = "SELECT * FROM laboratorios WHERE id = $id_lab";
    $result = mysqli_query($conn, $sql);

    if($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $nome_sala = $row['nome_sala'];
        $cadeiras = $row['cadeiras'];
    } else {
        $_SESSION['erro'] = "Laboratório não encontrado.";
        header("Location: liberacaolaboratorio.php");
        exit();
    }
} else {
    $_SESSION['erro'] = "ID do laboratório não fornecido.";
    header("Location: liberacaolaboratorio.php");
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
                    <h2 class="card-title text-center">Editar Laboratório</h2>
                    <form method="post" action="atualizar_laboratorio.php" class="form">
                        <div class="form-group">
                            <label for="nome_sala">Nome da Sala</label>
                            <input type="text" id="nome_sala" name="nome_sala" class="form-control" required value="<?=$nome_sala?>">
                        </div>
                        <div class="form-group">
                            <label for="cadeiras">Número de Série</label>
                            <input type="text" id="cadeiras" name="cadeiras" class="form-control" required value="<?=$cadeiras?>">
                        </div>
                        <input type="hidden" name="id_lab" value="<?=$id_lab?>">
                        <button type="submit" class="btn btn-primary btn-block">Atualizar Laboratório</button>
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