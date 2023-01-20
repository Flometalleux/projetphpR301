<?php
session_start();
    require_once 'global.php';
    require_once 'bd.php';

        if (isset($_POST["ajt"])) {
            $stm = $test->prepare("INSERT INTO client (nom,prenom,email,admin) VALUES (?, ?, ?, ?);");
            $stm->execute([$_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['admin']]);

            header('Location: supprimerclientbd.php');
            exit;
        }
    require_once("navigation.html");
?>
            <table>
                <tr>
                    <th></th>
                    <th>nom</th>
                    <th>prenom</th>
                    <th>email</th>
                    <th>admin</th>
                    <th>action</th>
                </tr>
                <tr>
                    <td>
                        <form method="post">
                            <fieldset>
                                <td><input type="text" name="nom"></td>
                                <td><input type="text" name="prenom"></td>
                                <td><input type="text" name="email"></td>
                                <td><input type="text" name="admin"></td>
                                <td><input name='ajt' class='ajouterProduit' type='submit' value='Ajouter'></td>
                            </fieldset>
                        </form>
                    </td>
                </tr>
            </table>