<?php
include("conexao.php");
session_start();

if(!isset($_SESSION['id']) && !isset($_SESSION['user'])){
    header("Location: login.php");
    exit();
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $user_id = $_SESSION['id'];
    $bio = $_POST['bio'];
    $old_pfp_path = $_SESSION['pfp'];
    $username = $_SESSION['user'];

    if (isset($_FILES["file"]) && $_FILES["file"]["error"] == UPLOAD_ERR_OK) {
        $uploadDir = "images/upload-pfp/";
        $file = $username . '_' . uniqid() . '_' . basename($_FILES["file"]["name"]);
        $uploadPath = $uploadDir . $file;

        if (move_uploaded_file($_FILES["file"]["tmp_name"], $uploadPath)) {
            $sql = "UPDATE profile SET bio = '$bio', pfp = '$uploadPath' WHERE user_id = '$user_id'";
        } else {
            // Falha ao mover o arquivo enviado para a pasta
            header("Location: edit-profile.php?error=2");
            exit();
        }
    } else {
        $sql = "UPDATE profile SET bio = '$bio' WHERE user_id = '$user_id'";
    }

    $result = mysqli_query($conn, $sql);
    if ($result) {
        $_SESSION['bio'] = $bio;
        $_SESSION['pfp'] = $uploadPath ?? $_SESSION['pfp'];
        
        if (!empty($old_pfp_path)) {
            unlink($old_pfp_path);
        }

        header("Location: profile.php");
        exit();
    } else {
        // Falha na atualização
        header("Location: edit-profile.php?error=1");
        exit();
    }
}
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images//icons/logomoovie.ico">

    <!-- BIBLIOTECAS PERSONALIZADAS -->
    <link rel="stylesheet" href="style/header.css">
    <link rel="stylesheet" href="style/profile.css">

    <!-- BIBLIOTECA BOOTSTRAP -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
    <!-- BIBLIOTECA FONT AWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer"/>

    <title>Editar perfil | MOOVIE</title>
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

    <section class="secao-perfil">
        <div class="conteudoperfil container">
            <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="POST" enctype="multipart/form-data">
                <div class="edit-pfp">
                    <input type="file" id="fileInput" name="file" accept="image/*">
                    <div id="preview"></div>
                </div>
                <div class="data">
                    <div class="name header-data d-flex">
                        <h1><?php echo $_SESSION['user'];?></h1>
                    </div>
                    <div class="bio mt-3">
                        <input type="text" name="bio" maxlength="255" placeholder="Biografia..." value="<?php echo $_SESSION['bio']; ?>">
                    </div>
                    <div class="save">
                        <input type="submit" value="SALVAR">
                    </div>
                </div>
            </form>
        </div>
    </section>

    <!-- BIBLIOTECA PERSONALIZADA -->
    <script src="script/edit-profile.js"></script>

    <!-- BOOTSTRAP JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <!-- FONT AWESOME JS -->
    <script src="https://kit.fontawesome.com/a2edaa36f8.js" crossorigin="anonymous"></script>
</body>
</html>
