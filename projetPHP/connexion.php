<?php
    session_start();
    require_once 'global.php';
    require_once 'bd.php';

    if (!empty($_POST['email']) && !empty($_POST['mdp'])) {
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

            if ($version[0] == $email){
                header('Location: infoCompte.php');
                exit;
            }
            else{
                $errorMessage = 'Email non utilisé';
                header('Location: inscription.php?error=' . urlencode($errorMessage));
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
            <p>Email</p>
            <p><input type="text" name="email" class="input" required></p>
            <label for="userPassword">Mot de passe</label>
            <p><input id="userPassword" type="password" name="mdp" required></p>
            <label>
                <input type="checkbox" name="remember"> Se souvenir de moi
            </label>
            <p><button type="submit">Valider</button></p>
        </form>
    </div>
</body>

</html>