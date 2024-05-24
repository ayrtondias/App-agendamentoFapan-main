

<div class="bg-light border-right" id="sidebar-wrapper" style="background:#008241!important;">
    <?php if(isset($_SESSION['nome'])): ?>
    <div class="sidebar-heading">
            	<p id="sidebar-heading-name">Olá, <?=$_SESSION['nome']?></p>
            	<div class="sidebar-button" onclick="sair()"><img  class="sidebar-button-img" src="assets/exit.png"></div>
    </div>
    <?php endif; ?>
            
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
                <br>
                <?php if ($_SESSION['admin'] == true): ?>

                <a href="listadatashow.php" id="listadatashow" class="list-group-item list-group-item-action bg-light">Lista de Recursos</a>
                <a href="listalaboratorio.php" id="listalaboratorio" class="list-group-item list-group-item-action bg-light">Lista de Salas</a>
                <a href="listausuarios.php" id="listausuarios" class="list-group-item list-group-item-action bg-light">Lista de Usuários</a>
                <a href="cadastro.php" id="cadastro" class="list-group-item list-group-item-action bg-light">Cadastro de Recursos</a>
                <?php endif; ?>
                <br>
                <a href="cadastro_prof.php" id="cadastro" class="list-group-item list-group-item-action bg-light">Cadastro de Professor</a>
                <a href="cadastro_aten.php" id="cadastro" class="list-group-item list-group-item-action bg-light">Cadastro de Atendente</a>
                <a href="cadastro_aluno.php" id="cadastro" class="list-group-item list-group-item-action bg-light">Cadastro de Aluno</a>
                <a href="cadastro_turma.php" id="cadastro" class="list-group-item list-group-item-action bg-light">Cadastro de Turma</a>
                <br>
                <a href="cadastro_mat.php" id="cadastro" class="list-group-item list-group-item-action bg-light">Cadastro Materia</a>
                <a href="visita_tecnica.php" id="visita" class="list-group-item list-group-item-action bg-light">Agendar Visita Tecnica</a>
                <a href="lista_vt.php" id="visita" class="list-group-item list-group-item-action bg-light">Listar Visitas Tecnica</a>
                <a href="frequencia.php" id="frequencia" class="list-group-item list-group-item-action bg-light">Frequencia</a>
                <a href="relatorio_frequencia.php" id="relatorio" class="list-group-item list-group-item-action bg-light">Relatorio de frequencia</a>
                <br>
            </div>
        </div>