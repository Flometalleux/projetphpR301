<?php
    session_start();
    require_once 'bd.php';

    if(!isset($_SESSION['panier'])){
        $_SESSION['panier'] = array();
    }

    $id=$_GET['id'];
    $stm = $test->prepare("SELECT titre,prixpublique,idmarque,description,descriptif FROM produit WHERE id = :id");
    $params = [':id' => $id];
    $stm->execute($params);

    $version = $stm->fetch();

    if(isset($_SESSION['panier'][$id])){
        $_SESSION['panier'][$id]++;
    }
    else{
        $_SESSION['panier'][$id]=1;
    }

    header('Location: index.php');
?>