<?php
session_start();
    require_once("navigation.html");
    require_once 'global.php';
    require_once 'bd.php';

        if (isset($_POST["suppr"])) {
            $idProd=$_POST['supprimer'];
            $stm2 = $test->prepare("DELETE FROM fournisseur WHERE id = $idProd");
            $stm2->execute();
        }

    $stm = $test->query("SELECT * FROM fournisseur");

    foreach($stm as $version){
?>
            <table>
                <tr>
                    <th>id</th>
                    <th>nom</th>
                    <th>supprimer</th>
                </tr>
                <tr>
                    <td><?=$version['id']?></td>
                    <td><?=$version['nom']?></td>
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
                    <th><a href="ajouterfourbd.php">Ajouter</a></th>
                </tr>
            </table>