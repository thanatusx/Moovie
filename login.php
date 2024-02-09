<?php
require_once "conexao.php";
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    $sql = "SELECT id, senha FROM usuarios WHERE usuario = :usuario";
    $statement = $conexao->prepare($sql);
    $statement->bindParam(':usuario', $usuario);
    $statement->execute();

    $resultado = $statement->fetch();

    if ($resultado && password_verify($senha, $resultado['senha'])) {
        $_SESSION['usuario'] = $resultado['id'];
        header('Location: home.html');
        exit;
    } else {
        header('Location: login.html?error=1');
        exit;
    }
}
?>