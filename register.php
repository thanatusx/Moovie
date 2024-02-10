<?php
    include("conexao.php");
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
            <div id="titulologin">
                <h1 class="text-center">CADASTRO</h1>
            </div>
            <div class="text-center" id="user-error">Usuário já está sendo usado.</div>
            <div class="text-center" id="email-error">Email já está sendo usado.</div>
            <div class="text-center" id="senha-error">As senhas estão diferentes.</div>

            <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>" method="POST" onsubmit="return validarSenha();">
                <label id="lblusuario" for="usuario">Usuário:</label>
                <div class="text-center">
                    <input class="inputtxt" type="text" id="usuario" placeholder="Usuário..." name="user" autocomplete="off" required>
                </div>

                <label id="lblemail">E-mail:</label>
                <div class="text-center">
                    <input class="inputtxt" type="email" id="email" placeholder="Email..." name="email" autocomplete="off" required>
                </div>

                <label class="lblsenha"for="senha">Senha:</label>
                <div class="text-center">
                    <input class="inputtxt" type="password" id="senha" placeholder="Senha..." name="password" required>
                </div>

                <label class="lblsenha" for="confirmarSenha">Confirmar Senha:</label>
                <div class="text-center">
                    <input class="inputtxt" type="password" id="confirmarsenha" placeholder="Confirmar senha..."required>
                </div>
                <div class="text-center botoes">
                    <input class="" id="submit" type="submit" value="Cadastrar">
                </div>
            </form>
        </div>
    </section>

    <!-- BIBLIOTECA PERSONALIZADA -->
    <script src="script/header.js"></script>
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
</body>
</html>

<?php 
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $username = $_POST['user'];
        $password = $_POST['password'];
        $email = $_POST['email'];
    
        $sql = "SELECT COUNT(*) AS count_usuario FROM usuarios WHERE usuario = :usuario";
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

        $hash = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (user, email, password) VALUES ('$username', '$email', '$hash')";
    
        
            mysqli_query($conn, $sql);
            echo "User is registered";
        
    }

mysqli_close($conn); ?>