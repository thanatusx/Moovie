<?php
require_once "conexao.php";
session_start();
if (isset($_SESSION['usuario'])) {
    header('Location: perfil.html');
    exit;
} else {
    header('Location: login.html');
}
?>