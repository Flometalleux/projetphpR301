<?php
session_start();
    require_once 'global.php';
    require_once 'bd.php';

        if (isset($_POST["ajt"])) {
            $stm = $test->prepare("INSERT INTO marque (idfournisseur,nom) VALUES (?, ?);");
            $stm->execute([$_POST['idfournisseur'], $_POST['nom']]);

            header('Location: supprimermarquebd.php');
            exit;
        }
    require_once("navigation.html");
?>
            <table>
                <tr>
                    <th></th>
                    <th>idfournisseur</th>
                    <th>nom</th>
                    <th>action</th>
                </tr>
                <tr>
                    <td>
                        <form method="post">
                            <fieldset>
                                <td><input type="text" name="idfournisseur"></td>
                                <td><input type="text" name="nom"></td>
                                <td><input name='ajt' class='ajouterProduit' type='submit' value='Ajouter'></td>
                            </fieldset>
                        </form>
                    </td>
                </tr>
            </table>