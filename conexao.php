<?php
$host = 'localhost';
$dbname = 'moovie';
$username = 'root';
$password = '';

try {
    $conexao = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erro de conexão com o banco de dados: " . $e->getMessage();
    exit;
}
?>