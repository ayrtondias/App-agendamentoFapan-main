<?php
include('conexao.php');

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$confirmasenha = $_POST['confirmasenha'];

// Verifica se os campos foram preenchidos
if (empty($nome) || empty($email) || empty($senha)) {
    session_start();
    $_SESSION['registererro'] = "Por favor, preencha todos os campos.";
    header("location: register.php");
    exit();
}

else if ($senha!=$confirmasenha) {
    session_start();
    $_SESSION['registererro'] = "Sua confirmação de senha não corresponde.";
    header("location: register.php");
    exit();
}

// Proteção contra SQL Injection
$nome = mysqli_real_escape_string($conn, $nome);
$email = mysqli_real_escape_string($conn, $email);
$senha = mysqli_real_escape_string($conn, $senha);

$sql = "SELECT * FROM users WHERE email = '$email'";
$resultEmail = mysqli_query($conn, $sql);

if ($resultEmail && mysqli_num_rows($resultEmail) > 0) {
    session_start();
    $_SESSION['registererro'] = "Já existe uma conta com este email.";
    header("location: register.php");
    exit();
}

$query = "INSERT INTO users (nome, email, senha, ativo, admin) VALUES ('$nome', '$email', '$senha', 1, false)";
$result = mysqli_query($conn, $query);

if ($result) {
    session_start();
    $_SESSION['sucessoregister'] = "Cadastro de usuário efetuado.";
    header("location: index.php");
    exit();
} else {
    session_start();
    $_SESSION['registererro'] = "Ocorreu um erro ao cadastrar.";
    header("location: register.php");
    exit();
}
?>
