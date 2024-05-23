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
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Users</title>
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
                <h1 class="mt-4 mb-4" style="text-align: center;">Usuários do Sistema</h1>
                <?php if(isset($_SESSION['sucessouser'])): ?>
                    <div class="alert alert-success" role="alert"><?=$_SESSION['sucessouser']?></div>
                    <?php unset($_SESSION['sucessouser']); endif; ?>
                <table class="table table-striped">
                    <thead>
                    <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Status</th>
                    <th scope="col">Admin</th>
                    <th scope="col">Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                            $sql = "select id, nome, email, ativo, admin from users;";
                            $result = mysqli_query($conn, $sql);
                            if ($result) {
                                while ($assoc = mysqli_fetch_assoc($result)) {
                                    echo '
                                    <tr>
                                    <td>'.$assoc['nome'].'</th>
                                    <td>'.$assoc['email'].'</th>
                                    <td>'.($assoc['ativo'] == 0 ? 'Bloqueado' : 'Ativo').'</td>
                                    <td>'.($assoc['admin'] == 1 ? 'Administrador' : 'Não').'</td>';
                                    if($assoc['ativo']==0){
                                        echo '<td><a href = "liberaruser_sucesso.php?user='.$assoc['id'].'"><button type="button" class="btn btn-success">Desbloquear</button></a><a href = "editaruser.php?user='.$assoc['id'].'"><button type="button" class="btn btn-primary btn-editar">Editar</button></a></td>';
                                    }
                                    else {
                                        echo '<td><a href = "bloquearuser_sucesso.php?user='.$assoc['id'].'"><button type="button" class="btn btn-danger">Bloquear</button></a><a href = "editaruser.php?user='.$assoc['id'].'"><button type="button" class="btn btn-primary btn-editar">Editar</button></a></td>';
                                    }
                                    echo '</tr>';
                                }
                            } else {
                                echo "Erro ao executar a consulta: " . mysqli_error($connect);
                            }
                ?>
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
        
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>