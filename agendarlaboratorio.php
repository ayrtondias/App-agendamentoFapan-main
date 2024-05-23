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
                    <h1 class="mt-4 mb-4" style="text-align: center;">Agendamento de Laboratório</h1>
                        <?php if(isset($_SESSION['sucessolaboratorio'])): ?>
                        <div class="alert alert-success" role="alert"><?=$_SESSION['sucessolaboratorio']?></div>
                        <?php unset($_SESSION['sucessolaboratorio']); endif; ?>
                        <?php if(isset($_SESSION['errolaboratorio'])): ?>
                        <div class="alert alert-danger" role="alert"><?=$_SESSION['errolaboratorio']?></div>
                        <?php unset($_SESSION['errolaboratorio']); endif; ?>
                        <form action="agendarlaboratorio_sucesso.php" method="POST">
                        <input type="hidden" name="user" value="<?=$_SESSION['id']?>">
                            <label for = "data">
                            Selecione a data do agendamento:
                        </label>
                    <input type = "date" required class="form-control" id = "data" name = "data">
                    <br>
                    <label for = "turno">
                            Selecione o turno:
                    </label>
                    <select class="form-control" name="turno" id="turno">
                    <option value="1">Manhã</option>
                    <option value="2">Tarde</option>
                    <option value="3">Noite</option>
                    </select>
                    <br>
                    <label for = "nome_sala">
                        Escolha os laboratorios disponiveis:
                    </label>
                    <select class="form-control" name="nome_sala" required>
                    <?php
                                $sql = "select * from laboratorios where disponibilidade = true;";
                                $result = mysqli_query($conn, $sql);
                                if ($result) {
                                    while ($assoc = mysqli_fetch_assoc($result)) {
                                        echo '<option value="'.$assoc['id'].'">'.$assoc['nome_sala'].'</option>';
                                    }
                                } else {
                                    echo "Erro ao executar a consulta: " . mysqli_error($connect);
                                }
                    ?>
                    </select>     
                    <br>
                    <button type="submit" class="btn btn-primary">Agendar laboratorio</button>
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