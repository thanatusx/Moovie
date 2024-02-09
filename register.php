<?php include("conexao.php"); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/logomoovie.ico">

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
    <section class="register-form" style="background-image: url(images/background/banner.webp);background-size: cover;background-repeat: repeat;">
        <div class="formlogin-container text-center">
            <div id="titulologin">
                <h1>CADASTRO</h1>
            </div>
            <div id="user-error">Usuário já está sendo usado.</div>
            <div id="email-error">Email já está sendo usado.</div>
            <div id="senha-error">As senhas estão diferentes.</div>

            <form action="register.php" method="POST" onsubmit="return validarSenha();">
                <label id="lblusuario" for="usuario">Usuário:</label>
                <input type="text" id="usuario" placeholder="Usuário..." name="usuario" autocomplete="off" required>

                <label id="lblemail" for="email">E-mail:</label>
                <input type="email" id="email" placeholder="Email..." name="email" autocomplete="off" required>

                <label class="lblsenha"for="senha">Senha:</label>
                <input type="password" id="senha" placeholder="Senha..." name="senha" required>

                <label class="lblsenha" for="confirmarSenha">Confirmar Senha:</label>
                <input type="password" id="confirmarSenha" placeholder="Confirmar senha..."required>

                <div id="botoes">
                    <input id="submit" type="submit" value="Cadastrar">
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

<?php mysqli_close($conn); ?>