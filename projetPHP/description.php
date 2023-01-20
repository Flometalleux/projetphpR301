<?php 
    session_start(); 
    require_once 'global.php';
    require_once 'navigation.html';
    require_once 'bd.php';

    $id = $_GET['id'];
    $stm = $test->prepare("SELECT titre,prixpublique,idmarque,description,descriptif,id FROM produit WHERE id = :id");
    $params = [':id' => $id];
    $stm->execute($params);

    $version = $stm->fetch();

    $id2 = $version[2];
    $stm2 = $test->prepare("SELECT nom FROM marque WHERE id = :id");
    $params2 = [':id' => $id2];
    $stm2->execute($params2);

    $version2 = $stm2->fetch();
    
?>

<!DOCTYPE html>
<html lang="fr" >
    <head>
        <title>Articles</title>
        <link rel="stylesheet" href="/assets/css/description.css">
    </head>
    <body>
        <main>
            <section class='article-desc'>
                <img src="assets/img/<?=$version[5]?>.jpg" class="img-apercu-gauche" alt="image produit">
                <section class="texte-desc">
                    <h2><?= $version[0]; ?></h2>
                    <p>Prix : <?= $version[1]; ?>€</p>
                    <p>Edition : <?= $version2[0]; ?></p>
                    <p><?= $version[3]; ?></p>
                    <p><?= $version[4]; ?></p>
                    <div class="bouton">
                        <a href="ajoutPanier.php?id=<?=$version[5];?>"><button class="bouton-panier" type="submit">Ajouter au panier</button></a>
                        <a href="index.php"><button class="bouton-retour" type="button">Revenir aux articles</button></a>
                    </div>
                </section>
            </section>
        </main>
    </body>
</html>