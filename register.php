<?php
include("conexao.php");
session_start();

if(isset($_SESSION['id']) && isset($_SESSION['user'])){
    header("Location: home.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
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
        href="style/register.css">

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

    <title>Registro | MOOVIE</title>
</head>
<body>
    <section class="register-form" style="background-image: url(images/background/banner.svg);">
        <div class="formlogin-container">
            <div class="titulologin text-center">
                <h1>CADASTRO</h1>
                <div id="user-error">Usuário já está sendo usado!</div>
                <div id="email-error">Email já está sendo usado!</div>
                <div id="sql-error">Ocorreu um erro.</div>
                <div id="empty-error">Preencha todos os campos!</div>
                <div id="password-error">As senhas devem ser compatíveis!</div>
            </div>

            <form id="form" action="register.php" method="POST">
                <div class="campo">
                    <label id="lblusuario">Usuário:</label>
                    <div class="text-center"><input class="inputtxt required" type="text" id="usuario" name="user" autocomplete="off" oninput="nameValidate()"></div>
                    <span class="span-required">Usuário deve ter no mínimo 3 caracteres.</span>
                </div>
                
                <div class="campo">
                    <label id="lblemail">E-mail:</label>
                    <div class="text-center"><input class="inputtxt required" type="email" id="email" name="email" autocomplete="off" oninput="emailValidate()"></div>
                    <span class="span-required">Digite um e-mail válido.</span>
                </div>
                
                <div class="campo password-container">
                    <label class="lblsenha">Senha:</label>
                    <div class="text-center"><input class="inputtxt required" type="password" id="senha" name="password" oninput="mPasswordValidate()"></div>
                    <ion-icon name="eye-outline" id="eye"></ion-icon>
                    <span class="span-required">Senha deve conter no mínimo 8 caracteres.</span>
                </div>
                <div class="campo">
                    <label class="lblsenha">Confirmar senha:</label>
                    <div class="text-center"><input class="inputtxt required" type="password" name="cpassword" id="confirmarsenha" oninput="comparePassword()"></div>
                    <span class="span-required">As senhas devem ser compatíveis.</span>
                </div>
                <div class="text-center botoes">
                    <input class="" id="submit" type="submit" value="Cadastrar">
                </div>
            </form>
        </div>
    </section>

    <!-- BIBLIOTECA PERSONALIZADA -->
    <script src="script/register.js"></script>

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
</html>

<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = $_POST['user'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $cpassword = $_POST['cpassword'];

    $sqluser = "SELECT COUNT(*) AS count_user FROM users WHERE user = '$username'";
    $resultuser = mysqli_query($conn, $sqluser);
    if ($resultuser) {
        $row = mysqli_fetch_assoc($resultuser);
        if ($row['count_user'] > 0) {
            //Usuário ja existente
            header('Location: register.php?error=1');
            exit();
        }
    } else {
        //Erro no sql
        header('Location: register.php?error=3');
        exit();
    }

    $sqlemail = "SELECT COUNT(*) AS count_email FROM users WHERE email = '$email'";
    $resultemail = mysqli_query($conn, $sqlemail);
    if ($resultemail) {
        $row = mysqli_fetch_assoc($resultemail);
        if ($row['count_email'] > 0) {
            //E-mail ja existente
            header('Location: register.php?error=2');
            exit();
        }
    } else {
        //Erro no sql
        header('Location: register.php?error=3');
        exit();
    }

    if (empty($username) || empty($email) || empty($password) || empty($cpassword)) {
        header('Location: register.php?error=4');
        exit();
    } else {
        if ($password != $cpassword) {
            //Senhas diferem
            header('Location: register.php?error=5');
            exit();
        }
        
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (user, email, password) VALUES ('$username', '$email', '$hash')";
        try {
            mysqli_query($conn, $sql);
            //Cadastro bem sucedido
            header('Location: login.php');
            exit();
        } catch (mysqli_sql_exception $e) {
            //Erro no sql
            header('Location: register.php?error=3');
            exit();
        }
    }
}

mysqli_close($conn);
?>
