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
    <title>Lista Datashow</title>
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
                <h1 class="mt-4 mb-4" style="text-align: center;">Listagem de Datashow</h1>
                <?php if(isset($_SESSION['sucessoliberacaodatashow'])): ?>
                    <div class="alert alert-success" role="alert"><?=$_SESSION['sucessoliberacaodatashow']?></div>
                    <?php unset($_SESSION['sucessoliberacaodatashow']); endif; ?>
                <table class="table table-striped">
                    <thead>
                    <tr>
                    <th scope="col">Identificação</th>
                    <th scope="col">Marca</th>
                    <th scope="col">Série</th>
                    <th scope="col">Disponibilidade</th>
                    <th scope="col">Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                            $sql = "select id as datashow_id, numero_identificacao as datashow_identificacao, marca as datashow_marca, numero_serie as datashow_serie, disponibilidade from equipamentos;";
                            $result = mysqli_query($conn, $sql);
                            if ($result) {
                                while ($assoc = mysqli_fetch_assoc($result)) {
                                    echo '
                                    <tr>
                                    <th scope="row">'.$assoc['datashow_identificacao'].'</th>
                                    <th scope="row">'.$assoc['datashow_marca'].'</th>
                                    <td>'.$assoc['datashow_serie'].'</td>
                                    ';
                                    if($assoc['disponibilidade']==false){
                                        echo '<td scope="row"><p>Indisponível</p><a href = "liberardatashow_sucesso.php?datashow='.$assoc['datashow_id'].'"><button type="button" class="btn btn-success">Liberar</button></a></td>';
                                    }
                                    else {
                                        echo '<td scope="row"><p>Disponível</p><a href = "bloqueardatashow.php?datashow='.$assoc['datashow_id'].'"><button type="button" class="btn btn-danger">Bloquear</button></a></td>';
                                    }
                                    echo '<td><a href = "editardatashow.php?datashow='.$assoc['datashow_id'].'"><button type="button" class="btn btn-primary btn-editar">Editar</button></a></td>';
                                    echo '<td><a onclick="removerDatashow('.$assoc['datashow_id'].');"><button type="button" class="btn btn-danger">Remover</button></a></td>';
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