<?php
session_start();
require_once("navigation.html");
require_once 'global.php';
require_once 'bd.php';
?>

<!DOCTYPE html>
<html>

<head>
    <title>Info compte</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/assets/css/navigation.css">
    <meta name="viewport" content="width=device-width">
</head>

<body>
    <div class="container">
        <p>
        <?php
            $email = $_SESSION['email'];
            $stm = $test->prepare("SELECT nom,prenom,email,admin FROM client WHERE email = :email");
            $params = [':email' => $email];
            $stm->execute($params);
    
            $version = $stm->fetch();
        ?>
        </p>
        <p>Nom: <?= $version[0]; ?></p>
        <p>Prenom: <?=$version[1]; ?></p>
        <p>Email: <?= $version[2]; ?></p>
        <?php
            if($version[3]){
        ?>
                <p><a href="gestionbd.php">Gestion base de données</a></p>
            <?php   } ?>
        <p><a href="deconnexion.php">Déconnexion</a></p>
    </div>
</body>

</html>