<?php
    session_start();
    require_once 'global.php';
    require_once 'bd.php';

    if (!empty($_POST['email']) && !empty($_POST['mdp']) && !empty($_POST['nom']) && !empty($_POST['prenom'])) {
        $nom = htmlspecialchars($_POST['nom']);
        $prenom = htmlspecialchars($_POST['prenom']);
        $email = htmlspecialchars($_POST['email']);
        $_SESSION['email'] = $email;

        if (isset($_POST['remember']) && $_POST['remember'] === 'on') {
            setcookie('remember', $email, time() + 180);
        }

        if (!empty($_POST['email'])){
            $email = $_SESSION['email'];
            $stm = $test->prepare("SELECT email FROM client WHERE email = :email");
            $params = [':email' => $email];
            $stm->execute($params);
    
            $version = $stm->fetch();
            
            if ($version[0] != $email){
                $stm = $test->prepare("INSERT INTO client (nom,prenom,email,admin) VALUES (?,?,?,0);");
                $stm->execute([$nom, $prenom, $email]);

                header('Location: infoCompte.php');
                exit;
            }
            else{
                $errorMessage = 'Email déjà utilisé';
                header('Location: connexion.php?error=' . urlencode($errorMessage));
                exit;
            }
        }            
    }
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/assets/css/co-inscri.css">
    <meta name="viewport" content="width=device-width">
</head>

<body>
    <?php require_once 'navigation.html'; ?>

    <div class="container">
        <?php if (!empty($_GET['error'])) : ?>
            <p class="error"><?= urldecode($_GET['error']) ?></p>
        <?php endif ?>

        <form method="post">
            <p>Nom</p>
                <p><input type="text" name="nom"></p>
            <p>Prénom</p>
                <p><input type="text" name="prenom"></p>
            <p>Email</p>
                <p><input type="text" name="email"></p>
            <label for="userPassword">Mot de passe</label>
                <p><input id="userPassword" type="password" name="mdp"></p>
            <label>
                <input type="checkbox" name="remember"> Se souvenir de moi
            </label>
            <p><button type="submit">Valider</button></p>
        </form>
    </div>
</body>

</html>