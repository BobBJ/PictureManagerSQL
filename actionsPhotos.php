<?php
    require_once('bdd.php');
    require_once('requêtes.php');
    include("menu.php");
?>

<!doctype html>
<html lang="en">
    <head>
    <title> Accueil </title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">
    
    <!-- Bootstrap core CSS -->
    <link rel = "stylesheet" href = "bootstrap/bootstrap.css">
    <link rel = "stylesheet" href = "bootstrap/bootstrap.min.css">

	<style>
    body
    {
        background-color: white;
    }
    </style>
    </head>

</html>

<?php

    if (isset($_GET['action']) && $_GET['action'] = "cacher")
    {
        $id = $_SESSION['id'];
        $cat = $_SESSION['categ'];
        $reponse = $bdd->query("UPDATE Photo SET visible = 'non' WHERE photoId = '".$id."';");
        header("Location:./details.php?id=$id&categ=$cat&mesPhotos=oui&action=visible"); 
        exit();
    }
    else if (isset($_GET['action']) && $_GET['action'] = "visible")
    {
        $id = $_SESSION['id'];
        $cat = $_SESSION['categ'];
        $reponse = $bdd->query("UPDATE Photo SET visible = 'oui' WHERE photoId = '".$id."';");
        header("Location:./details.php?id=$id&categ=$cat&mesPhotos=oui&action=cacher"); 
        exit();
    }
    else if (isset($_GET['action']) && $_GET['action'] = "modifier")
    {
        echo "test2";
    }
    else if (isset($_GET['action']) && $_GET['action'] = "supprimer")
    {
        echo "test3";
    }
?>

