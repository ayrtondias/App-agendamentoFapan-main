

<div class="bg-light border-right" id="sidebar-wrapper" style="background:#008241!important;">
    <?php

        if($_SESSION['funcao'] == 1){
            $funcao = "administrador";
        } else if($_SESSION['funcao'] == 2){
            $funcao = "professor";
        } else if($_SESSION['funcao'] == 3){
            $funcao = "atendente";
        }
            $id_user = $_SESSION['id'];
            $sql = "SELECT * FROM $funcao p JOIN users u WHERE id_user = $id_user";
            $resultado = $conn->query($sql);                      
            if ($resultado->num_rows > 0) {
                while ($row = $resultado->fetch_assoc()) {
                    $nome = $row['nome'] ;
                }
            } 
        
        ?>
    <div class="sidebar-heading">
            	<p id="sidebar-heading-name">Olá, <?php echo $nome ?></p>
            	<div class="sidebar-button" onclick="sair()"><img  class="sidebar-button-img" src="assets/exit.png"></div>
    </div>
    
            
            <div class="sidebar-heading">
            	<p id="sidebar-heading-title">Menu Lateral</p>
            	<div class="sidebar-button" onclick="sideBarSwitch()"><img class="sidebar-button-img" src="assets/sidebar-icon.png"></div>
            </div>
            
            <div class="list-group list-group-flush">
                <!--<a href="dadoscadastrais" id="dadoscadastrais" class="list-group-item list-group-item-action bg-light">Dados Cadastrais</a>-->
                <a href="agendadatashow.php" id="agendadatashow" class="list-group-item list-group-item-action bg-light">Agendar Datashow</a>
                <a href="agendarlaboratorio.php" id="agendarlaboratorio" class="list-group-item list-group-item-action bg-light">Agendar Laboratorio</a>
                <a href="liberacaodatashow.php" id="liberacaodatashow" class="list-group-item list-group-item-action bg-light">Agendamentos de Recursos</a>
                <a href="liberacaolaboratorio.php" id="liberacaolaboratorio" class="list-group-item list-group-item-action bg-light">Agendamentos de Salas</a>
                <a href="alunos.php" id="alunos" class="list-group-item list-group-item-action bg-light">Alunos</a>
                
                <?php if ($_SESSION['funcao'] == 1): ?>
                <br>
                <a href="listadatashow.php" id="listadatashow" class="list-group-item list-group-item-action bg-light">Lista de Recursos</a>
                <a href="listalaboratorio.php" id="listalaboratorio" class="list-group-item list-group-item-action bg-light">Lista de Laboratorios</a>
                <a href="listausuarios.php" id="listausuarios" class="list-group-item list-group-item-action bg-light">Lista de Usuários</a>
                <a href="cadastro.php" id="cadastro" class="list-group-item list-group-item-action bg-light">Cadastro de Recursos</a>
                <?php endif; ?>
                <br>
                <?php if ($_SESSION['funcao'] == 1): ?>
                <a href="cadastro_prof.php" id="cadastro_prof" class="list-group-item list-group-item-action bg-light">Cadastro de Professor</a>
                <?php endif; ?>
                <?php if ($_SESSION['funcao'] == 1 || $_SESSION['funcao'] == 2): ?>
                <a href="cadastro_aten.php" id="cadastro_aten" class="list-group-item list-group-item-action bg-light">Cadastro de Atendente</a>
                <?php endif; ?>
                <a href="cadastro_aluno.php" id="cadastro_aluno" class="list-group-item list-group-item-action bg-light">Cadastro de Aluno</a>
                <a href="cadastro_turma.php" id="cadastro_turma" class="list-group-item list-group-item-action bg-light">Cadastro de Turma</a>
                <br>
                <a href="listar_turmas.php" id="listar_turmas" class="list-group-item list-group-item-action bg-light">Lista de Turmas</a>
                <a href="cadastro_mat.php" id="cadastro_mat" class="list-group-item list-group-item-action bg-light">Cadastro Materia</a>
                <a href="visita_tecnica.php" id="visita_tecnica" class="list-group-item list-group-item-action bg-light">Agendar Visita Tecnica</a>
                <a href="lista_vt.php" id="lista_vt" class="list-group-item list-group-item-action bg-light">Listar Visitas Tecnica</a>
                <a href="frequencia.php" id="frequencia" class="list-group-item list-group-item-action bg-light">Frequencia</a>
                <a href="relatorio_frequencia.php" id="relatorio_frequencia" class="list-group-item list-group-item-action bg-light">Frequencia Mensal</a>
                <br>
                <a href="editaruser.php" id="editaruser" class="list-group-item list-group-item-action bg-light">Editar usuario</a>
                <br>
            </div>
        </div>