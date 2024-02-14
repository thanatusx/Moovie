<?php
    include("conexao.php");
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $username = $_POST['user'];
        $password = $_POST['password'];
        $email = $_POST['email'];
    
        $sqluser = "SELECT COUNT(*) AS count_user FROM users WHERE user = '$username'";
        $resultuser = mysqli_query($conn, $sqluser);
        if ($resultuser) {
            $row = mysqli_fetch_assoc($resultuser);
            if ($row['count_user'] > 0) {
                $usuarioexistente = true;
            } else {
                $usuarioexistente = false;
            }
        } else {
            echo "Erro ao executar a consulta do usuario: " . mysqli_error($conn);
        }

        $sqlemail = "SELECT COUNT(*) AS count_email FROM users WHERE email = '$email'";
        $resultemail = mysqli_query($conn, $sqlemail);
        if ($resultemail) {
            $row = mysqli_fetch_assoc($resultemail);
            if ($row['count_email'] > 0) {
                $emailexistente = true;
            } else {
                $emailexistente = false;
            }
        } else {
            echo "Erro ao executar a consulta do email: " . mysqli_error($conn);
        }
        
        if ($usuarioexistente || $emailexistente) {
            if ($usuarioexistente) {
                header('Location: register.html?error=1');
            }
            if ($emailexistente) {
                header('Location: register.html?error=2');
            }
            exit;
        }

        $hash = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (user, email, password) VALUES ('$username', '$email', '$hash')";
        try{
            mysqli_query($conn, $sql);
            header('Location: login.html');
            echo "a";
        }catch(mysqli_sql_exception){
            header('Location: register.html?error=3');
        }
    }

mysqli_close($conn); ?>