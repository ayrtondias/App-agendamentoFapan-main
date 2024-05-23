<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Página de Cadastro</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="../assets/fapan.png">
    <style>
        body {
            background-color: #fff; /* Fundo branco */
        }

        .container {
            background-color: #28a745; /* Verde escuro */
            border-radius: 10px;
            padding: 20px;
            margin-top: 50px;
            max-width: 500px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            color: #fff; /* Texto branco */
        }

        input[type="email"], input[type="password"] {
            background-color: #f8f9fa; /* Fundo cinza claro */
            border: none;
            border-radius: 5px;
            height: 40px;
            width: 100%;
            padding: 10px;
        }

        .btn-primary {
            background-color: #007bff; /* Azul padrão do Bootstrap */
            border: none;
        }

        .btn-primary:hover {
            background-color: #0056b3; /* Azul mais escuro ao passar o mouse */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="mb-4 text-center">Cadastro</h1>
        <form action = "register_sucesso.php" method="POST">
            <?php if(isset($_SESSION['registererro'])): ?>
            <div class="alert alert-danger" role="alert">
                <?=$_SESSION['registererro']?>
            </div>
            <?php unset($_SESSION['registererro']); session_destroy(); endif; ?>
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" class="form-control" name="nome" id="nome" placeholder="Digite seu nome">
            </div>
            <div class="form-group">
                <label for="email">E-mail:</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Digite seu e-mail">
            </div>
            <div class="form-group">
                <label for="senha">Senha:</label>
                <input type="password" class="form-control" name="senha" id="senha" placeholder="Digite sua senha">
            </div>
            <div class="form-group">
                <label for="confirmasenha">Confirmar Senha:</label>
                <input type="password" class="form-control" name="confirmasenha" id="confirmasenha" placeholder="Digite a senha novamente">
            </div>
            
            <button type="submit" class="btn btn-primary btn-block">Cadastrar</button>
        </form>
        <p class="mt-3 text-center">Já tem uma conta? <a href="index.php">Entrar com ela agora</a>.</p>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
