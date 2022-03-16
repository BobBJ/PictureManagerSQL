<?php
    require_once('bdd.php');
    require_once('requêtes.php');
    require_once('menu.php');
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
    
    </style>

    </head>

    <center>
    <body>
    <div style="position: absolute; left: 10px; top: 155px;">
        <div style="background-color : #669E3B; color: white; width: 400px;">
        <p> UTILISATEURS </p>
        </div>
        <?php
        $resultat = $bdd->query("SELECT COUNT(*) FROM Utilisateur;");
        $donnees = $resultat->fetch();?>
        <p> <strong> Nombre de membres totals : </strong> <?php echo $donnees['COUNT(*)'];?> </p> <br>

        <?php
        $resultat = $bdd->query("SELECT COUNT(*) FROM Utilisateur WHERE etat = 'connecté';");
        $donnees = $resultat->fetch();?>
        <p> <strong> Nombre de membres connectés : </strong> <?php echo $donnees['COUNT(*)'];?> </p>

        <?php
        $resultat = $bdd->query("SELECT COUNT(*) FROM Utilisateur WHERE etat = 'déconnecté';");
        $donnees = $resultat->fetch();?>
        <p> <strong> Nombre de membres déconnectés : </strong> <?php echo $donnees['COUNT(*)'];?> </p> <br>

        <?php
        $resultat = $bdd->query("SELECT COUNT(*) FROM Utilisateur WHERE statut = 'admin';");
        $donnees = $resultat->fetch();?>
        <p> <strong> Nombre d'administrateurs : </strong> <?php echo $donnees['COUNT(*)'];?> </p>

        <?php
        $resultat = $bdd->query("SELECT COUNT(*) FROM Utilisateur WHERE statut = 'utilisateur';");
        $donnees = $resultat->fetch();?>
        <p> <strong> Nombre d'utilisateurs : </strong> <?php echo $donnees['COUNT(*)'];?> </p> <br>

        <?php
        $resultat = $bdd->query("SELECT COUNT(*) FROM Utilisateur WHERE statut = 'admin' AND etat = 'connecté';");
        $donnees = $resultat->fetch();?>
        <p> <strong> Nombre d'administrateurs connectés : </strong> <?php echo $donnees['COUNT(*)'];?> </p>

        <?php
        $resultat = $bdd->query("SELECT COUNT(*) FROM Utilisateur WHERE statut = 'admin' AND etat = 'déconnecté';");
        $donnees = $resultat->fetch();?>
        <p> <strong> Nombre d'administrateurs déconnectés : </strong> <?php echo $donnees['COUNT(*)'];?> </p> <br>

        <?php
        $resultat = $bdd->query("SELECT COUNT(*) FROM Utilisateur WHERE statut = 'utilisateur' AND etat = 'connecté';");
        $donnees = $resultat->fetch();?>
        <p> <strong> Nombre d'utilisateurs connectés : </strong> <?php echo $donnees['COUNT(*)'];?> </p>

        <?php
        $resultat = $bdd->query("SELECT COUNT(*) FROM Utilisateur WHERE statut = 'utilisateur' AND etat = 'déconnecté';");
        $donnees = $resultat->fetch();?>
        <p> <strong> Nombre d'utilisateurs déconnectés : </strong>  <?php echo $donnees['COUNT(*)'];?> </p> <br> <br>
    </div>

    <div style="position: absolute; left: 425px; top: 155px;">
        <div style="background-color : #669E3B; color: white; width: 590px;">
        <p> PHOTOS </p>
        </div>
        <?php
        $resultat = $bdd->query("SELECT COUNT(*) FROM Photo;");
        $donnees = $resultat->fetch();?>
        <p> <strong> Nombre de photos totales : </strong> <?php echo $donnees['COUNT(*)'];?> </p> <br>

        <?php
        $resultat = $bdd->query("SELECT COUNT(*) FROM Photo WHERE visible = 'oui';");
        $donnees = $resultat->fetch();?>
        <p> <strong> Nombre de photos visibles : </strong> <?php echo $donnees['COUNT(*)'];?> </p>

        <?php
        $resultat = $bdd->query("SELECT COUNT(*) FROM Photo WHERE visible = 'non';");
        $donnees = $resultat->fetch();?>
        <p> <strong> Nombre de photos cachées : </strong> <?php echo $donnees['COUNT(*)'];?> </p> <br>

        <?php
        $resultat = $bdd->query("SELECT COUNT(*) FROM Photo WHERE catId = '1';");
        $donnees = $resultat->fetch();?>
        <p> <strong> Nombre de photos appartenant à la catégorie Animaux : </strong> <?php echo $donnees['COUNT(*)'];?> </p>

        <?php
        $resultat = $bdd->query("SELECT COUNT(*) FROM Photo WHERE catId = '2';");
        $donnees = $resultat->fetch();?>
        <p> <strong> Nombre de photos appartenant à la catégorie Art : </strong> <?php echo $donnees['COUNT(*)'];?> </p>

        <?php
        $resultat = $bdd->query("SELECT COUNT(*) FROM Photo WHERE catId = '3';");
        $donnees = $resultat->fetch();?>
        <p> <strong> Nombre de photos appartenant à la catégorie Cuisine : </strong> <?php echo $donnees['COUNT(*)'];?> </p>

        <?php
        $resultat = $bdd->query("SELECT COUNT(*) FROM Photo WHERE catId = '4';");
        $donnees = $resultat->fetch();?>
        <p> <strong> Nombre de photos appartenant à la catégorie Sport : </strong> <?php echo $donnees['COUNT(*)'];?> </p>

        <?php
        $resultat = $bdd->query("SELECT COUNT(*) FROM Photo WHERE catId = '5';");
        $donnees = $resultat->fetch();?>
        <p> <strong> Nombre de photos appartenant à la catégorie Voyage : </strong> <?php echo $donnees['COUNT(*)'];?> </p> <br>

        <?php
        $resultat = $bdd->query("SELECT COUNT(*) FROM Photo WHERE catId = '1' AND visible = 'oui';");
        $donnees = $resultat->fetch();?>
        <p> <strong> Nombre de photos visibles appartenant à la catégorie Animaux : </strong> <?php echo $donnees['COUNT(*)'];?> </p>

        <?php
        $resultat = $bdd->query("SELECT COUNT(*) FROM Photo WHERE catId = '2' AND visible = 'oui';");
        $donnees = $resultat->fetch();?>
        <p> <strong> Nombre de photos visibles appartenant à la catégorie Art : </strong> <?php echo $donnees['COUNT(*)'];?> </p>

        <?php
        $resultat = $bdd->query("SELECT COUNT(*) FROM Photo WHERE catId = '3' AND visible = 'oui';");
        $donnees = $resultat->fetch();?>
        <p> <strong> Nombre de photos visibles appartenant à la catégorie Cuisine : </strong> <?php echo $donnees['COUNT(*)'];?> </p>

        <?php
        $resultat = $bdd->query("SELECT COUNT(*) FROM Photo WHERE catId = '4' AND visible = 'oui';");
        $donnees = $resultat->fetch();?>
        <p> <strong> Nombre de photos visibles appartenant à la catégorie Sport : </strong> <?php echo $donnees['COUNT(*)'];?> </p>

        <?php
        $resultat = $bdd->query("SELECT COUNT(*) FROM Photo WHERE catId = '5' AND visible = 'oui';");
        $donnees = $resultat->fetch();?>
        <p> <strong> Nombre de photos visibles appartenant à la catégorie Voyage : </strong> <?php echo $donnees['COUNT(*)'];?> </p> <br>

        <?php
        $resultat = $bdd->query("SELECT COUNT(*) FROM Photo WHERE catId = '1' AND visible = 'non';");
        $donnees = $resultat->fetch();?>
        <p> <strong> Nombre de photos cachées appartenant à la catégorie Animaux : </strong> <?php echo $donnees['COUNT(*)'];?> </p>

        <?php
        $resultat = $bdd->query("SELECT COUNT(*) FROM Photo WHERE catId = '2' AND visible = 'non';");
        $donnees = $resultat->fetch();?>
        <p> <strong> Nombre de photos cachées appartenant à la catégorie Art : </strong> <?php echo $donnees['COUNT(*)'];?> </p>

        <?php
        $resultat = $bdd->query("SELECT COUNT(*) FROM Photo WHERE catId = '3' AND visible = 'non';");
        $donnees = $resultat->fetch();?>
        <p> <strong> Nombre de photos cachées appartenant à la catégorie Cuisine : </strong> <?php echo $donnees['COUNT(*)'];?> </p>

        <?php
        $resultat = $bdd->query("SELECT COUNT(*) FROM Photo WHERE catId = '4' AND visible = 'non';");
        $donnees = $resultat->fetch();?>
        <p> <strong> Nombre de photos cachées appartenant à la catégorie Sport : </strong> <?php echo $donnees['COUNT(*)'];?> </p>

        <?php
        $resultat = $bdd->query("SELECT COUNT(*) FROM Photo WHERE catId = '5' AND visible = 'non';");
        $donnees = $resultat->fetch();?>
        <p> <strong> Nombre de photos cachées appartenant à la catégorie Voyage : </strong> <?php echo $donnees['COUNT(*)'];?> </p> <br> <br>
    </div>

    <div style="position: absolute; left: 1030px; top: 155px;">
        <div style="background-color : #669E3B; color: white; width: 400px;">
        <p> CATÉGORIES </p>
        </div>
        <?php
        $resultat = $bdd->query("SELECT COUNT(*) FROM Categorie;");
        $donnees = $resultat->fetch();?>
        <p> <strong> Nombre de catégories totales : </strong> <?php echo $donnees['COUNT(*)'];?> </p>
    </div>

    </body>
    </center>

</html>
