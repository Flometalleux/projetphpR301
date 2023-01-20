<?php 
    session_start(); 
    require_once 'global.php';
    require_once 'navigation.html';
    require_once 'bd.php';
?>

<!DOCTYPE html>
<html>

<head>
    <title>Info compte</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
</head>

<body>
    <div class="container">
        <p><a href="supprimerclientbd.php">Client</a></p>
        <p><a href="supprimerfourbd.php">Fournisseur</a></p>
        <p><a href="supprimermarquebd.php">Marque</a></p>
        <p><a href="supprimerprodbd.php">Produit</a></p>
        <p><a href="supprimerstockbd.php">Stock</a></p>
    </div>
</body>