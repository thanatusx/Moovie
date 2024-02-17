<?php 
session_start(); 
include "conexao.php";

if(isset($_SESSION['id']) && isset($_SESSION['user'])){
    header("Location: home.php");
    exit();
}
?>

<!DOCTYPE php>
<php lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/icons/logomoovie.ico">

    <!-- BIBLIOTECAS PERSONALIZADAS -->
    <link
        rel="stylesheet" 
        href="style/header.css">

    <link
        rel="stylesheet" 
        href="style/login.css">

    <!-- BIBLIOTECA BOOTSTRAP -->
    <link
        rel="stylesheet" 
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" 
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" 
        crossorigin="anonymous">
    
    <!-- BIBLIOTECA FONT AWESOME -->
    <link 
        rel="stylesheet" 
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" 
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" 
        crossorigin="anonymous" 
        referrerpolicy="no-referrer"/>

    <title>Login | MOOVIE</title>
</head>
<body>
    <section class="register-form" style="background-image: url(images/background/banner.svg);">
        <div class="formlogin-container">
            <div class="titulologin text-center">
                <h1>LOGIN</h1>
                <div id="user-error">Usuário incorreto!</div>
                <div id="password-error">Senha incorreta!</div>
                <div id="empty-error">Preencha todos os campos!</div>
            </div>

            <form id="form" action="login.php" method="POST">
                <div class="campo">
                    <label id="lblusuario">Usuário:</label>
                    <div class="text-center"><input class="inputtxt required" type="text" id="usuario" name="user" autocomplete="off"></div>
                </div>
                
                <div class="campo password-container">
                    <label class="lblsenha">Senha:</label>
                    <div class="text-center"><input class="inputtxt required" type="password" id="senha" name="password"></div>
                    <ion-icon name="eye-outline" id="eye"></ion-icon>
                </div>
                <div class="botoes text-center">
                    <input id="submit" type="submit" value="Login">
                    <a href="register.php">Cadastrar</a>
                </div>
            </form>
        </div>
    </section>

    <!-- BIBLIOTECA PERSONALIZADA -->
    <script src="script/login.js"></script>

    <!-- BOOTSTRAP JS -->
    <script 
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous">
    </script>

    <!-- FONT AWESOME JS -->
    <script 
        src="https://kit.fontawesome.com/a2edaa36f8.js"
        crossorigin="anonymous">
    </script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
</body>
</php>

<?php
    if (isset($_POST['user']) && isset($_POST['password'])) {

        $username = ($_POST['user']);
        $password = ($_POST['password']);

        if (empty($username)) {
            header("Location: login.php?error=1");
            exit();
        } elseif (empty($password)) {
            header("Location: login.php?error=1");
            exit();
        } else {
            $sql = "SELECT * FROM users WHERE user='$username'";
            $result = mysqli_query($conn, $sql);

            if ($result && mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                if (password_verify($password, $row['password'])) {
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['user'] = $row['user'];
                    header("Location: home.php");
                    exit();
                } else {
                    // Senha incorreta
                    header("Location: login.php?error=3");
                    exit();
                }
            } else {
                // Usuário não encontrado
                header("Location: login.php?error=2");
                exit();
            }
        }
    } else {
        header("Location: login.php");
        exit();
    }
mysqli_close($conn);
?>
