<?php
session_start();
    require_once("navigation.html");
    require_once 'global.php';
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

    $stm = $test->query("SELECT * FROM produit");

    foreach($stm as $version){
?>
            <table>
                <tr>
                    <th>id</th>
                    <th>idmarque</th>
                    <th>description</th>
                    <th>prixpublique</th>
                    <th>prixachat</th>
                    <th>titre</th>
                    <th>descriptif</th>
                    <th>action</th>
                </tr>
                <tr>
                    <td><?=$version['id']?></td>
                    <td><?=$version['idmarque']?></td>
                    <td><?=$version['description']?></td>
                    <td><?=$version['prixpublique']?></td>
                    <td><?=$version['prixachat']?></td>
                    <td><?=$version['titre']?></td>
                    <td><?=$version['descriptif']?></td>
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
            </table>
<?php  } ?>