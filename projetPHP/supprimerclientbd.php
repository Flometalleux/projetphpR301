<?php
session_start();
    require_once("navigation.html");
    require_once 'global.php';
    require_once 'bd.php';

        if (isset($_POST["suppr"])) {
            $idProd=$_POST['supprimer'];
            $stm2 = $test->prepare("DELETE FROM client WHERE id = $idProd");
            $stm2->execute();
        }

    $stm = $test->query("SELECT * FROM client");

    foreach($stm as $version){
?>
            <table>
                <tr>
                    <th>id</th>
                    <th>nom</th>
                    <th>prenom</th>
                    <th>email</th>
                    <th>admin</th>
                    <th>supprimer</th>
                </tr>
                <tr>
                    <td><?=$version['id']?></td>
                    <td><?=$version['nom']?></td>
                    <td><?=$version['prenom']?></td>
                    <td><?=$version['email']?></td>
                    <td><?=$version['admin']?></td>
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
                    <th><a href="ajouterclientbd.php">Ajouter</a></th>
                </tr>
            </table>