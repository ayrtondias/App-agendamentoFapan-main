<?php
session_start();
include("conexao.php");

if($_SESSION['funcao'] == 1){
    $funcao = "professor";
} else if($_SESSION['funcao'] == 2){
    $funcao = "professor";
} else if($_SESSION['funcao'] == 3){
    $funcao = "atendente";
}
    $id_user = $_SESSION['id'];
    $sql = "SELECT * FROM $funcao f JOIN users u WHERE id_user = $id_user";
    $resultado = $conn->query($sql);                      
    if ($resultado->num_rows > 0) {
        while ($row = $resultado->fetch_assoc()) {
            $nome = $row['nome'];
            $cpf = $row['cpf'];
            $data_nasc = $row['data_nasc'];
            $email = $row['email'];
        }
    } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Professor</title>
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
                    <h1 class="mt-4 mb-4" style="text-align: center;">Editar</h1>

                    <form action="editaruser_sucesso.php" method="POST">
                    <input type="hidden" name="user" value="<?=$_SESSION['id']?>">
                    <input type="hidden" name="funcao" value="<?=$_SESSION['funcao']?>">
                    <label for = "nome">
                        Nome
                    </label>
                <input type="text" required class="form-control" name="nome" value="<?php echo $nome ?>">
                <br>
                <label for = "cpf">
                        CPF
                </label>
                <input type="text" required class="form-control" name="cpf" value="<?php echo $cpf ?>">
                <br>
                <label for = "datanascimento">
                        Data de Nascimento
                </label>
                <input type = "date" required class="form-control" id = "data" name = "data" value="<?php echo date('Y-m-d', strtotime($data_nasc)) ?>">
                <br>
                <label for = "email">
                        E-mail
                </label>
                <input type="text" required class="form-control" name="email" value="<?php echo $email ?>">
                <br>
                <div class="form-group">
                <label for="senha">Senha:</label>
                <input type="password" class="form-control" name="senha" id="senha" placeholder="Digite sua senha">
                </div>
                <div class="form-group">
                    <label for="confirmasenha">Confirmar Senha:</label>
                    <input type="password" class="form-control" name="confirmasenha" id="confirmasenha" placeholder="Digite a senha novamente">
                </div>
                <br>
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