<?php
session_start();
include('conexao.php');

if(isset($_GET['user'])) {
    $id_user = $_GET['user'];

    $sql = "SELECT * FROM users WHERE id = $id_user";
    $result = mysqli_query($conn, $sql);

    if($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $nome = $row['nome'];
        $email = $row['email'];
    } else {
        $_SESSION['erro'] = "Usuário não encontrado.";
        header("Location: pagina_de_erro.php");
        exit();
    }
} else {
    $_SESSION['erro'] = "ID do usuário não fornecido.";
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
            <h1 class="mt-4 mb-4">Editar Usuário</h1>
            <div class="card">
                <div class="card-body">
                    <?php if(isset($_SESSION['sucesso'])): ?>
                        <div class="alert alert-success" role="alert"><?=$_SESSION['sucesso']?></div>
                        <?php unset($_SESSION['sucesso']); endif; ?>
                    <h2 class="card-title text-center">Editar Usuário</h2>
                    <form method="post" action="atualizar_user.php" class="form">
                        <div class="form-group">
                            <label for="nome">Nome</label>
                            <input type="text" id="nome" name="nome" class="form-control" required value="<?=$nome?>">
                        </div>
                        <div class="form-group">
                            <label for="email">Número de Série</label>
                            <input type="email" id="email" name="email" class="form-control" required value="<?=$email?>">
                        </div>
                        <input type="hidden" name="id_user" value="<?=$id_user?>">
                        <button type="submit" class="btn btn-primary btn-block">Finalizar Alterações</button><br>
                        
                    </form>
                        <a href="listausuarios.php"><button class="btn btn-primary btn-block">Voltar para lista de usuários</button></a>
                </div>
            </div>
        </div>
    </div>
        
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>