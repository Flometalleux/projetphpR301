<?php
session_start();
    require_once("navigation.html");
    require_once 'global.php';
    require_once 'bd.php';

        if (isset($_POST["suppr"])) {
            $idProd=$_POST['supprimer'];
            $stm2 = $test->prepare("DELETE FROM produit WHERE id = $idProd");
            $stm2->execute();
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
                    <th>supprimer</th>
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
                                    <input type='hidden' name='supprimer' value="<?= $version['id'] ?>">
                                <td><input name='suppr' class='supprimerProduit' type='submit' value='Supprimer'></td>
                            </fieldset>
                        </form>
                    </td>
                    <?php  } ?>
                </tr>
                <tr class="total">
                    <th><a href="ajouterprodbd.php">Ajouter</a></th>
                </tr>
            </table>