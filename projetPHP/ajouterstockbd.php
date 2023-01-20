<?php
session_start();
    require_once 'global.php';
    require_once 'bd.php';

        if (isset($_POST["ajt"])) {
            $stm = $test->prepare("INSERT INTO stock (idproduit,qte) VALUES (?, ?);");
            $stm->execute([$_POST['idproduit'], $_POST['qte']]);

            header('Location: supprimerstockbd.php');
            exit;
        }
    require_once("navigation.html");
?>
            <table>
                <tr>
                    <th></th>
                    <th>idproduit</th>
                    <th>qte</th>
                    <th>action</th>
                </tr>
                <tr>
                    <td>
                        <form method="post">
                            <fieldset>
                                <td><input type="text" name="idproduit"></td>
                                <td><input type="text" name="qte"></td>
                                <td><input name='ajt' class='ajouterProduit' type='submit' value='Ajouter'></td>
                            </fieldset>
                        </form>
                    </td>
                </tr>
            </table>