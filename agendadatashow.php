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
    <title>Pagina De Agendamento</title>
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
                <h1 class="mt-4 mb-4" style="text-align: center;">Agendar Datashow</h1>
                    <?php if(isset($_SESSION['sucessodatashow'])): ?>
                    <div class="alert alert-success" role="alert"><?=$_SESSION['sucessodatashow']?></div>
                    <?php unset($_SESSION['sucessodatashow']); endif; ?>
                    <?php if(isset($_SESSION['errodatashow'])): ?>
                    <div class="alert alert-danger" role="alert"><?=$_SESSION['errodatashow']?></div>
                    <?php unset($_SESSION['errodatashow']); endif; ?>
                    <form action="agendadatashow_sucesso.php" method="POST">
                    <input type="hidden" name="user" value="<?=$_SESSION['id']?>">
                    <label for = "data">
                        Selecione a data do agendamento:
                    </label>
                <input type = "date" required class="form-control" id = "data" name = "data">
                <br>
                <label for = "turno">
                        Selecione o turno:
                </label>
                <select class="form-control" id="turno" name="turno">
                <option value="1">Manhã</option>
                <option value="2">Tarde</option>
                <option value="3">Noite</option>
                </select>
                <br>
                <label for = "escolha_datashow">
                    Escolha entre os disponiveis:
                </label>
                <select class="form-control" name="datashow" required>
                <?php
                            $sql = "select * from equipamentos where disponibilidade = true;";
                            $result = mysqli_query($conn, $sql);
                            if ($result) {
                                while ($assoc = mysqli_fetch_assoc($result)) {
                                    echo '<option value="'.$assoc['id'].'">'.$assoc['numero_identificacao'].' '.$assoc['marca'].' | Série: '.$assoc['numero_serie'].'</option>';
                                }
                            } else {
                                echo "Erro ao executar a consulta: " . mysqli_error($connect);
                            }
                ?>
                </select>     
                <br>
                <button type="submit" class="btn btn-primary">Agendar Datashow</button>
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