<?php
session_start();
require_once 'global.php';
require_once 'navigation.html';
require_once 'bd.php';

if (isset($_POST["supprimer"]) && isset($_POST["supprQuantite"])) {
    if (isset($_POST["suppr"])) {
        $_SESSION['panier'][$_POST['supprimer']] = $_SESSION['panier'][$_POST['supprimer']] - 1;
        if (is_null($_SESSION['panier'][$_POST['supprQuantite']]) || $_SESSION['panier'][$_POST['supprQuantite']] <= 0 || !isset($_SESSION['panier'][$_POST['supprQuantite']])) {
            unset($_SESSION['panier'][$_POST["supprimer"]]);
            unset($_POST["supprimer"]);
            unset($_POST["supprQuantite"]);
        }
    }
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Panier</title>
</head>

<body>
    <main>
        <section class='panier'>
            <table>
                <tr>
                    <th></th>
                    <th>Nom</th>
                    <th>Prix</th>
                    <th>Quantité</th>
                    <th>Action</th>
                </tr>

                <?php
                $total = 0;
                $ids = $_SESSION['panier'];
                if (empty($ids)) {
                    echo "Votre panier est vide";
                } else {
                    foreach ($ids as $idprod => $valeur) :

                        $stm = $test->query("SELECT * FROM produit WHERE id = $idprod");
                        $version = $stm->fetch();
                        $total = $total + $version['prixpublique'] * $valeur;
                ?>
                        <tr>
                            <td><img src="assets/img/<?= $version['id']; ?>.jpg" class="img-apercu-gauche" alt="image produit"></td>
                            <td><?= $version['titre'] ?></td>
                            <td><?= $version['prixpublique'] ?></td>
                            <td><?= $valeur ?></td>
                            <td>
                                <form method="post">
                                    <fieldset>
                                        <input type='hidden' name='supprQuantite' value="<?php echo $valeur; ?>">
                                        <input type='hidden' name='supprimer' value="<?php echo $idprod; ?>">
                            <td><input name='suppr' class='supprimerProduit' type='submit' value='Supprimer'></td>
                            </fieldset>
                            </form>
                            </td>
                        </tr>
                <?php endforeach;
                } ?>

                <tr class="total">
                    <th>Total : <?= $total ?>€</th>
                </tr>
            </table>
        </section>
    </main>
</body>

</html>