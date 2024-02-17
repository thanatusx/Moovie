<?php
    session_start();

    if(isset($_SESSION['id']) && isset($_SESSION['user'])){
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>perfil</title>
</head>
<body>
    <?php echo $_SESSION['user']; ?>
</body>
</html>

<?php
    }
    else{
        header("Location: login.php");
        exit();
    }