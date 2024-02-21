<?php
    session_start();

    if(isset($_SESSION['id']) && isset($_SESSION['user'])){
        $bio = $_SESSION['bio'];
        $pfp = $_SESSION['pfp'];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images//icons/logomoovie.ico">

    <!-- BIBLIOTECAS PERSONALIZADAS -->
    <link
        rel="stylesheet" 
        href="style/header.css">

    <link
        rel="stylesheet" 
        href="style/profile.css">

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

    <title>Perfil | MOOVIE</title>
</head>
<body style="background-color: var(--indigo);">
    <!-- NAVBAR DESKTOP -->
    <header class="header py-2 d-none d-md-none d-lg-block" style="background-color: var(--rich-black);">
        <nav class="navbar navbar-custom container mt-3 mb-2">
            <div>
                <a class="logotxt" href="home.html">M<span>OO</span>VIE</a>
            </div>
            <ul class="text-center d-flex">
                <li class="px-5 nav-item"><a href="home.php">HOME</a></li>
                <li class="px-5 nav-item"><a href="movies.php">FILMES</a></li>
                <li class="px-5 nav-item"><a href="profile.php">PERFIL</a></li>
            </ul>
        </nav>
    </header>

    <!-- NAVBAR MOBILE -->
    <header class="header py-2 d-md-block d-lg-none" style="background-color: var(--rich-black);">
        <nav class="navbar navbar-custom container d-flex mt-3 mb-2">
            <div>
                <a class="logotxt" href="home.html">M<span>OO</span>VIE</a>
            </div>
            <ul class="nav-menu text-center px-0 z-3">
                <li class="py-3 nav-item"><a href="home.php">HOME</a></li>
                <li class="py-3 nav-item"><a href="movies.php">FILMES</a></li>
                <li class="py-3 nav-item"><a href="profile.php">PERFIL</a></li>
            </ul>
            <div class="menu">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
        </nav>
    </header>

    <section class="secao-perfil container">
        <div class="conteudoperfil">
            <div class="pfp">
                <img class="rounded-circle" src="<?php echo $_SESSION['pfp'];?>" alt="Foto de perfil" width="300" height="300">
            </div>
            <div class="data">
                <div class="name header-data d-flex">
                    <h1><?php echo $_SESSION['user'];?></h1>
                    <a href="edit-profile.php"><i class="fa-solid fa-pencil fa-xs"></i>&nbsp;&nbsp;EDITAR PERFIL</a>
                </div>
                <div class="bio justify">
                    <p> <?php echo $_SESSION['bio'];?>
                    </p>
                </div>
                <div class="logout">
                    <a href="logout.php"><i class="fa-solid fa-right-from-bracket fa-xs"></i>&nbsp;&nbsp;LOG OUT</a>
                </div>
            </div>
        </div>
    </section>
    <!-- BIBLIOTECA PERSONALIZADA -->
    <script src="script/header.js"></script>

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
    }
    else{
        header("Location: login.php");
        exit();
    }
?>