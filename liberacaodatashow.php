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
    <title>Agendamentos Datashow</title>
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
                <h1 class="mt-4 mb-4" style="text-align: center;">Agendamentos de Datashows</h1>
                <?php if(isset($_SESSION['sucessodatashow'])): ?>
                    <div class="alert alert-success" role="alert"><?=$_SESSION['sucessodatashow']?></div>
                    <?php unset($_SESSION['sucessodatashow']); endif; ?>
                    
                <table class="table table-striped">
                    <thead>
                    <tr>
                    <th scope="col">Usuário</th>
                    <th scope="col">Solicitante</th>
                    <th scope="col">Recurso ID</th>
                    <th scope="col">Recurso Marca</th>
                    <th scope="col">Data</th>
                    <th scope="col">Turno</th>
                    <th scope="col">Status</th>
                    <th scope="col">Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    if($_SESSION['funcao'] == 1){
                        $funcao = "professor";
                    } else if($_SESSION['funcao'] == 2){
                        $funcao = "professor";
                    } else if($_SESSION['funcao'] == 3){
                        $funcao = "atendente";
                    }
                        
                            $sql = "SELECT agendamentodatashow.equipamento as datashow_id, 
                            equipamentos.numero_identificacao as datashow_identificacao, 
                            equipamentos.marca as datashow_marca,
                            agendamentodatashow.solicitante as nome, 
                            agendamentodatashow.id as agendamento_id, 
                            agendamentodatashow.dataturno as agendamentodataturno, 
                            agendamentodatashow.turno as agendamentoturno, 
                            agendamentodatashow.ativo as agendamentoativo,
                            agendamentodatashow.usuario as usuario_id 
                            FROM agendamentodatashow 
                            inner join equipamentos on agendamentodatashow.equipamento = equipamentos.id  
                            ORDER BY agendamento_id DESC;";                        
                            $result = mysqli_query($conn, $sql);
                            if ($result) {
                                while ($assoc = mysqli_fetch_assoc($result)) {
                                    $usuario = $assoc['usuario_id'];
                                    $query = "SELECT * FROM users where id = $usuario";
                                    $resultado = mysqli_query($conn, $query);
                                    if ($resultado) {
                                        while ($row = mysqli_fetch_assoc($resultado)) {
                                            $funcao_id = $row['funcao'];
                                            if($funcao_id == 1){
                                                $funcao = "administrador";
                                            } else if($funcao_id == 2){
                                                $funcao = "professor";
                                            } else if($funcao_id == 3){
                                                $funcao = "atendente";
                                            }
                                                $sql = "SELECT * FROM $funcao p JOIN users u WHERE id_user = $usuario";
                                                $resultado = $conn->query($sql);                      
                                                if ($resultado->num_rows > 0) {
                                                    while ($row = $resultado->fetch_assoc()) {
                                                        $nome = $row['nome'] ;
                                                    }
                                                } 
                                        }
                                    }
                                    echo '<tr>';
                                    echo '<th scope="row">'.$nome.'</th>';
                                    echo '<th scope="row">'.$assoc['nome'].'</th>
                                    <th scope="row">'.$assoc['datashow_identificacao'].'</th>
                                    <th scope="row">'.$assoc['datashow_marca'].'</th>
                                    <td>'.date('d/m/Y', strtotime($assoc['agendamentodataturno'])).'</td>
                                    <td>'.($assoc['agendamentoturno'] == 1 ? 'Manhã' : ($assoc['agendamentoturno'] == 2 ? 'Tarde' : ($assoc['agendamentoturno'] == 3 ? 'Noite' : 'Não'))) .'</td>
                                    <td>'.($assoc['agendamentoativo'] == 0 ? 'Cancelado' : 'OK').'</td>
                                    ';
                                    if($assoc['agendamentoativo']==1){
                                        echo '<td><a onclick="canceladatashow('.$assoc['agendamento_id'].');"><button type="button" class="btn btn-danger">Cancelar</button></a></td>';
                                    }
                                    else {
                                        echo '<td></td>';
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