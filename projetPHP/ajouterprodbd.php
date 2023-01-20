<?php
session_start();
    require_once 'global.php';
    require_once 'bd.php';

        if (isset($_POST["ajt"])) {
            $stm = $test->prepare("INSERT INTO produit (idmarque,description,prixpublique,prixachat,titre,descriptif) VALUES (?, ?, ?, ?, ?, ?);");
            $stm->execute([$_POST['idmarque'], $_POST['description'], $_POST['prixpublique'], $_POST['prixachat'], $_POST['titre'], $_POST['descriptif']]);

            header('Location: supprimerprodbd.php');
            exit;
        }
    require_once("navigation.html");
?>
            <table>
                <tr>
                    <th></th>
                    <th>idmarque</th>
                    <th>description</th>
                    <th>prixpublique</th>
                    <th>prixachat</th>
                    <th>titre</th>
                    <th>descriptif</th>
                    <th>action</th>
                </tr>
                <tr>
                    <td>
                        <form method="post">
                            <fieldset>
                                <td><input type="text" name="idmarque"></td>
                                <td><input type="text" name="description"></td>
                                <td><input type="text" name="prixpublique"></td>
                                <td><input type="text" name="prixachat"></td>
                                <td><input type="text" name="titre"></td>
                                <td><input type="text" name="descriptif"></td>
                                <td><input name='ajt' class='ajouterProduit' type='submit' value='Ajouter'></td>
                            </fieldset>
                        </form>
                    </td>
                </tr>
            </table>