<?php 
    session_start(); 
    require_once 'global.php';
    require_once 'navigation.html';
    require_once 'bd.php';

    $stm = $test->query("SELECT * FROM produit");

    while($row = $stm->fetch()){
?>

<!DOCTYPE html>
<html lang="fr" >
    <head>
        <title>Articles</title>
        <link rel="stylesheet" href="/assets/css/articles.css">
    </head>
    <body>
        <main>
            <?php
                $i=1;
                if ($i % 3 == 1) {
                    echo "<tr>";
                }
            ?>
            <div class='article-apercu'>
                <a href="description.php?id=<?=$row['id'];?>">
                    <table class="tab-article">
                        <img src="assets/img/<?=$row['id'];?>.jpg" class="img-apercu-gauche" alt="image produit">
                        <h3><?= $row['titre']; ?></h3>
                        <p><?= $row['prixpublique']; ?>€</p>
                        <p><?= $row['descriptif']; ?></p>
                    </table>
                </a>
            </div>
            <?php
                if ($i % 3 == 0) {
                    echo "</tr>";
                }
                $i++;
            ?>
        </main>
        <?php } ?>
    </body>
</html>