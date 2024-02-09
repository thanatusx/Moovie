<?php
require_once "conexao.php";
session_start();

$usuario = $_POST['usuario'];
$email = $_POST['email'];
$senha = $_POST['senha'];

$sql = "SELECT COUNT(*) AS count_usuario FROM usuarios WHERE usuario = :usuario";
$statement = $conexao->prepare($sql);
$statement->bindParam(':usuario', $usuario);
$statement->execute();
$resultado = $statement->fetch();

$usuarioExistente = ($resultado['count_usuario'] > 0);

$sql = "SELECT COUNT(*) AS count_email FROM usuarios WHERE email = :email";
$statement = $conexao->prepare($sql);
$statement->bindParam(':email', $email);
$statement->execute();
$resultado = $statement->fetch();

$emailExistente = ($resultado['count_email'] > 0);

if ($usuarioExistente || $emailExistente) {
    $erroHtml = '';
    if ($usuarioExistente) {
        header('Location: cadastro.html?error=1');
    }
    if ($emailExistente) {
        header('Location: cadastro.html?error=2');

    }
    echo $erroHtml;
    exit;
}

$senhaCriptografada = password_hash($senha, PASSWORD_DEFAULT);
$sql = "INSERT INTO usuarios (usuario, email, senha) VALUES (:usuario, :email, :senha)";
$statement = $conexao->prepare($sql);
$statement->bindParam(':usuario', $usuario);
$statement->bindParam(':email', $email);
$statement->bindParam(':senha', $senhaCriptografada);

if ($statement->execute()) {
    $_SESSION['usuario'] = $usuario;
    header('Location: home.html');
} else {
    echo "Erro ao cadastrar: " . $statement->errorInfo()[2];
}
?>